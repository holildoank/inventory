<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_transaksi extends Model
{
    protected $table 		= 'data_transaksi';
	protected $primaryKey 	= 'id_transaksi';
	protected $fillable 		= [

            'nomor_transaksi',
            'id_karyawan',
            'tgl_transaksi',
            'status_transaksi',
            'catatan',
            'wajib_bayar',
            'jumlah_bayar',
        ];

}
