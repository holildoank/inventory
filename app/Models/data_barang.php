<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_barang extends Model
{
    protected $table = 'data_barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'kode_barang',
        'nm_barang',
        'in',
        'harga_jual',
        'tgl_masuk',
        'harga_beli',
        'out',
        'id_satuan',
        'keterangan',
        'id_jenis_barang',
        'status_barang', // 1 barang aktif */ Barang sudah tidak aktif
    ];
    public function scopeBarang($query,array $req){
    		$items = $query->leftjoin('ref_satuan', 'ref_satuan.id_satuan', '=', 'data_barang.id_satuan')
                    ->leftjoin('ref_jenis_bar','ref_jenis_bar.id_jenis_barang','=','data_barang.id_jenis_barang')
                    ->whereIn('status_barang',[1]);
    		if(!empty($req['kode_barang']))
    			$items->where('data_barang.kode_barang', 'LIKE',  '%' .$req['kode_barang'] . '%');
    		if(!empty($req['nm_barang']))
    			$items->where('data_barang.nm_barang', 'LIKE', '%' . $req['nm_barang'] . '%');
    	}
}
