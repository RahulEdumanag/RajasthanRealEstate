@extends('backend.layouts.master')
@section('title', ' All Users')
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
  @endif    <div class="container-xxl flex-grow-1 container-p-y card">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3 ">
                        <span class="text-muted fw-light">User /</span> List
                    </h5>
                </div>
              
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/users/create') }}" class="btn "
                        style="background-color:#7367f0 ; color:white">
                        <i class="bi bi-plus-lg"></i> Add Users
                    </a>
                </div>
              
            </div>
        </div>


        <div >
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminuser as $value)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->mobile }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.edit', ['id' => $value->id]) }}" class="btn btn-primary me-2"
                                        data-mdb-ripple-color="dark">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                    @if ($value->status == 1)
                                        <a class="fw-bold  btn btn-danger"
                                            href="{{ URL::to('admin/user/active', $value->id) }}"><i class="fa fa-times-circle inactive"></i></a>
                                    @elseif ($value->status == 0)
                                        <a class="fw-bold btn btn-success"
                                            href="{{ URL::to('admin/user/inactive', $value->id) }}"><i class="fa fa-check-circle active"></i> </a>
                                    @else
                                        Unknown
                                   @endif

                                     <form action="{{ route('admin.users.destroy', $value->id) }}" method="POST"
                                        id="deleteForm">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
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
