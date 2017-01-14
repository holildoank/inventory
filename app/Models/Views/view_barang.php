<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class view_barang extends Model
{
    protected $table 	= 'view_barang';
   protected $fillable = [
       'tahun',
       'jumlah'
   ];
}
