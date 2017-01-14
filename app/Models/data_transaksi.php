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
        public function scopeTransaksi($query,array $req){
        		$items = $query->leftjoin('data_karyawan', 'data_karyawan.id_karyawan', '=', 'data_transaksi.id_karyawan');
        		if(!empty($req['nomor_transaksi']))
        			$items->where('data_transaksi.nomor_transaksi', 'LIKE',  '%' .$req['nomor_transaksi'] . '%');
        	}

}
