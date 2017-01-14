<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_transaksi_detail extends Model
{
    protected $table 		= 'data_transaksi_detail';
	protected $primaryKey 	= 'id_transaksi_detail';
	protected $fillable 		= [
    'id_transaksi',
    'id_barang',
    'jumlah_out',
    'id_satuan',
    'harga_jual',
    'dihapus_pada',
    'total_harga_item',
];

}
