@extends('_superadmin_.layouts.master')

@section('content')
 <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">TAMBAH PENDING ITEM (<b>Satu Komponen</b>)</h4>
                                 @include('_superadmin_.layouts.session_notif')
                                <form action="{{route('satu_komponen.store')}}" class="needs-validation" method="POST" novalidate>
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
                                  <div class="form-row mt-2">
                                    <div class="col-md-12 mb-3">
                                        <label for="PROGRESS"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Progres</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="KEGIATAN_YANG_TELAH_DILAKSANAKAN">Status</label>
                                      <textarea  name="KEGIATAN_YANG_TELAH_DILAKSANAKAN" type="text" class="form-control" id="KEGIATAN_YANG_TELAH_DILAKSANAKAN" placeholder="Input Status" required></textarea>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="PENJELASAN_CAPAIAN">Penjelasan</label>
                                     <textarea  name="PENJELASAN_CAPAIAN" type="text" class="form-control" id="PENJELASAN_CAPAIAN" placeholder="Input Penjelasan" required></textarea>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-row mt-2">
                                     <div class="col-md-12 mb-3">
                                        <label for="TINDAK_LANJUT"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Tindak Lanjut</label>
                                    </div>
                                   <div class="col-md-6 mb-3">
                                      <label for="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI">Aktivitas Lanjutan</label>
                                       <textarea  name="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI" type="text" class="form-control" id="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI" placeholder="Input Kegiatan yang sudah dilaksanakan" required></textarea>
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="PENJELASAN_PENDING_MATTERS_KOMPONEN">Jadwal Penyelesaian</label>
                                      <textarea  name="PENJELASAN_PENDING_MATTERS_KOMPONEN" type="text" class="form-control" id="PENJELASAN_PENDING_MATTERS_KOMPONEN" placeholder="Input Penjelasan Capaian" required></textarea>
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
