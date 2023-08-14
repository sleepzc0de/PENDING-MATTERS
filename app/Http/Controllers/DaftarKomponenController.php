<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\Komponen;
use App\Models\KomponenPM;
use App\Models\PendingMattersModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarKomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // VALIDASI DATA
            $request->validate([
                'ID_PENDING_MATTERS_MULTI_KOMPONEN' => 'required',
                'UIC_KOMPONEN' => 'required',
                'PENDING_MATTERS_KOMPONEN' => 'required',
                'CAPAIAN_AKTUAL_KOMPONEN' => 'required',
                'PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN' => 'required',
                'PENJELASAN_CAPAIAN_KOMPONEN' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN' => 'required',


            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'ID_PENDING_MATTERS_MULTI_KOMPONEN' => $request->ID_PENDING_MATTERS_MULTI_KOMPONEN,
                'UIC_KOMPONEN' => $request->UIC_KOMPONEN,
                'PENDING_MATTERS_KOMPONEN' => $request->PENDING_MATTERS_KOMPONEN,
                'CAPAIAN_AKTUAL_KOMPONEN' => $request->CAPAIAN_AKTUAL_KOMPONEN,
                'PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN' => $request->PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN,
                'PENJELASAN_CAPAIAN_KOMPONEN' => $request->PENJELASAN_CAPAIAN_KOMPONEN,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN,
                'FLAG_KOMPONEN_KOMPONEN' => 'MULTI_KOMPONEN_DETAIL'

            ];

            KomponenPM::create($data);

            //redirect to index
            return redirect()->back()->with(['success' => 'Data Komponen PM Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data Komponen PM Gagal Disimpan! error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = Iku::where('iku.id', $id)->join('komponen', 'iku.id', '=', 'komponen.ID_IKU_MULTI_KOMPONEN')->get();
        // dd($data);
        $current = $id;
        $data = PendingMattersModel::where('pending_matters.id', $id)->leftjoin('komponen_pm', 'pending_matters.id', '=', 'komponen_pm.ID_PENDING_MATTERS_MULTI_KOMPONEN')->first();
        // $test = Iku::where('iku.id', $id)->leftjoin('komponen', 'iku.id', '=', 'komponen.ID_IKU_MULTI_KOMPONEN')->get();
        // dd(count($test));
        $query = PendingMattersModel::where('pending_matters.id', $id)->join('komponen_pm', 'pending_matters.id', '=', 'komponen_pm.ID_PENDING_MATTERS_MULTI_KOMPONEN')->get();
        if (request()->ajax()) {
            return datatables()->of($query)
                ->addColumn('opsi', function ($query) {
                    $edit = route('daftar-komponen.edit', $query->id);
                    $hapus = route('daftar-komponen.destroy', $query->id);


                    return '<div class="d-inline-flex">



                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <!-- sample modal content -->
                                <div id="myModal_' . $query->id . '" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align-center" class="modal-title" id="myModalLabel">Pending Matters : ' . $query->PENDING_MATTERS . '</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">

                                            <label  for="NamaIKU">Komponen Pending Item</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->PENDING_MATTERS_KOMPONEN . '" disabled>

                                            <label  for="NamaIKU">UIC Komponen</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->UIC_KOMPONEN . '" disabled>

                                            <label class="mt-2" for="NamaIKU">Realisasi Komponen</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_AKTUAL_KOMPONEN . '" disabled>

                                            <div class="row">
                                             <div class="col-md-12 mt-3">
                                        <label for="PROGRES"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Progres</label>
                                    </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN">Status</label>
                                           <textarea class="form-control" rows="3" placeholder="' . $query->KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN . '" disabled></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="PENJELASAN_CAPAIAN_KOMPONEN">Penjelasan</label>
                                           <textarea class="form-control" rows="3" placeholder="' . $query->PENJELASAN_CAPAIAN_KOMPONEN . '" disabled></textarea>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-12 mt-3">
                                        <label for="TINDAK_LANJUT"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Tindak Lanjut</label>
                                    </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN">Aktivitas Lanjutan</label>
                                            <textarea class="form-control" rows="3" placeholder="' . $query->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN . '" disabled></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN">Jadwal Penyelesaian</label>
                                            <textarea class="form-control" rows="3" placeholder="' . $query->PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN . '" disabled></textarea>
                                            </div>
                                            </div>

                                            

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                 <a href="#" alt="default" data-toggle="modal" data-target="#myModal_' . $query->id . '" class="model_img img-fluid"><button type="button" class="ml-1 btn btn-info"><i class="fa fas fa-eye"></i></button></a>
                                                        <a href="' . $edit . '"><button type="button" class="ml-1 btn btn-warning"><i class="fas fa-pencil-alt"></i></button></a>
                                                        <form action="' . $hapus . '" method="POST">
        											' . @csrf_field() . '
        											' . @method_field('DELETE') . '
        											 <button type="submit" class="ml-1 btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        											</form>
                                                    </div>

                    </div>
                ';
                })
                ->rawColumns(['opsi',])
                ->addIndexColumn()
                ->make(true);
        }
        // dd($data);


        return view('_superadmin_._pm_.show_daftar_komponen', compact(['query', 'current', 'data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KomponenPM::findOrFail($id);

        // dd($data);
        return view('_superadmin_.edit_daftar_komponen', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // VALIDASI DATA
            $request->validate([
                'UIC_KOMPONEN' => 'required',
                'PENDING_MATTERS_KOMPONEN' => 'required',
                'CAPAIAN_AKTUAL_KOMPONEN' => 'required',
                'PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN' => 'required',
                'PENJELASAN_CAPAIAN_KOMPONEN' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN' => 'required',


            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'UIC_KOMPONEN' => $request->UIC_KOMPONEN,
                'PENDING_MATTERS_KOMPONEN' => $request->PENDING_MATTERS_KOMPONEN,
                'CAPAIAN_AKTUAL_KOMPONEN' => $request->CAPAIAN_AKTUAL_KOMPONEN,
                'PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN' => $request->PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN,
                'PENJELASAN_CAPAIAN_KOMPONEN' => $request->PENJELASAN_CAPAIAN_KOMPONEN,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN,

            ];

            KomponenPM::findOrFail($id)->update($data);

            //redirect to index
            return redirect()->back()->with(['success' => 'Data Pending Item Komponen Berhasil Diupdate!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data Pending Item Komponen Gagal Diupdate! error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            KomponenPM::findOrFail($id)->delete();
            return redirect()->back()->with('success', "Daftar  Pending Item Komponen berhasil dihapus!");
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data  Pending Item Komponen Yang Dihapus Tidak Ada ! error :' . $e->getMessage()]);
        }
    }
}
