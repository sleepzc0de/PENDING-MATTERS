@extends('_superadmin_.layouts.master')

@section('content')
 <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Edit Komponen Pending Item</h4>
                                   @include('_superadmin_.layouts.session_notif')
                                <form action="{{route('daftar-komponen.update',$data->id)}}" class="needs-validation" method="POST" novalidate>
                                   @csrf
                                    @method('PUT')
                                  <div class="form-row">
                                    {{-- <div class="col-md-12 mb-3">
                                      <label for="validationTooltip01">Kode SS/IKU</label>
                                      <input value="{{ old('KODE_SS_KOMPONEN') ?? $data->KODE_SS_KOMPONEN }}" name="KODE_SS_KOMPONEN" type="text" class="form-control @error('KODE_SS_KOMPONEN') is-invalid @enderror" id="validationTooltip01" placeholder="First name" required readonly>
                                      <!-- error message untuk judul -->
                                        @error('KODE_SS_KOMPONEN')
                                        <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div> --}}
                                    <div class="col-md-12 mb-3">
                                      <label for="validationTooltip01">Pending Item Komponen</label>
                                      <input value="{{ old('PENDING_MATTERS_KOMPONEN') ?? $data->PENDING_MATTERS_KOMPONEN }}" name="PENDING_MATTERS_KOMPONEN" type="text" class="form-control @error('PENDING_MATTERS_KOMPONEN') is-invalid @enderror" id="validationTooltip01" placeholder="First name" required>
                                      <!-- error message untuk judul -->
                                        @error('PENDING_MATTERS_KOMPONEN')
                                        <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                      <label for="validationTooltip01">UIC Komponen</label>
                                      <input value="{{ old('UIC_KOMPONEN') ?? $data->UIC_KOMPONEN }}" name="UIC_KOMPONEN" type="text" class="form-control @error('UIC_KOMPONEN') is-invalid @enderror" id="validationTooltip01" placeholder="First name" required>
                                      <!-- error message untuk judul -->
                                        @error('UIC_KOMPONEN')
                                        <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                      <label for="validationTooltip01">Realisasi Komponen</label>
                                      <input value="{{ old('CAPAIAN_AKTUAL_KOMPONEN') ?? $data->CAPAIAN_AKTUAL_KOMPONEN }}" name="CAPAIAN_AKTUAL_KOMPONEN" type="text" class="form-control @error('CAPAIAN_AKTUAL_KOMPONEN') is-invalid @enderror" id="validationTooltip01" placeholder="First name" required>
                                      <!-- error message untuk judul -->
                                        @error('CAPAIAN_AKTUAL_KOMPONEN')
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
                                    <div class="col-md-6 mb-3">
                                     <label for="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN">Status</label>
                                      <textarea name="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN" type="text" class="form-control @error('KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN') is-invalid @enderror" id="KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN" placeholder="Input Status" required>{{ old('KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN') ?? $data->KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN }}</textarea>
                                       <!-- error message untuk judul -->
											@error('KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                       <label for="PENJELASAN_CAPAIAN_KOMPONEN">Penjelasan</label>
                                      <textarea name="PENJELASAN_CAPAIAN_KOMPONEN" type="text" class="form-control @error('PENJELASAN_CAPAIAN_KOMPONEN') is-invalid @enderror" id="PENJELASAN_CAPAIAN_KOMPONEN" placeholder="Input Penjelasan" required>{{ old('PENJELASAN_CAPAIAN_KOMPONEN') ?? $data->PENJELASAN_CAPAIAN_KOMPONEN }}</textarea>
                                      <!-- error message untuk judul -->
											@error('PENJELASAN_CAPAIAN_KOMPONEN')
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
                                    <div class="col-md-6 mb-3">
                                       <label for="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN">Aktivitas Lanjutan</label>
                                      <textarea name="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN" type="text" class="form-control @error('RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN') is-invalid @enderror" id="RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN" placeholder="Input Aktivitas Lanjutan" required>{{ old('RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN') ?? $data->RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN }}</textarea>
                                       <!-- error message untuk judul -->
											@error('RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                     <label for="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN">Jadwal Penyelesaian</label>
                                      <textarea name="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN" type="text" class="form-control @error('PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN') is-invalid @enderror" id="PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN" placeholder="Input Jadwal Penyelesaian" required>{{ old('PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN') ?? $data->PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN }}</textarea>
                                      <!-- error message untuk judul -->
											@error('PENJELASAN_PENDING_MATTERS_KOMPONEN_KOMPONEN')
											<div class="alert alert-danger mt-2">
												{{ $message }}
											</div>
											@enderror
                                      <div class="valid-tooltip">
                                        Looks good!
                                      </div>
                                    </div> 
                                  </div>
                                  <button class="btn btn-block btn-warning mt-4" type="submit">UPDATE</button>
                                </form>
                                 <a href="{{route('pending-matters-home.index')}}"><button class="btn btn-block btn-danger mt-2">KEMBALI</button></a>
                            </div>
                    </div>
@endsection
