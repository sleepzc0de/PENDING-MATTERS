<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\PendingMattersModel;
use Exception;
use Illuminate\Http\Request;

class SatuKomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuUsers = 'active';
        $query = PendingMattersModel::select('*')->where('FLAG_KOMPONEN', 'SATU_KOMPONEN');
        if (request()->ajax()) {
            return datatables()->of($query)
                ->addColumn('opsi', function ($query) {
                    $preview = route('satu_komponen.show', $query->id);
                    $edit = route('satu_komponen.edit', $query->id);
                    $hapus = route('satu_komponen.destroy', $query->id);
                    return '<div class="d-inline-flex">
                    

                    
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <!-- sample modal content -->
                                <div id="myModal_' . $query->id . '" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align-center" class="modal-title" id="myModalLabel">PENDING ITEM  : ' . $query->PENDING_MATTERS . '</h4>
                                                <br>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">

                                            <div class="mt-2">
                                            <label  for="NamaIKU" style="justify-content: left;display: flex;align-items: left;">Pending Item</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->PENDING_MATTERS . '" disabled>
                                            </div>
                                            <div class="mt-2">
                                            <label  for="NamaIKU" style="justify-content: left;display: flex;align-items: left;">Unit In Charge</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->UIC . '" disabled>
                                            </div>
                                            <div class="mt-2">
                                             <label  for="NamaIKU" style="justify-content: left;display: flex;align-items: left;">Realisasi</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_AKTUAL . '" disabled>
                                            </div>
                                

                                            <div class="row mt-2">
                                            <div class="col-md-12">
                                        <label for="PROGRESS"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Progres</label>
                                    </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Status</label>
                                              <textarea class="form-control" rows="3" placeholder="' . $query->KEGIATAN_YANG_TELAH_DILAKSANAKAN . '" disabled></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Penjelasan</label>
                                              <textarea class="form-control" rows="3" placeholder="' . $query->PENJELASAN_CAPAIAN . '" disabled></textarea>
                                            </div>
                                            </div>

                                            <div class="row mt-2">
                                            <div class="col-md-12">
                                        <label for="TINDAK_LANJUT"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Tindak Lanjut</label>
                                    </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Aktivitas Lanjutan</label>
                                              <textarea class="form-control" rows="3" placeholder="' . $query->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI . '" disabled></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                           <label class="mt-2" for="NamaIKU">Jadwal Penyelesaian</label>
                                              <textarea class="form-control" rows="3" placeholder="' . $query->PENJELASAN_PENDING_MATTERS_KOMPONEN . '" disabled></textarea>
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
                                
                                 <a href="#" alt="default" data-toggle="modal" data-target="#myModal_' . $query->id . '" class="model_img img-fluid"><button type="button" class="ml-1 btn btn-info" data-toggle="tooltip" data-placement="top" title="Preview IKU"><i class="fa fas fa-eye"></i></button></a>
                                                        
                                                        <a href="' . $edit . '"><button type="button" class="ml-1 btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></button></a>
                                                        <form action="' . $hapus . '" method="POST">
													' . @csrf_field() . '
													' . @method_field('DELETE') . '
													 <button type="submit" class="ml-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
													</form>
                                                    </div>
                    
                    </div>
                ';
                })
                ->rawColumns(['opsi',])
                ->addIndexColumn()
                ->make(true);
        }
        return view('_superadmin_._pm_.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategori = ref_kategori::get();
        return view('_superadmin_._pm_.create');
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
                'PENDING_MATTERS' => 'required',
                'UIC' => 'required',
                'CAPAIAN_AKTUAL' => 'required',
                'TARGET_AKTUAL' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => 'required',
                'PENJELASAN_CAPAIAN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => 'required',
                'PENJELASAN_PENDING_MATTERS_KOMPONEN' => 'required',


            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'PENDING_MATTERS' => $request->PENDING_MATTERS,
                'UIC' => $request->UIC,
                'CAPAIAN_AKTUAL' => $request->CAPAIAN_AKTUAL,
                'TARGET_AKTUAL' => $request->TARGET_AKTUAL,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN,
                'PENJELASAN_CAPAIAN' => $request->PENJELASAN_CAPAIAN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI,
                'PENJELASAN_PENDING_MATTERS_KOMPONEN' => $request->PENJELASAN_PENDING_MATTERS_KOMPONEN,
                'FLAG_KOMPONEN' => 'SATU_KOMPONEN'

            ];

            PendingMattersModel::create($data);

            //redirect to index
            return redirect()->back()->with(['success' => 'Data Pending Matters Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data Pending Matters Gagal Disimpan! error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $data = Iku::where('FLAG_KOMPONEN', 'SATU_KOMPONEN')->findOrFail($id);
    //     // dd($data);

    //     return view('_superadmin_.show', compact(['data']));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $kategori = ref_kategori::all();
        $pm = PendingMattersModel::where('FLAG_KOMPONEN', 'SATU_KOMPONEN')->findOrFail($id);
        // dd($berita);
        return view('_superadmin_._pm_.edit_pm_satu_komponen', compact(['pm']));
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
                'PENDING_MATTERS' => 'required',
                'UIC' => 'required',
                'CAPAIAN_AKTUAL' => 'required',
                'TARGET_AKTUAL' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => 'required',
                'PENJELASAN_CAPAIAN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => 'required',
                'PENJELASAN_PENDING_MATTERS_KOMPONEN' => 'required',


            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'PENDING_MATTERS' => $request->PENDING_MATTERS,
                'UIC' => $request->UIC,
                'CAPAIAN_AKTUAL' => $request->CAPAIAN_AKTUAL,
                'TARGET_AKTUAL' => $request->TARGET_AKTUAL,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN,
                'PENJELASAN_CAPAIAN' => $request->PENJELASAN_CAPAIAN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI,
                'PENJELASAN_PENDING_MATTERS_KOMPONEN' => $request->PENJELASAN_PENDING_MATTERS_KOMPONEN,
                'FLAG_KOMPONEN' => 'SATU_KOMPONEN'

            ];

            PendingMattersModel::where('FLAG_KOMPONEN', 'SATU_KOMPONEN')->findOrFail($id)->update($data);
            // $berita = Berita::find($id)->update($data);
            return redirect()->route('pending-matters-home.index')->with('success', "Pending Item berhasil diupdate!");
        } catch (Exception $e) {
            return redirect()->route('pending-matters-home.index')->with(['failed' => 'Data Pending Item Gagal Di Update! error :' . $e->getMessage()]);
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
            PendingMattersModel::where('FLAG_KOMPONEN', 'SATU_KOMPONEN')->findOrFail($id)->delete();
            return redirect()->route('pending-matters-home.index')->with('success', "Data Pending Item berhasil dihapus!");
        } catch (Exception $e) {
            return redirect()->route('pending-matters-home.index')->with(['failed' => 'Data Pending Item Yang Dihapus Tidak Ada ! error :' . $e->getMessage()]);
        }
    }
}
