<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table = "customer";
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'path',
        'id_kelurahan'
    ];

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahan');
    }
}
