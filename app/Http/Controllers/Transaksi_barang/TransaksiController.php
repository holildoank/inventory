<?php

namespace App\Http\Controllers\Transaksi_barang;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\Masterbarang\TransaksiJob;


use App\Models\data_barang;
use App\Models\ref_jenis_bar;
use App\Models\ref_satuan;
use App\Models\data_log_barang;

class TransaksiController extends Controller
{

    public function getIndex(){
        $data =[];
        $data['methode'] ='index';
        $data['title'] = 'Form Transasi';
        $data['mode']   = 'add';
        $data['judul'] ='Form Transaksi Barang';
        return view('Transaksi.create',$data);
    }
    public function getLoadbarang(Request $req){
        if($req->ajax()){
            $res = [];
            $out = '';
            $items = data_barang::barang($req->all())->paginate(5);
            //dd($items);
            $total = $items->total();
            if($total > 0):
                foreach($items as $item){
                    $akhir =$item->in - $item->out ;
                    $out .= '
                        <tr class="barang1-' . $item->id_barang . '">
                            <td>' . $item->kode_barang . '</td>
                            <td>' . $item->nm_barang . ' <small class="pull-right hide barang-loading-' . $item->id_barang . '">Memuat...</small></td>
                            <td>' . number_format($item->harga_jual,0,',','.') . ' <small class="pull-right hide barang-loading-' . $item->id_barang . '">Memuat...</small></td>
                            <td>' . $akhir.  ' '.$item->nm_satuan.'<small class="pull-right hide barang-loading-' . $item->id_barang . '">Memuat...</small></td>
                            <td class="text-right">

                            <button class="btn btn-white btn-small btn-barang-' . $item->id_barang . '" onclick="add_barang(' . $item->id_barang . ');"><i class="fa fa-plus"></i></button></td>
                        </tr>
                    ';
                }
            else:
                $out = '
                    <tr>
                        <td colspan="3">Tidak ditemukan</td>
                    </tr>
                ';
            endif;

            $res['total'] = $total;
            $res['content'] = $out;
            $res['pagin'] = $items->render();
            return json_encode($res);
        }
    }
    public function getAddbarang(Request $req){
        if($req->ajax()){
            $res = [];
            $out = '';
                $item= data_barang::leftjoin('ref_satuan', 'ref_satuan.id_satuan', '=', 'data_barang.id_satuan')
                        ->leftjoin('ref_jenis_bar','ref_jenis_bar.id_jenis_barang','=','data_barang.id_jenis_barang')
                        ->whereIn('status_barang',[1])
                        ->where('data_barang.id_barang', $req->id)

                    ->first();
            $res['item'] = $item;
            $res['content'] = $out;
            return json_encode($res);

        }
    }
    public function postTransaksi(Request $req){
        if(count($req->id_barang)==0)
           return redirect()->back()->withNotif([
               'label' => 'danger',
               'err' => '<center>OOps!, Anda Belum Memilih Barang </center>'
           ]);
        $arr = $this->dispatch(new TransaksiJob($req->all()));
        return redirect('transaksi/')->withNotif([
               'label' => $arr['label'],
               'err' => $arr['err']
           ]);
    }

}
