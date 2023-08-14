<?php

namespace App\Http\Controllers;

use App\Models\PendingMattersModel;
use Illuminate\Http\Request;

class PendingMattersController extends Controller
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
                    $preview = route('_superadmin_._pm_.show', $query->id);
                    $edit = route('_superadmin_._pm_.edit', $query->id);
                    $hapus = route('_superadmin_._pm_.destroy', $query->id);
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
        return view('_superadmin_._pm_.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function satu_komponen_pm_admin()
    {
        return view('_superadmin_._pm_.create_pm_satu_komponen');
    }

    public function multi_komponen_pm_admin()
    {
        return view('_superadmin_._pm_.create_pm_multi_komponen');
    }

    public function multi_komponen_detail_admin($id)
    {
        $data = PendingMattersModel::findOrFail($id);
        // dd($data);
        return view('_superadmin_.create_komponen_multi_komponen', compact('data'));
    }
}
