<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationType extends Model
{
    use HasFactory;
    protected $table = 'variation_types';

    public const SHAPE_VARIATION_ID = 1;
    public const COLOR_VARIATION_ID = 2;
    public const CLARITY_VARIATION_ID = 3;
}
