@extends('_superadmin_.layouts.master')

@section('content')
 <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Edit Pending Item <b>(Satu Komponen)</b></h4>
                                   @include('_superadmin_.layouts.session_notif')
                                <form action="{{route('satu_komponen.update',$pm->id)}}" class="needs-validation" method="POST" novalidate>
                                   @csrf
                                    @method('PUT')
                                  <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                      <label for="PENDING_MATTERS">Pending Item</label>
                                      <input value="{{ old('PENDING_MATTERS') ?? $pm->PENDING_MATTERS }}" name="PENDING_MATTERS" type="text" class="form-control @error('PENDING_MATTERS') is-invalid @enderror" id="PENDING_MATTERS" placeholder="First name" required>
                                      <!-- error message untuk judul -->
											@error('PENDING_MATTERS')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                      <label for="UIC">Unit In Charge</label>
                                      <input value="{{ old('UIC') ?? $pm->UIC }}" name="UIC" type="text" class="form-control @error('UIC') is-invalid @enderror" id="UIC" placeholder="First name" required>
                                      <!-- error message untuk judul -->
											@error('UIC')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                   
                                      <div class="col-md-12 mb-3">
                                      <label for="CAPAIAN_AKTUAL">Realisasi</label>
                                       <input value="{{ old('CAPAIAN_AKTUAL') ?? $pm->CAPAIAN_AKTUAL }}" step="any" name="CAPAIAN_AKTUAL" type="number" class="form-control @error('CAPAIAN_AKTUAL') is-invalid @enderror" id="CAPAIAN_AKTUAL" placeholder="0.0 (Koma Pake Titik)" required>
                                      <!-- error message untuk judul -->
											@error('CAPAIAN_AKTUAL')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                      <label for="TARGET_AKTUAL">Target</label>
                                       <input value="{{ old('TARGET_AKTUAL') ?? $pm->TARGET_AKTUAL }}" step="any" name="TARGET_AKTUAL" type="number" class="form-control @error('TARGET_AKTUAL') is-invalid @enderror" id="TARGET_AKTUAL" placeholder="0.0 (Koma Pake Titik)" required>
                                      <!-- error message untuk judul -->
											@error('TARGET_AKTUAL')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>

                                  </div>
                                  
                                  <div class="form-row">
                                       <div class="col-md-12 mb-3">
                                        <label for="PROGRESS"  style="justify-content: center;display: flex;align-items: center; font-size: 15px; font-weight: 600">Progres</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="KEGIATAN_YANG_TELAH_DILAKSANAKAN">Status</label>
                                      <textarea name="KEGIATAN_YANG_TELAH_DILAKSANAKAN" type="text" class="form-control @error('KEGIATAN_YANG_TELAH_DILAKSANAKAN') is-invalid @enderror" id="KEGIATAN_YANG_TELAH_DILAKSANAKAN" placeholder="Input Kegiatan yang sudah dilaksanakan" required>{{ old('KEGIATAN_YANG_TELAH_DILAKSANAKAN') ?? $pm->KEGIATAN_YANG_TELAH_DILAKSANAKAN }}</textarea>
                                       <!-- error message untuk judul -->
											@error('KEGIATAN_YANG_TELAH_DILAKSANAKAN')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label for="PENJELASAN_CAPAIAN">Penjelasan</label>
                                      <textarea name="PENJELASAN_CAPAIAN" type="text" class="form-control @error('PENJELASAN_CAPAIAN') is-invalid @enderror" id="PENJELASAN_CAPAIAN" placeholder="Input Kegiatan yang sudah dilaksanakan" required>{{ old('PENJELASAN_CAPAIAN') ?? $pm->PENJELASAN_CAPAIAN }}</textarea>
                                      <!-- error message untuk judul -->
											@error('PENJELASAN_CAPAIAN')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
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
                                      <label for="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI">Aktivitas Lanjutan</label>
                                      <textarea name="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI" type="text" class="form-control @error('RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI') is-invalid @enderror" id="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI" placeholder="Input Kegiatan yang sudah dilaksanakan" required>{{ old('RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI') ?? $pm->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI }}</textarea>
                                       <!-- error message untuk judul -->
											@error('RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label for="PENJELASAN_PENDING_MATTERS_KOMPONEN">Jadwal Penyelesaian</label>
                                      <textarea name="PENJELASAN_PENDING_MATTERS_KOMPONEN" type="text" class="form-control @error('PENJELASAN_PENDING_MATTERS_KOMPONEN') is-invalid @enderror" id="PENJELASAN_PENDING_MATTERS_KOMPONEN" placeholder="Input Kegiatan yang sudah dilaksanakan" required>{{ old('PENJELASAN_PENDING_MATTERS_KOMPONEN') ?? $pm->PENJELASAN_PENDING_MATTERS_KOMPONEN }}</textarea>
                                      <!-- error message untuk judul -->
											@error('PENJELASAN_PENDING_MATTERS_KOMPONEN')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                  </div>
                                  
                                                                   <button class="btn btn-block btn-success mt-4" type="submit">UPDATE</button>
                                </form>
                                 <a href="{{route('pending-matters-home.index')}}"><button class="btn btn-block btn-danger mt-2">KEMBALI</button></a>
                            </div>
                    </div>
@endsection
