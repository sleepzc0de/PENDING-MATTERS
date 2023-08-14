@extends('_superadmin_.layouts.master')
@section('css')
 <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')
     <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                            <h3><b>Capaian Pending Matters <br> Biro Manajemen BMN dan Pengadaan</b></h3>
                            @include('_superadmin_.layouts.session_notif')
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="capaian_pending_matters" class="table table-striped table-bordered w-100" style="text-align: center">
                                                <thead >
                                                        <tr>
                                                            <th>PENDING ITEM</th>
                                                            <th>REALISASI</th>
                                                            <th>TARGET</th>
                                                            <th>AKSI</th>
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
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
        $('#capaian_pending_matters').DataTable({
            dom: 'Bfrtip',
            buttons: [
            //     {
            //     text: '<i class="mdi mdi-10px mdi-plus"></i> Tambah Capaian PM',
            //     className: 'btn btn-secondary btn-rounded waves-effect waves-light',
            //     action: function(e, dt, button, config) {
            //         window.location = "{{route('satu_komponen_pm_admin')}}";
            //     }
            // },
            ],
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('pending-matters-capaian.index') }}",
            columns: [
            // { data:'DT_RowIndex', name:'DT_RowIndex', width:'10px',orderable:false,searchable:false},
            {data: 'PENDING_MATTERS',name:'PENDING_MATTERS'},
            // {data: 'UIC',name:'UIC'},
            // {data: 'IKU',name:'IKU'},
            // {data: 'TARGET_AKTUAL',name:'TARGET_AKTUAL'},
            {data: 'CAPAIAN_AKTUAL',name:'CAPAIAN_AKTUAL'},
            {data: 'TARGET_AKTUAL',name:'TARGET_AKTUAL'},
            {data: 'opsi', name:'opsi', orderable:false, searchable:false},
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