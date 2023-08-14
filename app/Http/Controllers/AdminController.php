<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\Komponen;
use App\Models\PendingMattersModel;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuUsers = 'active';
        $query = PendingMattersModel::select('*');
        if (request()->ajax()) {
            return datatables()->of($query)
                ->addColumn('opsi', function ($query) {
                    $preview = route('_superadmin_.show', $query->id);
                    $edit = route('_superadmin_.edit', $query->id);
                    $hapus = route('_superadmin_.destroy', $query->id);
                    return '<div class="d-inline-flex">
                    <a href="' . $edit . '"><button type="button" class="btn waves-effect waves-light btn-dark">Edit</button></a>

                    <form class="ml-2" action="' . $hapus . '" method="POST">
													' . @csrf_field() . '
													' . @method_field('DELETE') . '
													<button type="button" class="btn waves-effect waves-light btn-danger">Hapus</button>
													</form>
                    
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
                'KODE_SS' => 'required',
                'SS' => 'required',
                'IKU' => 'required',
                'KOMPONEN_PENGUKURAN' => 'required',
                'PENJELASAN_IKU_KOMPONEN' => 'required',
                'UIC' => 'required',
                'QUARTAL_TARGET_1' => 'required',
                'QUARTAL_CAPAIAN_1' => 'required',
                'QUARTAL_TARGET_2' => 'required',
                'QUARTAL_CAPAIAN_2' => 'required',
                'QUARTAL_TARGET_3' => 'required',
                'QUARTAL_CAPAIAN_3' => 'required',
                'QUARTAL_TARGET_4' => 'required',
                'QUARTAL_CAPAIAN_4' => 'required',
                'PENJELASAN_CAPAIAN' => 'required',
                'TARGET_SEMESTERAN' => 'required',
                'CAPAIAN_SEMESTERAN' => 'required',
                'TARGET_SEMESTERAN' => 'required',
                'TARGET_TAHUNAN' => 'required',
                'CAPAIAN_TAHUNAN' => 'required',
                'TARGET_AKTUAL' => 'required',
                'CAPAIAN_AKTUAL' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => 'required',
                'PERMASALAHAN' => 'required',


            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'KODE_SS' => $request->KODE_SS,
                'SS' => $request->SS,
                'IKU' => $request->IKU,
                'KOMPONEN_PENGUKURAN' => $request->KOMPONEN_PENGUKURAN,
                'PENJELASAN_IKU_KOMPONEN' => $request->PENJELASAN_IKU_KOMPONEN,
                'UIC' => $request->UIC,
                'QUARTAL_TARGET_1' => $request->QUARTAL_TARGET_1,
                'QUARTAL_CAPAIAN_1' => $request->QUARTAL_CAPAIAN_1,
                'QUARTAL_TARGET_2' => $request->QUARTAL_TARGET_2,
                'QUARTAL_CAPAIAN_2' => $request->QUARTAL_CAPAIAN_2,
                'QUARTAL_TARGET_3' => $request->QUARTAL_TARGET_3,
                'QUARTAL_CAPAIAN_3' => $request->QUARTAL_CAPAIAN_3,
                'QUARTAL_TARGET_4' => $request->QUARTAL_TARGET_4,
                'QUARTAL_CAPAIAN_4' => $request->QUARTAL_CAPAIAN_4,
                'PENJELASAN_CAPAIAN' => $request->PENJELASAN_CAPAIAN,
                'TARGET_SEMESTERAN' => $request->TARGET_SEMESTERAN,
                'CAPAIAN_SEMESTERAN' => $request->CAPAIAN_SEMESTERAN,
                'TARGET_SEMESTERAN' => $request->TARGET_SEMESTERAN,
                'TARGET_TAHUNAN' => $request->TARGET_TAHUNAN,
                'CAPAIAN_TAHUNAN' => $request->CAPAIAN_TAHUNAN,
                'TARGET_AKTUAL' => $request->TARGET_AKTUAL,
                'CAPAIAN_AKTUAL' => $request->CAPAIAN_AKTUAL,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI,
                'PERMASALAHAN' => $request->PERMASALAHAN,

            ];

            Iku::create($data);

            //redirect to index
            return redirect()->back()->with(['success' => 'Data IKU Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data IKU Gagal Disimpan! error :' . $e->getMessage()]);
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
        $data = Iku::findOrFail($id);
        // dd($data);

        return view('_superadmin_.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $kategori = ref_kategori::all();
        $iku = Iku::findOrFail($id);
        // dd($berita);
        return view('_superadmin_.edit', compact(['iku']));
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
                'KODE_SS' => 'required',
                'SS' => 'required',
                'IKU' => 'required',
                'KOMPONEN_PENGUKURAN' => 'required',
                'PENJELASAN_IKU_KOMPONEN' => 'required',
                'UIC' => 'required',
                'QUARTAL_TARGET_1' => 'required',
                'QUARTAL_CAPAIAN_1' => 'required',
                'QUARTAL_TARGET_2' => 'required',
                'QUARTAL_CAPAIAN_2' => 'required',
                'QUARTAL_TARGET_3' => 'required',
                'QUARTAL_CAPAIAN_3' => 'required',
                'QUARTAL_TARGET_4' => 'required',
                'QUARTAL_CAPAIAN_4' => 'required',
                'PENJELASAN_CAPAIAN' => 'required',
                'TARGET_SEMESTERAN' => 'required',
                'CAPAIAN_SEMESTERAN' => 'required',
                'TARGET_SEMESTERAN' => 'required',
                'TARGET_TAHUNAN' => 'required',
                'CAPAIAN_TAHUNAN' => 'required',
                'TARGET_AKTUAL' => 'required',
                'CAPAIAN_AKTUAL' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => 'required',
                'PERMASALAHAN' => 'required',
            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'KODE_SS' => $request->KODE_SS,
                'SS' => $request->SS,
                'IKU' => $request->IKU,
                'KOMPONEN_PENGUKURAN' => $request->KOMPONEN_PENGUKURAN,
                'PENJELASAN_IKU_KOMPONEN' => $request->PENJELASAN_IKU_KOMPONEN,
                'UIC' => $request->UIC,
                'QUARTAL_TARGET_1' => $request->QUARTAL_TARGET_1,
                'QUARTAL_CAPAIAN_1' => $request->QUARTAL_CAPAIAN_1,
                'QUARTAL_TARGET_2' => $request->QUARTAL_TARGET_2,
                'QUARTAL_CAPAIAN_2' => $request->QUARTAL_CAPAIAN_2,
                'QUARTAL_TARGET_3' => $request->QUARTAL_TARGET_3,
                'QUARTAL_CAPAIAN_3' => $request->QUARTAL_CAPAIAN_3,
                'QUARTAL_TARGET_4' => $request->QUARTAL_TARGET_4,
                'QUARTAL_CAPAIAN_4' => $request->QUARTAL_CAPAIAN_4,
                'PENJELASAN_CAPAIAN' => $request->PENJELASAN_CAPAIAN,
                'TARGET_SEMESTERAN' => $request->TARGET_SEMESTERAN,
                'CAPAIAN_SEMESTERAN' => $request->CAPAIAN_SEMESTERAN,
                'TARGET_SEMESTERAN' => $request->TARGET_SEMESTERAN,
                'TARGET_TAHUNAN' => $request->TARGET_TAHUNAN,
                'CAPAIAN_TAHUNAN' => $request->CAPAIAN_TAHUNAN,
                'TARGET_AKTUAL' => $request->TARGET_AKTUAL,
                'CAPAIAN_AKTUAL' => $request->CAPAIAN_AKTUAL,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI,
                'PERMASALAHAN' => $request->PERMASALAHAN,

            ];

            Iku::findOrFail($id)->update($data);
            // $berita = Berita::find($id)->update($data);
            return redirect()->route('_superadmin_.index')->with('success', "IKU berhasil diupdate!");
        } catch (Exception $e) {
            return redirect()->route('_superadmin_.index')->with(['failed' => 'Data IKU Gagal Di Update! error :' . $e->getMessage()]);
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
            Iku::findOrFail($id)->delete();
            return redirect()->route('_superadmin_.index')->with('success', "IKU berhasil dihapus!");
        } catch (Exception $e) {
            return redirect()->route('_superadmin_.index')->with(['failed' => 'Data Yang Dihapus Tidak Ada ! error :' . $e->getMessage()]);
        }
    }

    public function satu_komponen_iku_admin()
    {
        return view('_superadmin_.create_iku_satu_komponen');
    }

    public function multi_komponen_iku_admin()
    {
        return view('_superadmin_.create_iku_multi_komponen');
    }

    public function multi_komponen_detail_admin($id)
    {
        $data = Iku::findOrFail($id);
        // dd($data);
        return view('_superadmin_.create_komponen_multi_komponen', compact('data'));
    }

    public function store_komponen_detail(Request $request)
    {
        try {
            // VALIDASI DATA
            $request->validate([
                'ID_IKU_MULTI_KOMPONEN' => 'required',
                'KODE_SS_KOMPONEN' => 'required',
                'SS_KOMPONEN' => 'required',
                'IKU_KOMPONEN' => 'required',
                'DEFINISI_IKU_KOMPONEN' => 'required',
                'FORMULA_IKU_KOMPONEN' => 'required',
                'KOMPONEN_PENGUKURAN_KOMPONEN' => 'required',
                'PENJELASAN_IKU_KOMPONEN_KOMPONEN' => 'required',
                'UIC_KOMPONEN' => 'required',
                'TARGET_Q1_KOMPONEN' => 'required',
                'TARGET_Q2_KOMPONEN' => 'required',
                'TARGET_Q3_KOMPONEN' => 'required',
                'TARGET_Q4_KOMPONEN' => 'required',
                'CAPAIAN_Q1_KOMPONEN' => 'required',
                'CAPAIAN_Q2_KOMPONEN' => 'required',
                'CAPAIAN_Q3_KOMPONEN' => 'required',
                'CAPAIAN_Q4_KOMPONEN' => 'required',
                'TARGET_AKTUAL_KOMPONEN' => 'required',
                'CAPAIAN_AKTUAL_KOMPONEN' => 'required',
                'PENJELASAN_CAPAIAN_KOMPONEN' => 'required',
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN' => 'required',
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN' => 'required',
                'PERMASALAHAN_KOMPONEN' => 'required',


            ]);

            // TAMPUNGAN REQUEST DATA DARI FORM
            $data = [
                'ID_IKU_MULTI_KOMPONEN' => $request->ID_IKU_MULTI_KOMPONEN,
                'KODE_SS_KOMPONEN' => $request->KODE_SS_KOMPONEN,
                'SS_KOMPONEN' => $request->SS_KOMPONEN,
                'IKU_KOMPONEN' => $request->IKU_KOMPONEN,
                'DEFINISI_IKU_KOMPONEN' => $request->DEFINISI_IKU_KOMPONEN,
                'FORMULA_IKU_KOMPONEN' => $request->FORMULA_IKU_KOMPONEN,
                'KOMPONEN_PENGUKURAN_KOMPONEN' => $request->KOMPONEN_PENGUKURAN_KOMPONEN,
                'PENJELASAN_IKU_KOMPONEN_KOMPONEN' => $request->PENJELASAN_IKU_KOMPONEN_KOMPONEN,
                'UIC_KOMPONEN' => $request->UIC_KOMPONEN,
                'TARGET_Q1_KOMPONEN' => $request->TARGET_Q1_KOMPONEN,
                'TARGET_Q2_KOMPONEN' => $request->TARGET_Q2_KOMPONEN,
                'TARGET_Q3_KOMPONEN' => $request->TARGET_Q3_KOMPONEN,
                'TARGET_Q4_KOMPONEN' => $request->TARGET_Q4_KOMPONEN,
                'CAPAIAN_Q1_KOMPONEN' => $request->CAPAIAN_Q1_KOMPONEN,
                'CAPAIAN_Q2_KOMPONEN' => $request->CAPAIAN_Q2_KOMPONEN,
                'CAPAIAN_Q3_KOMPONEN' => $request->CAPAIAN_Q3_KOMPONEN,
                'CAPAIAN_Q4_KOMPONEN' => $request->CAPAIAN_Q4_KOMPONEN,
                'TARGET_AKTUAL_KOMPONEN' => $request->TARGET_AKTUAL_KOMPONEN,
                'CAPAIAN_AKTUAL_KOMPONEN' => $request->CAPAIAN_AKTUAL_KOMPONEN,
                'PENJELASAN_CAPAIAN_KOMPONEN' => $request->PENJELASAN_CAPAIAN_KOMPONEN,
                'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN' => $request->KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN,
                'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN' => $request->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN,
                'PERMASALAHAN_KOMPONEN' => $request->PERMASALAHAN_KOMPONEN,
                'FLAG_KOMPONEN_KOMPONEN' => 'MULTI_KOMPONEN_DETAIL'

            ];

            Komponen::create($data);

            //redirect to index
            return redirect()->back()->with(['success' => 'Data Komponen Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Data Komponen Gagal Disimpan! error :' . $e->getMessage()]);
        }
    }
}
