<?php

namespace App\Jobs\Masterbarang;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Models\data_barang;
use App\Models\data_log_barang;
use App\Models\Views\view_barang;

class AddstokbarJob extends Job implements SelfHandling
{
    public $req;

       /**
        * Create a new job instance.
        *
        * @return void
        */
       public function __construct(array $req) {
           $this->req = $req;
       }

       /**
        * Execute the job.
        *
        * @return void
        */
       public function handle() {
           $me = \Me::data()->id_karyawan;
            try{
               \DB::begintransaction();
               if(!empty($this->req['id_barang']) && ($this->req['id_barang']) > 0){
                 foreach ($this->req['id_barang'] as $a => $b) {
                    $addbar=data_barang::find($this->req['id_barang'][$a]);
                    $addbar->update([
                        'in'        => $addbar->in + $this->req['jumlah_input'][$a],
                     ]);

                     if(!empty($this->req['id_barang'][$a])){
                                  data_log_barang::create([
                                      'id_barang' => $this->req['id_barang'][$a],
                                      'qty_masuk'      =>$this->req['jumlah_input'][$a],
                                      'keterangan'     =>'Barang Masuk' .$this->req['jumlah_input'][$a],
                                      'tgl_transaksi'  =>date('Y-m-d', strtotime($this->req['tgl_transaksi'])),
                                      'tipe'       =>1,
                                      'id_karyawan'        =>$me,
                                  ]);

                             }
                 }

              }
              \DB::commit();
               return [
                   'res' => true,
                   'label' => 'success',
                   'err' => '<center>Tambah Stok Barang berhasil dibuat dengan </center>'
               ];
           }catch(\Exception $e){
               \DB::rollback();
               return [
                   'res' => false,
                   'label' => 'danger',
                   'err' => $e->getMessage()
               ];

           }

       }
   }
