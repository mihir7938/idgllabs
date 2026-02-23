<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{

    public function getAllClients($per_page = -1)
    {
        if($per_page == -1){
            return Client::orderBy('created_at', 'asc')->get();    
        }
        return Client::orderBy('created_at', 'asc')->paginate($per_page);
    }

    public function getTotalClients()
    {
        return Client::count(); 
    }

    public function getClientById($id)
    {
        return Client::find($id);
    }

    public function create($data)
    {
        return Client::create($data);
    }

    public function update($clients, $data)
    {
        return $clients->update($data);
    }

    public function delete($clients)
    {
        return $clients->delete($clients);
    }
}