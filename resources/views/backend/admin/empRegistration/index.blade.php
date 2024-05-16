@extends('backend.layouts.master')
@section('title', ' All Employee')
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


    @if (session()->has('generated_password') && session()->has('generated_username'))
        <div class="alert alert-info">
            <p>Employee Username: <span id="generatedUsername">{{ session('generated_username') }}</span></p>
            <p>Employee Password: <span id="generatedPassword">{{ session('generated_password') }}</span></p>
            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedUsername">
                Copy Username
            </button>
            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedPassword">
                Copy Password
            </button>
        </div>
    @endif

    <div class="container-xxl flex-grow-1 container-p-y card">

        <div class="app-page-title">
            <div class="page-title-wrapper d-flex justify-content-between align-items-center">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Employee /</span> List
                    </h5>
                </div>

                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/empRegistration/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Employee
                    </a>
                </div>
            </div>
        </div>



        <div>
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
                                <td>{{ $value->Emp_Name }}</td>
                                <td>{{ $value->Emp_Email }}</td>
                                <td>{{ $value->Emp_Contact }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.empRegistration.edit', encodeId($value->Emp_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>
                                    <span class='me-2'>
                                        @if ($value->Emp_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/empRegistration/active', $value->Emp_Id) }}"> <i
                                                    class="fa fa-check-circle active"></i>
                                            </a>
                                        @elseif ($value->Emp_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/empRegistration/inactive', $value->Emp_Id) }}"> <i
                                                    class="fa fa-times-circle inactive"></i> </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>


                                    <form action=" {{ route('admin.empRegistration.destroy', $value->Emp_Id) }}"
                                        method="POST" id="deleteForm">
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
    <!-- Include Clipboard.js library -->

@stop
