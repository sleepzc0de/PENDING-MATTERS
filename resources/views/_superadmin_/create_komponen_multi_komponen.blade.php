@extends('_superadmin_.layouts.master')

@section('content')
 <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Tambah Komponen Pending Item</h4>
                                 @include('_superadmin_.layouts.session_notif')
                                <form action="{{route('daftar-komponen.store')}}" class="needs-validation" method="POST" novalidate>
                                    @csrf
                                  <div class="form-row">
                                    <div class="col-md-12 mb-3" hidden>
                                      <label for="validationTooltip01">ID PENDING MATTERS</label>
                                      <input value="{{$data->id}}" name="ID_PENDING_MATTERS_MULTI_KOMPONEN" type="text" class="form-control" id="ID_PENDING_MATTERS_MULTI_KOMPONEN" required readonly>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                      <label for="validationTooltip01">Nama Pending Matters : {{$data->PENDING_MATTERS}}</label>
                                     
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-12 mt-3 mb-3">
                                      <label for="PENDING_MATTERS_KOMPONEN">Pending Item Komponen</label>
                                      <input name="PENDING_MATTERS_KOMPONEN" type="text" class="form-control" id="PENDING_MATTERS_KOMPONEN" placeholder="Input Pending Matters Komponen" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>

                                     <div class="col-md-12 mt-3 mb-3">
                                      <label for="UIC_KOMPONEN">UIC Komponen</label>
                                      <input name="UIC_KOMPONEN" type="text" class="form-control" id="UIC_KOMPONEN" placeholder="Input Pending Matters Komponen" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>

                                    <div class="col-md-12 mb-3" >
                                      <label for="validationTooltip01">Realisasi</label>
                                       <input step="any" name="CAPAIAN_AKTUAL_KOMPONEN" type="number" class="form-control" id="CAPAIAN_AKTUAL_KOMPONEN" placeholder="0.0 (Koma Pake Titik)" required>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    
                                   

                                  </div>
                                  <div class="form-row">
                                     <div class="col-md-12 mb-3">
                                        <label for="PROGRES"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Progres</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                       <label for="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN">Status</label>
                                       <textarea  name="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN" type="text" class="form-control" id="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN" placeholder="Input Status" required></textarea>
                                      
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                     <label for="PENJELASAN_CAPAIAN_KOMPONEN">Penjelasan</label>
                                       <textarea  name="PENJELASAN_CAPAIAN_KOMPONEN" type="text" class="form-control" id="PENJELASAN_CAPAIAN_KOMPONEN" placeholder="Input Penjelasan" required></textarea>
                                      
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-row">
                                     <div class="col-md-12 mb-3">
                                        <label for="TINDAK_LANJUT"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Tindak Lanjut</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN">Aktivitas Lanjutan</label>
                                       <textarea  name="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN" type="text" class="form-control" id="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN" placeholder="Input Aktivitas Lanjutan" required></textarea>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN">Jadwal Penyelesaian</label>
                                      <textarea  name="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN" type="text" class="form-control" id="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN" placeholder="Input Jadwal Peyelesaian" required></textarea>
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
