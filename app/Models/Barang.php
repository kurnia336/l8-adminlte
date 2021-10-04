<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $table = "barang";
    protected $primaryKey = 'idbarang';
    protected $fillable = [
        'nama_barang',
        'barcode_kode'
    ];
}
