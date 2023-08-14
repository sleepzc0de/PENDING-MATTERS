<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\PendingMattersModel;
use Exception;
use Illuminate\Http\Request;

class MultiKomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuUsers = 'active';
        $query = PendingMattersModel::select('*')->where('FLAG_KOMPONEN', 'MULTI_KOMPONEN');
        if (request()->ajax()) {
            return datatables()->of($query)
                ->addColumn('opsi', function ($query) {

                    $preview = route('multi_komponen.show', $query->id);
                    $daftar_komponen = route('daftar-komponen.show', $query->id);
                    $edit = route('multi_komponen.edit', $query->id);
                    $hapus = route('multi_komponen.destroy', $query->id);
                    $addkomponen = route('multi_komponen_detail_admin_pm', $query->id);
                    return '<div class="d-inline-flex">
                    

                    
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                    <!-- sample modal content -->
                                <div id="myModal_' . $query->id . '" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align-center" class="modal-title" id="myModalLabel">Detail Indikator Kinerja Utama</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">

                                            <label  for="NamaIKU">Kode SS/IKU</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->KODE_SS . '" readonly>

                                            <label  for="NamaIKU">Nama IKU</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->IKU . '" readonly>

                                            <label class="mt-2" for="DefinisiIKU">Definisi IKU</label>
                                            <textarea class="form-control" rows="3" placeholder="' . $query->DEFINISI_IKU . '" readonly></textarea>

                                            <label class="mt-2" for="FormulaIKU">Formula IKU</label>
                                            <textarea class="form-control" rows="3" placeholder="' . $query->FORMULA_IKU . '" readonly></textarea>

                                            <label class="mt-2" for="NamaIKU">Komponen Pengukuran</label>
                                            <textarea class="form-control" rows="3" placeholder="' . $query->KOMPONEN_PENGUKURAN . '" readonly></textarea>


                                            <label class="mt-2" for="NamaIKU">Penjelasan IKU / Komponen</label>
                                            <textarea class="form-control" rows="3" placeholder="' . $query->PENJELASAN_IKU_KOMPONEN . '" readonly></textarea>

                                            <label class="mt-2" for="NamaIKU">UIC</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->UIC . '" readonly>

                                            <div class="row">
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Target Q1</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->TARGET_Q1 . '" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Capaian Q1</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_Q1 . '" readonly>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Target Q2</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->TARGET_Q2 . '" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Capaian Q2</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_Q2 . '" readonly>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Target Q3</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->TARGET_Q3 . '" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Capaian Q3</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_Q3 . '" readonly>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Target Q4</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->TARGET_Q4 . '" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Capaian Q4</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_Q4 . '" readonly>
                                            </div>
                                            </div>
                                             <div class="row">
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Target Aktual</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->TARGET_AKTUAL . '" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                            <label class="mt-2" for="NamaIKU">Capaian Aktual</label>
                                            <input type="text" class="form-control" id="NamaIKU" placeholder="' . $query->CAPAIAN_AKTUAL . '" readonly>
                                            </div>
                                            </div>
                                           <!--
                                             <label class="mt-2" for="NamaIKU">Penjelasan Capaian</label>
                                             <textarea class="form-control" rows="3" placeholder="' . $query->PENJELASAN_CAPAIAN . '" readonly></textarea>

                                            <label class="mt-2" for="NamaIKU">Kegiatan Yang Telah Dilaksanakan</label>
                                             <textarea class="form-control" rows="3" placeholder="' . $query->KEGIATAN_YANG_TELAH_DILAKSANAKAN . '" readonly></textarea>

                                             <label class="mt-2" for="NamaIKU">Rencana Aksi dan Target Penyelesaian Rencana Aksi</label>
                                             <textarea class="form-control" rows="3" placeholder="' . $query->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI . '" readonly></textarea>

                                            <label class="mt-2" for="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN">Permasalahan</label>
                                              <textarea class="form-control" rows="3" placeholder="' . $query->PERMASALAHAN . '" readonly></textarea>
                                              --!>
                                               
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
                                
                                

                                 <a href="' . $daftar_komponen . '"><button type="button" class="ml-1 btn btn-success" data-toggle="tooltip" data-placement="top" title="Preview Daftar Komponen"><i class="fa fas fa-eye"></i></button></a>
                                                        
                                                        <a href="' . $edit . '"><button type="button" class="ml-1 btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></button></a>
                                                        <form action="' . $hapus . '" method="POST">
													' . @csrf_field() . '
													' . @method_field('DELETE') . '
													 <button type="submit" class="ml-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
													</form>
                                                    <a href="' . $addkomponen . '"><button type="button" class="ml-1 btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tambah Komponen"><i class="mr-1 fa fas fa-plus"></i>Komponen</button></a>
                                                    </div>
                    
                    </div>
                ';
                })
                ->rawColumns(['opsi',])
                ->addIndexColumn()
                ->make(true);
        }
        return view('_superadmin_.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategori = ref_kategori::get();
        return view('_superadmin_.create');
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


            ]);
            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'PENDING_MATTERS' => $request->PENDING_MATTERS,
                'UIC' => $request->UIC,
                'CAPAIAN_AKTUAL' => $request->CAPAIAN_AKTUAL,
                'TARGET_AKTUAL' => $request->TARGET_AKTUAL,
                'FLAG_KOMPONEN' => 'MULTI_KOMPONEN'

            ];

            PendingMattersModel::create($data);

            //redirect to index
            return redirect()->back()->with(['success' => 'Data Pending Item Multi Komponen Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data Pending Item Multi Komponen Gagal Disimpan! error :' . $e->getMessage()]);
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
    //     $data = Iku::findOrFail($id);
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
        $iku = PendingMattersModel::where('FLAG_KOMPONEN', 'MULTI_KOMPONEN')->findOrFail($id);
        // dd($berita);
        return view('_superadmin_._pm_.edit_pm_multi_komponen', compact(['iku']));
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



            ]);
            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'PENDING_MATTERS' => $request->PENDING_MATTERS,
                'UIC' => $request->UIC,
                'CAPAIAN_AKTUAL' => $request->CAPAIAN_AKTUAL,
                'TARGET_AKTUAL' => $request->TARGET_AKTUAL,

            ];

            PendingMattersModel::where('FLAG_KOMPONEN', 'MULTI_KOMPONEN')->findOrFail($id)->update($data);
            // $berita = Berita::find($id)->update($data);
            return redirect()->route('pending-matters-home.index')->with('success', "Pending Matters Multi Komponen berhasil diupdate!");
        } catch (Exception $e) {
            return redirect()->route('pending-matters-home.index')->with(['failed' => 'Data Pending Matters Multi Komponen Gagal Di Update! error :' . $e->getMessage()]);
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
            PendingMattersModel::where('FLAG_KOMPONEN', 'MULTI_KOMPONEN')->findOrFail($id)->delete();
            return redirect()->route('pending-matters-home.index')->with('success', "Pending Matters berhasil dihapus!");
        } catch (Exception $e) {
            return redirect()->route('pending-matters-home.index')->with(['failed' => 'Data Yang Dihapus Tidak Ada ! error :' . $e->getMessage()]);
        }
    }
}
