@extends('dashboard.layout.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('_dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('_dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('_dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('_dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('_dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endpush
@section('title','Users List')
<body>
@section('content')
    <!-- Striped rows start -->
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('dashboard.users.create')}}"
                       class="btn btn-success mb-2 waves-effect waves-light">
                        <i class="fa fa-plus"></i>
                        &nbsp; Add User
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="tbl-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>full name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>role</th>
                            <th>manager</th>
                            <th>date</th>
                            <th>actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->

@endsection
@push('scripts')
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('_dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

    <script type="text/javascript">
        $(function() {
            gb_DataTable = $("#tbl-datatable").DataTable({
                autoWidth: false,
                order: [0, "DESC"],
                processing: true,
                serverSide: true,
                searchDelay: 2000,
                paging: true,
                ajax: "{{ route('dashboard.users.index') }}",
                iDisplayLength: "15",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'image', name: 'image' },
                    { data: 'full_name', name: 'full_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'role', name: 'role' },
                    { data: 'manager', name: 'manager' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                lengthMenu: [25, 50, 100]
            });
        });
    </script>

@endpush
</body>
