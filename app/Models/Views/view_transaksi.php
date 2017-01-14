<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class view_transaksi extends Model
{
    protected $table 	= 'view_transaksi';
   protected $fillable = [
       'tahun',
       'jumlah'
   ];
}
