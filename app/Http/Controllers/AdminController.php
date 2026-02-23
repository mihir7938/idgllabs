<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\UploadImageService;
use App\Services\UserService;
use App\Services\VariationService;
use App\Services\ClientService;
use App\Services\CertificateService;
use App\Models\User;
use App\Models\VariationType;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

	private $imageService, $userService, $variationService, $clientService, $certificateService;

    public function __construct(
        UploadImageService $imageService,
        UserService $userService,
        VariationService $variationService,
        ClientService $clientService,
        CertificateService $certificateService
    )
    {
        $this->imageService = $imageService;
        $this->userService = $userService;
        $this->variationService = $variationService;
        $this->clientService = $clientService;
        $this->certificateService = $certificateService;
    }

    public function index(Request $request)
    {
        $total_shapes = $this->variationService->getAllVariations(VariationType::SHAPE_VARIATION_ID)->count();
        $total_colors = $this->variationService->getAllVariations(VariationType::COLOR_VARIATION_ID)->count();
        $total_clarities = $this->variationService->getAllVariations(VariationType::CLARITY_VARIATION_ID)->count();
        $total_clients = $this->clientService->getTotalClients();
        $total_certificates = $this->certificateService->getTotalCertificates();
        $total_users = User::count();
        return view('admin.index')->with('total_shapes', $total_shapes)->with('total_colors', $total_colors)->with('total_clarities', $total_clarities)->with('total_clients', $total_clients)->with('total_certificates', $total_certificates)->with('total_users', $total_users);
    }
    public function shapes(Request $request)
    {
        $type_id = VariationType::SHAPE_VARIATION_ID;
        $shapes = $this->variationService->getAllVariations($type_id);
        return view('admin.shapes.index')->with('shapes', $shapes);
    }
    public function addShape(Request $request)
    {
        return view('admin.shapes.add');
    }
    public function saveShape(Request $request)
    {
        $data = $request->all();
        $data['variation_type_id'] = VariationType::SHAPE_VARIATION_ID;
        $data['name'] = $request->shape;
        $this->variationService->create($data);
        $request->session()->put('message', 'Shape has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.shapes');
    }
    public function editShape(Request $request, $id)
    {
        try{
            $type_id = VariationType::SHAPE_VARIATION_ID;
            $shape = $this->variationService->getVariationById($id, $type_id);
            if(!$shape){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.shapes.edit')->with('shape', $shape);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.shapes');
        }
    }
    public function updateShape(Request $request)
    {
        try{
            $type_id = VariationType::SHAPE_VARIATION_ID;
            $shape = $this->variationService->getVariationById($request->id, $type_id);
            if(!$shape){
                throw new BadRequestException('Invalid Request id');
            }
            $data['name'] = $request->shape;
            $this->variationService->update($shape, $data);
            $request->session()->put('message', 'Shape has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.shapes');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.shapes');
        }
    }
    public function deleteShape(Request $request, $id)
    {
        try{
            $type_id = VariationType::SHAPE_VARIATION_ID;
            $shape = $this->variationService->getVariationById($id, $type_id);
            if(!$shape){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->variationService->delete($shape);
            $request->session()->put('message', 'Shape has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.shapes');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.shapes');
        }
    }
    public function colors(Request $request)
    {
        $type_id = VariationType::COLOR_VARIATION_ID;
        $colors = $this->variationService->getAllVariations($type_id);
        return view('admin.colors.index')->with('colors', $colors);
    }
    public function addColor(Request $request)
    {
        return view('admin.colors.add');
    }
    public function saveColor(Request $request)
    {
        $data = $request->all();
        $data['variation_type_id'] = VariationType::COLOR_VARIATION_ID;
        $data['name'] = $request->color;
        $this->variationService->create($data);
        $request->session()->put('message', 'Color has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.colors');
    }
    public function editColor(Request $request, $id)
    {
        try{
            $type_id = VariationType::COLOR_VARIATION_ID;
            $color = $this->variationService->getVariationById($id, $type_id);
            if(!$color){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.colors.edit')->with('color', $color);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.colors');
        }
    }
    public function updateColor(Request $request)
    {
        try{
            $type_id = VariationType::COLOR_VARIATION_ID;
            $color = $this->variationService->getVariationById($request->id, $type_id);
            if(!$color){
                throw new BadRequestException('Invalid Request id');
            }
            $data['name'] = $request->color;
            $this->variationService->update($color, $data);
            $request->session()->put('message', 'Color has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.colors');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.colors');
        }
    }
    public function deleteColor(Request $request, $id)
    {
        try{
            $type_id = VariationType::COLOR_VARIATION_ID;
            $color = $this->variationService->getVariationById($id, $type_id);
            if(!$color){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->variationService->delete($color);
            $request->session()->put('message', 'Color has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.colors');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.colors');
        }
    }
    public function clarities(Request $request)
    {
        $type_id = VariationType::CLARITY_VARIATION_ID;
        $clarities = $this->variationService->getAllVariations($type_id);
        return view('admin.clarities.index')->with('clarities', $clarities);
    }
    public function addClarity(Request $request)
    {
        return view('admin.clarities.add');
    }
    public function saveClarity(Request $request)
    {
        $data = $request->all();
        $data['variation_type_id'] = VariationType::CLARITY_VARIATION_ID;
        $data['name'] = $request->clarity;
        $this->variationService->create($data);
        $request->session()->put('message', 'Clarity has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.clarities');
    }
    public function editClarity(Request $request, $id)
    {
        try{
            $type_id = VariationType::CLARITY_VARIATION_ID;
            $clarity = $this->variationService->getVariationById($id, $type_id);
            if(!$clarity){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.clarities.edit')->with('clarity', $clarity);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.clarities');
        }
    }
    public function updateClarity(Request $request)
    {
        try{
            $type_id = VariationType::CLARITY_VARIATION_ID;
            $clarity = $this->variationService->getVariationById($request->id, $type_id);
            if(!$clarity){
                throw new BadRequestException('Invalid Request id');
            }
            $data['name'] = $request->clarity;
            $this->variationService->update($clarity, $data);
            $request->session()->put('message', 'Clarity has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.clarities');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.clarities');
        }
    }
    public function deleteClarity(Request $request, $id)
    {
        try{
            $type_id = VariationType::CLARITY_VARIATION_ID;
            $clarity = $this->variationService->getVariationById($id, $type_id);
            if(!$clarity){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->variationService->delete($clarity);
            $request->session()->put('message', 'Clarity has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.clarities');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.clarities');
        }
    }
    public function getUsers()
    {
        $users = $this->userService->getAllUsers();
        return view('admin.users.index')->with('users', $users);
    }
    public function fetchUsers(Request $request)
    {
        $users = $this->userService->getUsersByFilter($request);
        return view('admin.users.result')->with('users', $users)->render();
    }
    public function addUser()
    {
        return view('admin.users.add');
    }
    public function saveUser(RegisterRequest $request)
    {
        $user = $this->userService->create($request);
        $request->session()->put('message', 'User has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.users');
    }
    public function editUser(Request $request, $id)
    {
        try{
            $user = $this->userService->getUserById($id);
            if(!$user){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.users.edit')->with('user', $user);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.users');
        }
    }
    public function updateUser(Request $request)
    {
        try{
            $user = $this->userService->getUserById($request->id);
            if(!$user){
                throw new BadRequestException('Invalid Request id');
            }
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            $data['role_id'] = $request->type;
            if($user->isUser()) {
                $data['status'] = $request->active;
            }
            $this->userService->update($user, $data);
            $request->session()->put('message', 'User has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.users');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.users');
        }
    }
    public function deleteUser(Request $request, $id)
    {
        try{
            $user = $this->userService->getUserById($id);
            if(!$user){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->userService->delete($user);
            $request->session()->put('message', 'User has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.users');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.users');
        }
    }
    public function changePassword(Request $request, $id)
    {
        try{
            $user = $this->userService->getUserById($id);
            if(!$user){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.users.change-password')->with('user', $user);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->back();
        }
    }
    public function updateChangePassword(Request $request)
    {
        try {
            $user = $this->userService->getUserById($request->id);
            if ($user) {
                $data['password'] = Hash::make($request->password);
                $this->userService->update($user, $data);
                $request->session()->put('message', 'Password has been changed successfully.');
                $request->session()->put('alert-type', 'alert-success');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->back();
        }
    }
}