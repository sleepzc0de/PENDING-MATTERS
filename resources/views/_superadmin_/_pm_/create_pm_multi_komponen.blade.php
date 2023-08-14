@extends('_superadmin_.layouts.master')

@section('content')
 <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Tambah Pending Matters <b>(Multi Komponen)</b></h4>
                                 @include('_superadmin_.layouts.session_notif')
                                <form action="{{route('multi_komponen.store')}}" class="needs-validation" method="POST" novalidate>
                                    @csrf
                                  <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                      <label for="PENDING_MATTERS">Pending Item</label>
                                      <input name="PENDING_MATTERS" type="text" class="form-control" id="PENDING_MATTERS" placeholder="Input Pending Matters" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                      <label for="UIC">Unit In Charge</label>
                                      <input name="UIC" type="text" class="form-control" id="UIC" placeholder="Input UIC" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                      <label for="CAPAIAN_AKTUAL">Realisasi</label>
                                   <input step="any" name="CAPAIAN_AKTUAL" type="number" class="form-control" id="CAPAIAN_AKTUAL" placeholder="0.0 (Koma Pake Titik)" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                      <label for="TARGET_AKTUAL">Target</label>
                                      <input step="any" name="TARGET_AKTUAL" type="number" class="form-control" id="TARGET_AKTUAL" placeholder="0.0 (Koma Pake Titik)" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                  </div>
                                 
                                  <button class="btn btn-block btn-primary mt-4" type="submit">Kirim</button>
                                  
                                </form>
                                <a href="{{route('pending-matters-home.index')}}"><button class="btn btn-block btn-danger mt-2" type="submit">Batal</button></a>
                            </div>
                    </div>
@endsection
