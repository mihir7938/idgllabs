<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'summary_no',
        'certificate_date',
        'client_id',
        'company_name',
        'gst_no',
        'name',
        'address',
        'pdf',
        'weight',
        'refractive_index',
        'specific_gravity',
        'hardness',
        'origin',
        'measure',
        'description',
        'comment',
        'identification',
        'image',
        'qr_code',
        'status',
    ];

    public function shapes()
    {
        return $this->hasMany(CertificateShape::class, 'certificate_id');
    }

    public function colors()
    {
        return $this->hasMany(CertificateColor::class, 'certificate_id');
    }

    public function clarities()
    {
        return $this->hasMany(CertificateClarity::class, 'certificate_id');
    }
}
