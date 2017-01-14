<?php

namespace App\Http\Controllers\Transaksi_barang;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Jobs\Masterbarang\SaveBarangJob;
use App\Jobs\Masterbarang\AddstokbarJob;

use App\Models\data_barang;
use App\Models\ref_jenis_bar;
use App\Models\ref_satuan;
use App\Models\data_log_barang;

class BarangController extends Controller
{
    public function getIndex(){
        $data =[];
        $data['methode'] ='index';
        $data['judul'] ='Data Barang';
        return view('Transaksi_barang.index',$data);

    }

    public function getAjaxbarang(Request $req){
        if($req->ajax()){
            $res = [];
            $out = '';
            $status_barang =[
                1 => 'Aktif',
                2 => 'NonAktif',
            ];
            $items = data_barang::barang($req->all())->paginate($req->limit);
			$total = $items->total();
            if($total > 0):
                $no =1;
                foreach ($items as $item) {
                    $stok_akhir = $item->in - $item->out;
                    $btn ='<button type="button" class="close hapus" onclick="hapus(\'' . $item->nm_barang . '\', ' . $item->id_barang . ');"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' ;
                    $out .='
                            <tr class="barang-'.$item->id_barang.'">
                            <td>'.$no.'</td>
                            <td class="text-middle text-center">
								<a href="javascript:;" title="' . $item->nm_barang . '" data-toggle="tooltip" data-placement="bottom">'.$item->nm_barang . '</a>
								<div  class="tbl-opsi">
									<small>[
										| <a href="' . url('/masterbarang/edit/' . $item->id_barang) . '">Edit</a>
									]</small>
								</div>
							</td>
                                <td class="text-middle text-center">'.$item->kode_barang.'</td>
                                <td class="text-middle text-center">'.@$stok_akhir.'</td>
                                <td class="text-middle text-center">'.$item->nm_satuan.'</td>
                                <td class="text-middle text-center">'.$item->nm_jns_barang.'</td>
                                <td class="text-middle text-center">'.$btn.'</td>

                            </tr>
                        ';
                        $no++;
                }
            else:
                $out = '
                    <tr>
                        <td>Tidak ditemukan data </td>
                    </tr>';
            endif;
            $res['content'] = $out;
		    $res['pagin'] = $items->render();
		return json_encode($res);
        }
    }
    public function getCreate(){
        $data['title'] = 'Tambah Barang';
        $data['mode'] = 'add';
        $data['jenis_bar'] = ref_jenis_bar::all();
        $data['satuan'] = ref_satuan::all();
        return view('Transaksi_barang.add_bar',$data);
    }
    public function postCreate(Request $req){
		$arr = $this->dispatch(new SaveBarangJob($req->all()));
        return redirect('masterbarang/')->withNotif([
               'label' => $arr['label'],
               'err' => $arr['err']
           ]);
	}
    public function getEdit(Request $req,$id){
        $data = data_barang::find($id);
        if($data->count() == 0)
            return redirect('/masterbarang');
            $data['barang'] = data_barang::where('id_barang',$id)->first();
            $data['mode'] = 'edit';
            $data['title'] ='Edit Data Barang';
            $data['jenis_bar'] = ref_jenis_bar::all();
            $data['satuan'] = ref_satuan::all();
            return view('Transaksi_barang.add_bar',$data);
    }

    public function postDestroy(Request $req){
    		$barang = data_barang::find($req->id);
    		$barang->update([
    			'status_barang' => 2
    		]);
    		return json_encode([
    			'result' => true
    		]);
    	}
    public function getMasuk(Request $req){
        $data =[];
        $data['methode'] ='masuk';
        $data['judul'] ='Data  Stok Barang';
        return view('Transaksi_barang.index',$data);
    }
    public function getAjaxstokbarang(Request $req){
        if($req->ajax()){
            $res = [];
            $out = '';
            $status_barang =[
                1 => 'Aktif',
                2 => 'NonAktif',
            ];
            $items = data_barang::barang($req->all())->paginate($req->limit);
			$total = $items->total();
            if($total > 0):
                $no =1;
                foreach ($items as $item) {
                    $stok_akhir = $item->in - $item->out;
                    $btn ='<button type="button" class="close hapus" onclick="hapus(\'' . $item->nm_barang . '\', ' . $item->id_barang . ');"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' ;
                    $out .='
                            <tr class="barang-'.$item->id_barang.'">
                            <td>'.$no.'</td>
                            <td class="text-middle text-center">
								<a href="javascript:;" title="' . $item->nm_barang . '" data-toggle="tooltip" data-placement="bottom">'.$item->nm_barang . '</a>
							</td>
                                <td class="text-middle text-center">'.$item->kode_barang.'</td>
                                <td class="text-middle text-center">'.@$stok_akhir.'</td>
                                <td class="text-middle text-center">'.$item->nm_satuan.'</td>
                                <td class="text-middle text-center">'.$item->nm_jns_barang.'</td>

                            </tr>
                        ';
                        $no++;
                }
            else:
                $out = '
                    <tr>
                        <td>Tidak ditemukan data </td>
                    </tr>';
            endif;
            $res['content'] = $out;
		    $res['pagin'] = $items->render();
		    return json_encode($res);
        }
    }
    public function getAddstok(Request $req){
        $data['title'] = 'Tambah Stok Barang';
        $data['mode'] = 'add';
        return view('Transaksi_barang.add_stok',$data);
    }
    public function postAddstok(Request $req){
        if(count($req->id_barang)==0)
           return redirect()->back()->withNotif([
               'label' => 'danger',
               'err' => '<center>OOps!, Anda Belum Memilih Barang </center>'
           ]);
        $arr = $this->dispatch(new AddstokbarJob($req->all()));
        return redirect('masterbarang/masuk/')->withNotif([
               'label' => $arr['label'],
               'err' => $arr['err']
           ]);
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

            // dd($res);
            return json_encode($res);

        }
    }
    public function getHistory(){
        $data =[];
        $data['methode'] ='index';
        $data['judul'] ='Data History Barang';
        return view('Transaksi_barang.history',$data);

    }
    public function getAjaxlogbarang(Request $req){
        if($req->ajax()){
            $res = [];
            $out = '';

            $items = data_log_barang::barang($req->all())->paginate($req->limit);
            $tipe =[
                1 => 'Masuk',
                2 => 'Keluar',
                3 => 'Update',
            ];
			$total = $items->total();
            if($total > 0):
                $no =1;
                foreach ($items as $item) {
                    $out .='
                            <tr class="barang-'.$item->id_log_barang.'">
                            <td>'.$no.'</td>
                            <td class="text-middle text-center">
								<a href="javascript:;" title="' . $item->nm_barang . '" data-toggle="tooltip" data-placement="bottom">'.$item->nm_barang . '</a>
							</td>
                                <td class="text-middle text-center">'.$item->kode_barang.'</td>
                                <td class="text-middle text-center">'.@$item->qty_masuk.'</td>
                                <td class="text-middle text-center">'.@$item->qty_keluar.'</td>
                                <td class="text-middle text-center">'.$item->nm_satuan.'</td>
                                <td class="text-center">' .$tipe[$item->tipe] . '</td>

                            </tr>
                        ';
                        $no++;
                }
            else:
                $out = '
                    <tr>
                        <td>Tidak ditemukan data </td>
                    </tr>';
            endif;
            $res['content'] = $out;
		    $res['pagin'] = $items->render();
		return json_encode($res);
        }
    }
}
