<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_log_barang extends Model
{
    protected $table 		= 'data_log_barang';
	protected $primaryKey 	= 'id_log_barang';
	protected $fillable 		= [
    'id_barang',
    'qty_masuk',
    'qty_keluar',
    'keterangan',
    'tgl_transaksi',
    'tipe',
    'id_karyawan',
];

public function scopeBarang($query,array $req){
        $items = $query->join('data_barang','data_barang.id_barang','=','data_log_barang.id_barang')
                ->leftjoin('ref_satuan', 'ref_satuan.id_satuan', '=', 'data_barang.id_satuan');
        if(!empty($req['kode_barang']))
            $items->where('data_barang.kode_barang', 'LIKE',  '%' .$req['kode_barang'] . '%');
        if(!empty($req['nm_barang']))
            $items->where('data_barang.nm_barang', 'LIKE', '%' . $req['nm_barang'] . '%');
    }

}
