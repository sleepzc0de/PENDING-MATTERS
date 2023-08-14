<?php

namespace App\Http\Controllers;

use App\Models\PendingMattersModel;
use Exception;
use Illuminate\Http\Request;

class PendingMattersCapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = PendingMattersModel::select('*');
        if (request()->ajax()) {
            return datatables()->of($query)
                ->addColumn('opsi', function ($query) {
                    $edit = route('pending-matters-capaian.edit', $query->id);
                    $hapus = route('pending-matters-capaian.destroy', $query->id);
                    return '<div class="d-inline-flex">
                    <a href="' . $edit . '"><button type="button" class="btn waves-effect waves-light btn-warning"><i class="fas fa-pencil-alt"></i></button></a>

                    <form class="ml-2" action="' . $hapus . '" method="POST">
													' . @csrf_field() . '
													' . @method_field('DELETE') . '
													<button type="submit" class="btn waves-effect waves-light btn-danger"><i class="fas fa-trash-alt"></i></button>
													</form>
                    
                    </div>
                ';
                })
                ->rawColumns(['opsi',])
                ->addIndexColumn()
                ->make(true);
        }
        return view('_superadmin_._pm_.indexCapaian');
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pm = PendingMattersModel::findOrFail($id);
        // dd($pm);
        return view('_superadmin_._pm_.editCapaian', compact(['pm']));
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

            PendingMattersModel::findOrFail($id)->update($data);
            // $berita = Berita::find($id)->update($data);
            return redirect()->route('pending-matters-capaian.index')->with('success', "Capaian Pending Matters berhasil diupdate!");
        } catch (Exception $e) {
            return redirect()->route('pending-matters-capaian.index')->with(['failed' => 'Capaian Pending Matters Gagal Di Update! error :' . $e->getMessage()]);
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
            PendingMattersModel::findOrFail($id)->delete();
            return redirect()->route('pending-matters-capaian.index')->with('success', "Capaian Pending Matters berhasil dihapus!");
        } catch (Exception $e) {
            return redirect()->route('pending-matters-capaian.index')->with(['failed' => 'Capaian Pending Matters Yang Dihapus Tidak Ada ! error :' . $e->getMessage()]);
        }
    }
}
