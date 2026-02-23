<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateClarity extends Model
{
    use HasFactory;

    protected $table = 'certi_clarity';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'certificate_id',
        'clarity_id',
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'clarity_id');
    }
}
