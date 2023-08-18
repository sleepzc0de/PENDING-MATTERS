@extends('layouts.master')

@section('css')
 <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/prism/prism.css')}}">
 
@endsection


@section('content')
{{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title text-center">Progres Capaian IKU <br> 2023</h4>
                                <div id="basic-bar" class="w-100" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>

                 
</div> --}}
<!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-right mr-5"> <!-- Example single danger button -->
                                        <div class="btn-group mr-5">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                2023
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('daftar-pm-fe')}}">Tahun 2023</a>
                                            </div>
                                        </div>
                                    </div>
                                <div class="text-center mb-3"><h4><b>DAFTAR PENDING MATTERS<br>
                                    BIRO MANAJEMEN BMN DAN PENGADAAN</b></h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered" style="text-align: center">
                                        <thead >
                                            <tr>
                                                <th>NO</th>
                                                <th>PENDING ITEM</th>
                                                <th>UNIT IN CHARGE</th>
                                                <th>REALISASI</th>
                                                <th>DETAIL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection


@section('script')
   <!-- This Page JS -->
    <script src="{{asset('assets/libs/echarts/dist/echarts-en.min.js')}}"></script>
     <!-- This Page JS -->
     
    <script src="{{asset('assets/extra-libs/prism/prism.js')}}"></script>
    {{-- <script src="{{asset('dist/js/pages/echarts/bar/bar.js')}}"></script> --}}

<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>

<script>
    /****************************************
 *       Basic Table                   *
 ****************************************/
$('#zero_config').DataTable({
            bInfo : false,
            scrollY: "300px",
            scrollCollapse: true,
            paging: false,
            searching:false,
            order: [[0, 'asc']],
            processing: true,
            serverSide: true,
            ajax: "{{ route('daftar-pm-fe') }}",
            columns: [
            { data:'DT_RowIndex', name:'DT_RowIndex', width:'10px',orderable:false,searchable:false},
            {data: 'PENDING_MATTERS',name:'PENDING_MATTERS'},
            {data: 'UIC',name:'UIC'},
             {data: 'CAPAIAN_AKTUAL',name:'CAPAIAN_AKTUAL'},
            // {data: 'KODE_SS',name:'KODE_SS'},
            // {data: 'SS',name:'SS'},
            // {data: 'IKU',name:'IKU'},
            // {data: 'TARGET_AKTUAL',name:'TARGET_AKTUAL'},
            // {data: 'CAPAIAN_AKTUAL',name:'CAPAIAN_AKTUAL'},
             {data: 'opsi',name:'opsi',orderable:false,searchable:false},
            
            ],
            // language: {
            // lengthMenu: "Display _MENU_ records per page",
            // zeroRecords: "Nothing found - sorry",
            // info: "Showing page _PAGE_ of _PAGES_",
            // infoEmpty: "No records available",
            // infoFiltered: "(filtered from _MAX_ total records)",
            // search:"Cari Data"
            //  }
});
</script>
@endsection
