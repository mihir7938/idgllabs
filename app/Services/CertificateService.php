<?php

namespace App\Services;

use App\Models\Certificate;

class CertificateService
{

    public function getAllCertificates($per_page = -1)
    {
        if($per_page == -1){
            return Certificate::orderBy('created_at', 'desc')->get();    
        }
        return Certificate::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getTotalCertificates()
    {
        return Certificate::count(); 
    }

    public function getCertificateById($id)
    {
        return Certificate::find($id);
    }

    public function create($data)
    {
        return Certificate::create($data);
    }

    public function update($certificates, $data)
    {
        return $certificates->update($data);
    }

    public function delete($certificates)
    {
        return $certificates->delete($certificates);
    }
}