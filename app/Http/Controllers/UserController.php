<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\UserService;
use App\Services\ClientService;
use App\Services\CertificateService;
use App\Models\Certificate;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $imageService, $userService, $clientService, $certificateService;

    public function __construct (
        UploadImageService $imageService,
        UserService $userService,
        ClientService $clientService,
        CertificateService $certificateService
    )
    {
        $this->imageService = $imageService;
        $this->userService = $userService;
        $this->clientService = $clientService;
        $this->certificateService = $certificateService;
    }

    public function index(Request $request)
    {
        $total_clients = $this->clientService->getTotalClients();
        $total_certificates = Certificate::where('user_id', Auth::user()->id)->count();
        return view('users.index')->with('total_clients', $total_clients)->with('total_certificates', $total_certificates);
    }
}