<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\EmailService;
use App\Services\ClientService;
use App\Services\CertificateService;
use App\Services\VariationService;
use App\Models\VariationType;
use App\Models\Certificate;
use App\Models\CertificateShape;
use App\Models\CertificateColor;
use App\Models\CertificateClarity;
use App\Models\Contact;
use DataTables;
use Carbon;
use App\Exports\CertificatesExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $imageService, $emailService, $clientService, $certificateService, $variationService;

    public function __construct (
        UploadImageService $imageService,
        EmailService $emailService,
        ClientService $clientService,
        CertificateService $certificateService,
        VariationService $variationService
    )
    {
        $this->imageService = $imageService;
        $this->emailService = $emailService;
        $this->clientService = $clientService;
        $this->certificateService = $certificateService;
        $this->variationService = $variationService;
    }

    public function index(Request $request)
    {
        return view('index');
    }
    public function about(Request $request)
    {
        return view('about');
    }
    public function services(Request $request)
    {
        return view('services');
    }
    public function contact(Request $request)
    {
        return view('contact');
    }
    public function saveContact(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|recaptcha:contact,0.5',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone_no = $request->phone_no;
        $contact->email_id = $request->email_id;
        $contact->message = $request->message;
        $contact->save();
        $admin_email = env('ADMIN_EMAIL');
        $subject = 'New Contact Submission';
        $result = [
            'name' => $request->name,
            'email_id' => $request->email_id,
            'phone_no' => $request->phone_no,
            'message' => $request->message,
        ];
        $this->emailService->sendEmail('emails.contact', $result, $admin_email, $subject);
        $request->session()->put('message', 'Thank you for your message. It has been sent.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->back();
    }
    public function viewReport(Request $request)
    {
        $certificate = '';
        $shapes = '';
        $colors = '';
        $clarities = '';
        $summary_no = $request->rno;
        $certificate = Certificate::where('summary_no', $summary_no)->where('status', 1)->first();
        if($certificate) {
            $shapes = $certificate->shapes()->with('variation')->get()->pluck('variation.name')->implode(' / ');
            $colors = $certificate->colors()->with('variation')->get()->pluck('variation.name')->implode(' / ');
            $clarities = $certificate->clarities()->with('variation')->get()->pluck('variation.name')->implode(' / ');    
        }
        return view('view-report')->with('summary_no', $summary_no)->with('certificate', $certificate)->with('shapes', $shapes)->with('colors', $colors)->with('clarities', $clarities);
    }
    public function fetchDetails(Request $request)
    {
        $certificate = Certificate::where('summary_no', $request->summary_no)->where('status', 1)->first();
        $shapes = '';
        $colors = '';
        $clarities = '';
        if($certificate) {
            $shapes = $certificate->shapes()->with('variation')->get()->pluck('variation.name')->implode(' / ');
            $colors = $certificate->colors()->with('variation')->get()->pluck('variation.name')->implode(' / ');
            $clarities = $certificate->clarities()->with('variation')->get()->pluck('variation.name')->implode(' / ');    
        }
        return view('search-result')->with('certificate', $certificate)->with('shapes', $shapes)->with('colors', $colors)->with('clarities', $clarities)->render();
    }
    public function terms(Request $request)
    {
        return view('terms');
    }
    public function clients(Request $request)
    {
        $clients = $this->clientService->getAllClients();
        return view('clients.index')->with('clients', $clients);
    }
    public function addClient(Request $request)
    {
        return view('clients.add');
    }
    public function saveClient(Request $request)
    {
        $data = $request->all();
        $data['company_name'] = $request->company_name;
        $data['gst_no'] = $request->gst_no;
        $data['client_name'] = $request->client_name;
        $data['phone_no'] = $request->phone_no;
        $data['mobile_no'] = $request->mobile_no;
        $data['email_id'] = $request->email_id;
        $data['address'] = $request->address;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = 0;
        $this->clientService->create($data);
        $request->session()->put('message', 'Client has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('clients');
    }
    public function editClient(Request $request, $id)
    {
        try{
            $client = $this->clientService->getClientById($id);
            if(!$client){
                throw new BadRequestException('Invalid Request id');
            }
            return view('clients.edit')->with('client', $client);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('clients');
        }
    }
    public function updateClient(Request $request)
    {
        try{
            $client = $this->clientService->getClientById($request->id);
            if(!$client){
                throw new BadRequestException('Invalid Request id');
            }
            $data['company_name'] = $request->company_name;
            $data['gst_no'] = $request->gst_no;
            $data['client_name'] = $request->client_name;
            $data['phone_no'] = $request->phone_no;
            $data['mobile_no'] = $request->mobile_no;
            $data['address'] = $request->address;
            $data['email_id'] = $request->email_id;
            $data['updated_by'] = Auth::user()->id;
            $this->clientService->update($client, $data);
            $request->session()->put('message', 'Client has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('clients');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('clients');
        }
    }
    public function fetchDetailsByCompany(Request $request)
    {
        $company_id = $request->company_id;
        $client = $this->clientService->getClientById($company_id);
        return view('certificates.client-details')->with('company_id', $company_id)->with('client', $client)->render();
    }
    private function certificateQuery($request)
    {
        $data = Certificate::select(
                'id',
                'summary_no',
                'certificate_date',
                'company_name',
                'name',
                'weight',
                'refractive_index',
                'origin',
                'qr_code',
                'status',
                'created_at'
            );
        if ($request->start_date && $request->end_date) {
            $start = \Carbon\Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
            $end = \Carbon\Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
            $data->whereBetween('certificate_date', [$start, $end]);
        }
        if ($request->company) {
            $data->where('client_id', $request->company);
        }
        if ($request->summary_no) {
            $data->where('summary_no', 'like', '%' . $request->summary_no . '%');
        }
        if ($request->shape) {
            $data->whereHas('shapes', function ($q) use ($request) {
                $q->where('shape_id', $request->shape);
            });
        }
        if ($request->color) {
            $data->whereHas('colors', function ($q) use ($request) {
                $q->where('color_id', $request->color);
            });
        }
        if ($request->clarity) {
            $data->whereHas('clarities', function ($q) use ($request) {
                $q->where('clarity_id', $request->clarity);
            });
        }
        return $data->orderBy('created_at', 'desc');
    }
    public function certificates(Request $request)
    {
        if($request->ajax()){
            $data = $this->certificateQuery($request);
            $totalWeight = (clone $data)->sum('total_weight');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">
                            <input type="checkbox" class="print_checkbox mr-1" value="'.$row->id.'">
                            <a href="'.route('certificates.edit',$row->id).'" class="btn btn-outline-primary btn-circle">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="'.asset('assets/'.$row->qr_code).'" class="btn btn-outline-danger btn-circle" download>
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="'.route('certificates.duplicate',$row->id).'" class="btn btn-outline-warning btn-circle">
                                <i class="fa fa-copy"></i>
                            </a></div>';
                    return $btn;
                })
                ->editColumn('certificate_date', function ($row) {
                    return Carbon\Carbon::parse($row->certificate_date)->format('d-m-Y');
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-danger">Inactive</span>';
                    }
                })
                ->with('total_weight', $totalWeight)
                ->rawColumns(['action','status'])
                ->make(true);
        }
        /*<a href="javascript:void(0);" class="btn btn-outline-dark btn-circle print-card" data-certificate-id="'.$row->id.'">
            <i class="fas fa-print"></i>
        </a>*/
        $shape_id = VariationType::SHAPE_VARIATION_ID;
        $shapes = $this->variationService->getAllVariations($shape_id);
        $color_id = VariationType::COLOR_VARIATION_ID;
        $colors = $this->variationService->getAllVariations($color_id);
        $clarity_id = VariationType::CLARITY_VARIATION_ID;
        $clarities = $this->variationService->getAllVariations($clarity_id);
        $companies = $this->clientService->getAllClients();
        return view('certificates.index')->with('shapes', $shapes)->with('colors', $colors)->with('clarities', $clarities)->with('companies', $companies);
    }
    public function exportCertificatesCsv(Request $request)
    {
        $data = $this->certificateQuery($request)->get();
        $totalWeight = $this->certificateQuery($request)->sum('total_weight');
        $filename = "certificates.csv";
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];
        $callback = function () use ($data, $totalWeight) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Summary No',
                'Date',
                'Company',
                'Client',
                'Total EST WT',
                'Refractive Index',
                'Origin',
                'Status'
            ]);
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->summary_no,
                    $row->certificate_date,
                    $row->company_name,
                    $row->name,
                    $row->weight,
                    $row->refractive_index,
                    $row->origin,
                    $row->status == 1 ? 'Active' : 'Inactive',
                ]);
            }
            fputcsv($file, []);
            fputcsv($file, [
                '', '', '', 'Total',
                $totalWeight,
                '', '', ''
            ]);
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
    public function exportCertificatesExcel(Request $request)
    {
        $query = $this->certificateQuery($request)->limit(10000);
        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\CertificatesExport($query),
            'certificates.xlsx'
        );
    }
    public function printCertificate(Request $request)
    {
        if ($request->ids) {
            $ids = explode(',', $request->ids);
            $certificates = Certificate::whereIn('id', $ids)->get();
        } else {
            $certificates = collect([
                $this->certificateService->getCertificateById($request->certificate_id)
            ]);
        }
        //$certificate = $this->certificateService->getCertificateById($request->certificate_id);
        foreach ($certificates as $certificate) {
            $certificate->shapes_data = $certificate->shapes()->with('variation')->get()->pluck('variation.name')->implode(' / ');
            $certificate->colors_data = $certificate->colors()->with('variation')->get()->pluck('variation.name')->implode(' / ');
            $certificate->clarities_data = $certificate->clarities()->with('variation')->get()->pluck('variation.name')->implode(' / ');
        }
        return view('certificates.print', compact('certificates'));
    }
    public function addCertificate(Request $request)
    {
        $companies = $this->clientService->getAllClients();
        $shape_id = VariationType::SHAPE_VARIATION_ID;
        $shapes = $this->variationService->getAllVariations($shape_id);
        $color_id = VariationType::COLOR_VARIATION_ID;
        $colors = $this->variationService->getAllVariations($color_id);
        $clarity_id = VariationType::CLARITY_VARIATION_ID;
        $clarities = $this->variationService->getAllVariations($clarity_id);
        return view('certificates.add')->with('companies', $companies)->with('shapes', $shapes)->with('colors', $colors)->with('clarities', $clarities);
    }
    public function saveCertificate(Request $request)
    {
        $data = $request->all();
        $client = $this->clientService->getClientById($request->company);
        $data['summary_no'] = $request->summary_no;
        $data['certificate_date'] = date('Y-m-d', strtotime(strtr($request->certificate_date, '/', '-')));
        $data['client_id'] = $request->company;
        $data['company_name'] = $client->company_name;
        $data['gst_no'] = $request->gst_no;
        $data['name'] = $request->client_name;
        $data['address'] = $request->address;
        $data['weight'] = $request->weight;
        $data['total_weight'] = $request->total_weight;
        $data['refractive_index'] = $request->refractive_index;
        $data['specific_gravity'] = $request->specific_gravity;
        $data['hardness'] = $request->hardness;
        $data['origin'] = $request->origin;
        $data['measure'] = $request->measure;
        $data['description'] = $request->description;
        $data['comment'] = $request->comment;
        $data['identification'] = $request->identification;
        if($request->has('image')){
            $filename = $this->imageService->uploadFile($request->image, "assets/certificates");
            $data['image'] = '/certificates/'.$filename;
        }
        $summary_no = $request->summary_no;
        $qr_img = env('APP_HOME_URL').'view-report.php?rno='.$summary_no;
        $qr_code_path = public_path("assets/qr_code/".$summary_no.".png");
        $qr_code = \QrCode::format('png')->size(290)->margin(0)->generate($qr_img, $qr_code_path);
        $data['qr_code'] = '/qr_code/'.$summary_no.'.png';
        $data['status'] = $request->active;
        $data['print_format'] = $request->print_format;
        $data['image_format'] = $request->image_format;
        $certificate_data = $this->certificateService->create($data);
        $certificate_id = $certificate_data->id;
        if($request->has('shape_id')){
            $shapeOrder = explode(',', $request->shape_order);
            foreach($shapeOrder as $shape) {
                $shape_data['certificate_id'] = $certificate_id;
                $shape_data['shape_id'] = $shape;
                CertificateShape::create($shape_data);
            }
        }
        if($request->has('color_id')){
            $colorOrder = explode(',', $request->color_order);
            foreach($colorOrder as $color) {
                $color_data['certificate_id'] = $certificate_id;
                $color_data['color_id'] = $color;
                CertificateColor::create($color_data);
            }
        }
        if($request->has('clarity_id')){
            $clarityOrder = explode(',', $request->clarity_order);
            foreach($clarityOrder as $clarity) {
                $clarity_data['certificate_id'] = $certificate_id;
                $clarity_data['clarity_id'] = $clarity;
                CertificateClarity::create($clarity_data);
            }
        }
        $request->session()->put('message', 'Certificate has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('certificates');
    }
    public function editCertificate(Request $request, $id)
    {
        try{
            $certificate = $this->certificateService->getCertificateById($id);
            if(!$certificate){
                throw new BadRequestException('Invalid Request id');
            }
            $companies = $this->clientService->getAllClients();
            $shape_id = VariationType::SHAPE_VARIATION_ID;
            $shapes = $this->variationService->getAllVariations($shape_id);
            $color_id = VariationType::COLOR_VARIATION_ID;
            $colors = $this->variationService->getAllVariations($color_id);
            $clarity_id = VariationType::CLARITY_VARIATION_ID;
            $clarities = $this->variationService->getAllVariations($clarity_id);
            $selectedShapes = $certificate->shapes->pluck('shape_id')->toArray();
            $selectedColors = $certificate->colors->pluck('color_id')->toArray();
            $selectedClarities = $certificate->clarities->pluck('clarity_id')->toArray();
            return view('certificates.edit')->with('certificate', $certificate)->with('companies', $companies)->with('shapes', $shapes)->with('colors', $colors)->with('clarities', $clarities)->with('selectedShapes', $selectedShapes)->with('selectedColors', $selectedColors)->with('selectedClarities', $selectedClarities);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('certificates');
        }
    }
    public function updateCertificate(Request $request)
    {
        try{
            $certificate = $this->certificateService->getCertificateById($request->id);
            if(!$certificate){
                throw new BadRequestException('Invalid Request id');
            }
            $client = $this->clientService->getClientById($request->company);
            $data['client_id'] = $request->company;
            $data['company_name'] = $client->company_name;
            $data['gst_no'] = $request->gst_no;
            $data['name'] = $request->client_name;
            $data['address'] = $request->address;
            $data['weight'] = $request->weight;
            $data['total_weight'] = $request->total_weight;
            $data['refractive_index'] = $request->refractive_index;
            $data['specific_gravity'] = $request->specific_gravity;
            $data['hardness'] = $request->hardness;
            $data['origin'] = $request->origin;
            $data['measure'] = $request->measure;
            $data['description'] = $request->description;
            $data['comment'] = $request->comment;
            $data['identification'] = $request->identification;
            if($request->has('image')){
                $filepath = public_path('assets/' . $certificate->image);
                //$this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/certificates");
                $data['image'] = '/certificates/'.$filename;
            }
            $data['print_format'] = $request->print_format;
            $data['image_format'] = $request->image_format;
            $data['status'] = $request->active;
            $this->certificateService->update($certificate, $data);
            CertificateShape::where('certificate_id', $certificate->id)->delete();
            if($request->has('shape_id')){
                $shapeOrder = explode(',', $request->shape_order);
                foreach($shapeOrder as $shape) {
                    $shape_data['certificate_id'] = $certificate->id;
                    $shape_data['shape_id'] = $shape;
                    CertificateShape::create($shape_data);
                }
            }
            CertificateColor::where('certificate_id', $certificate->id)->delete();
            if($request->has('color_id')){
                $colorOrder = explode(',', $request->color_order);
                foreach($colorOrder as $color) {
                    $color_data['certificate_id'] = $certificate->id;
                    $color_data['color_id'] = $color;
                    CertificateColor::create($color_data);
                }
            }
            CertificateClarity::where('certificate_id', $certificate->id)->delete();
            if($request->has('clarity_id')){
                $clarityOrder = explode(',', $request->clarity_order);
                foreach($clarityOrder as $clarity) {
                    $clarity_data['certificate_id'] = $certificate->id;
                    $clarity_data['clarity_id'] = $clarity;
                    CertificateClarity::create($clarity_data);
                }
            }
            $request->session()->put('message', 'Certificate has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('certificates');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('certificates');
        }
    }
    public function duplicateCertificate(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $newCertificate = $certificate->replicate();
        date_default_timezone_set('Asia/Kolkata');
        $branch = '1';
        $summary_no = date('dmyHis').$branch;
        $today = date('Y-m-d');
        $newCertificate->summary_no = $summary_no;
        $newCertificate->certificate_date = $today;
        $qr_img = env('APP_HOME_URL').'view-report.php?rno='.$summary_no;
        $qr_code_path = public_path("assets/qr_code/".$summary_no.".png");
        $qr_code = \QrCode::format('png')->size(290)->margin(0)->generate($qr_img, $qr_code_path);
        $newCertificate->qr_code = '/qr_code/'.$summary_no.'.png';
        $newCertificate->created_at = now();
        $newCertificate->updated_at = now();
        $newCertificate->save();
        $newId = $newCertificate->id;
        foreach ($certificate->shapes as $shape) {
            CertificateShape::create([
                'certificate_id' => $newId,
                'shape_id' => $shape->shape_id,
            ]);
        }
        foreach ($certificate->colors as $color) {
            CertificateColor::create([
                'certificate_id' => $newId,
                'color_id' => $color->color_id,
            ]);
        }
        foreach ($certificate->clarities as $clarity) {
            CertificateClarity::create([
                'certificate_id' => $newId,
                'clarity_id' => $clarity->clarity_id,
            ]);
        }
        $request->session()->put('message', 'Certificate duplicated successfully! New Summary No - ' . $summary_no);
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->back();
    }
}
