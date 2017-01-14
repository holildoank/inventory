<?php

namespace App\Jobs\Masterbarang;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Models\data_barang;
use App\Models\data_log_barang;
use App\Models\Views\view_barang;

class SaveBarangJob extends Job implements SelfHandling
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

               if ($this->req['mode']=='add') {
                   $barang = data_barang::create([
                       'nm_barang'      => $this->req['nm_barang'],
                       'in'             => $this->req['in'],
                       'harga_jual'     => $this->req['harga_jual'],
                       'harga_beli'     => $this->req['harga_beli'],
                       'id_satuan'      => $this->req['id_satuan'],
                       'keterangan'     => $this->req['keterangan'],
                       'id_jenis_barang'    => $this->req['id_jenis_barang'],
                       'status_barang'  => 1, // 1 barang aktif */ Barang sudah tidak aktif
                   ]);
                   $format = date('dY') .'/' .'BAR/'.'';
                   $urut = view_barang::where('tahun', date('Y'))->first();

                   $no = $format . \Format::code($urut->jumlah);
                   $barang->kode_barang = $no;
                   $barang->save();
                   //log_barang
                   data_log_barang::create([
                       'id_barang' => $barang->id_barang,
                       'qty_masuk'      =>$this->req['in'],
                       'keterangan'     =>'Barang Masuk' .$this->req['in'],
                       'tgl_transaksi'      =>date('Y-m-d', strtotime($this->req['tgl_transaksi'])),
                       'tipe'       =>1,
                       'id_karyawan'        =>$me,
                   ]);
               }else{ // edit

                   $cek = data_barang::where('id_barang',$this->req['id_barang'])->first();
                   if ($this->req['stok_penyesuain'] > $this->req['stok']) {
                       $hasil_out=(($this->req['stok_penyesuain']) - $cek->in);
                   }else{
                       $hasil_out=($cek->in - ($this->req['stok_penyesuain']));
                   }
                   $retOut = ($hasil_out > 0) ? $hasil_out : $cek->in ;

                   data_barang::where('id_barang',$this->req['id_barang'])->update([
                       'nm_barang'            => $this->req['nm_barang'],
                       'in'                   => $cek->in,
                       'out'                  => $retOut,
                       'harga_jual'           => $this->req['harga_jual'],
                       'harga_beli'           => $this->req['harga_beli'],
                       'id_satuan'            => $this->req['id_satuan'],
                       'keterangan'           => $this->req['keterangan'],
                       'id_jenis_barang'      => $this->req['id_jenis_barang'],
                    ]);
               }
              \DB::commit();
               return [
                   'res' => true,
                   'label' => 'success',
                   'err' => '<center>Tambah Barang berhasil dibuat dengan Kode Barang. #' . $no . '</center>'
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
