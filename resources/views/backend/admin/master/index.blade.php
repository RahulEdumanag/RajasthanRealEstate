@extends('backend.layouts.master')
@section('title', 'Addtools')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
   @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
   @endif

    <div class="container-xxl flex-grow-1 container-p-y card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                    </div>
                    <h5 class="py-3 mb-4">
                        <span class="text-muted fw-light">Master /</span> List
                    </h5>

                    <div class="d-inline-block ml-3 pb-3">

                        <a href="{{ URL::to('admin/master/create') }}"style="background-color:#7367f0 ; color:white"
                            class="btn">
                            <i class="bi bi-plus-lg"></i>
                            Add Master
                        </a>

                    </div>
                </div>
            </div>
        </div>


        <div >
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th class="text-nowrap">Master Name</th>
                            <th class="text-nowrap">Master Value</th>

                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($master as $value)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>

                                <td class=" text-nowrap ">{{ $value->title }}</td>
                                <td >{{ $value->value }}</td>
                                <td class="d-flex">
                                    <a href="{{ Route('admin.master.edit', $value->id) }}"class="btn fw-bold btn-primary text-nowrap"
                                        data-mdb-ripple-color="dark">
                                        <i class="metismenu-icon bi bi-gear-wide-connected"></i>
                                        Edit
                                    </a>
                                    {{-- delete --}}
                                    <form action="{{ route('admin.master.destroy', $value->id) }}" method="POST"
                                        id="deleteForm">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger ms-3 text-nowrap"
                                            onclick="confirmDelete(this)">

                                            <i class="fa fa-trash-alt"></i>

                                        </button>
                                    </form>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <style>
        @media screen and (min-width: 768px) {
            #myModal .modal-dialog {
                width: 70%;
                border-radius: 5px;
            }
        }
    </style>



    <script>
        
    </script>

    <script>
        $(document).ready(function() {
            $('#invoiceTable').DataTable({
                // Enable pagination
                "paging": true,
                // Enable searching
                "searching": true,
                // Set the default number of records per page
                "lengthMenu": [10, 25, 50, 100],
                // Customize the text for pagination buttons
                "oLanguage": {
                    "oPaginate": {
                        "sNext": "&#8594;",
                        "sPrevious": "&#8592;"
                    }
                },
                // Add Bootstrap styling
                "dom": '<"top"f>rt<"bottom"lip><"clear">'
            });
        });
    </script>

@stop
