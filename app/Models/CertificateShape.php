<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateShape extends Model
{
    use HasFactory;

    protected $table = 'certi_shape';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'certificate_id',
        'shape_id',
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'shape_id');
    }
}
