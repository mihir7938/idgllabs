<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateColor extends Model
{
    use HasFactory;

    protected $table = 'certi_color';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'certificate_id',
        'color_id',
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'color_id');
    }
}
