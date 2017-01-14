<?php

namespace App\Jobs\Masterbarang;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Models\data_barang;
use App\Models\data_log_barang;
use App\Models\data_transaksi;
use App\Models\data_transaksi_detail;
use App\Models\Views\view_transaksi;
class TransaksiJob extends Job implements SelfHandling
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
        //    dd($this->req);
           $me = \Me::data()->id_karyawan;
            try{
               \DB::begintransaction();

               

               $barang =data_transaksi::create([
                   'id_karyawan'      =>$me,
                   'tgl_transaksi'        =>date('Y-m-d', strtotime($this->req['tgl_transaksi'])),
                   'status_transaksi'     =>1,
                   'catatan'      =>$this->req['keterangan'],
                   'wajib_bayar'      =>$this->req['grandtotal'],
                   'jumlah_bayar'     =>$this->req['total_bayar'],
               ]);
               $format = 'TR'.'/'.date('dY') .'';
               $urut = view_transaksi::where('tahun', date('Y'))->first();
               $no = $format . \Format::code($urut->jumlah);
               $barang->nomor_transaksi = $no;
               $barang->save();

               if(!empty($this->req['id_barang']) && ($this->req['id_barang']) > 0){
                 foreach ($this->req['id_barang'] as $a => $b) {
                     data_transaksi_detail::create([
                         'id_transaksi'     =>$barang->id_transaksi,
                         'id_barang'        =>$this->req['id_barang'][$a],
                         'jumlah_out'       =>$this->req['jumlah_input'][$a],
                         'id_satuan'        =>$this->req['id_satuan'][$a],
                         'harga_jual'       =>$this->req['harga_jual'][$a],
                         'total_harga_item'     =>$this->req['total'][$a],
                     ]);
                     $addbar=data_barang::find($this->req['id_barang'][$a]);
                     $addbar->update([
                         'out'        => $addbar->out + $this->req['jumlah_input'][$a],
                      ]);

                     if(!empty($this->req['id_barang'][$a])){
                                  data_log_barang::create([
                                      'id_barang' => $this->req['id_barang'][$a],
                                      'qty_masuk'      =>$this->req['jumlah_input'][$a],
                                      'keterangan'     =>'Barang Keluar' .$this->req['jumlah_input'][$a],
                                      'tgl_transaksi'  =>date('Y-m-d', strtotime($this->req['tgl_transaksi'])),
                                      'tipe'       =>2,
                                      'id_karyawan'        =>$me,
                                  ]);

                             }
                 }

              }
              \DB::commit();
               return [
                   'res' => true,
                   'label' => 'success',
                   'err' => '<center>Transak Barang Keluar berhasil dibuat </center>'
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
