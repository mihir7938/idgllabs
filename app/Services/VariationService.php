<?php

namespace App\Services;

use App\Models\Variation;

class VariationService
{

    public function getAllVariations($type_id)
    {
        return Variation::where('variation_type_id', $type_id)->orderBy('created_at', 'desc')->get();
    }

    public function getVariationById($id, $type_id)
    {
        return Variation::where('id', $id)->where('variation_type_id', $type_id)->first();
    }

    public function create($data)
    {
        return Variation::create($data);
    }

    public function update($variations, $data)
    {
        return $variations->update($data);
    }

    public function delete($variations)
    {
        return $variations->delete($variations);
    }
}
