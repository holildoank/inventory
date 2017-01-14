<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ref_jenis_bar extends Model
{
    protected $table 		= 'ref_jenis_bar';
	protected $primaryKey 	= 'id_jenis_barang';
	protected $fillable 		= [
            'id_jenis_barang',
            'nm_jenis_bar',
        ];

}
