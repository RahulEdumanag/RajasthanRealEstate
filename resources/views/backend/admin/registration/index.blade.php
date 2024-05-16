@extends('backend.layouts.master')
@section('title', ' All Registrations')
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
            <p>Client Username: <span id="generatedUsername">{{ session('generated_username') }}</span></p>
            <p>Client Password: <span id="generatedPassword">{{ session('generated_password') }}</span></p>
            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedUsername">
                Copy Username
            </button>
            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#generatedPassword">
                Copy Password
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Clients/</span> List
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/registration/create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Clients
                </a>
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
                                <td>{{ $value->Reg_Name }}</td>
                                <td>{{ $value->Reg_Email }}</td>
                                <td>{{ $value->Reg_Contact }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.registration.edit', encodeId($value->Reg_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    @if ($value->Reg_Status == 0)
                                        <a class="btn btn-success me-2"
                                            href="{{ URL::to('admin/registration/active', $value->Reg_Id) }}"><i
                                                class="fa fa-check-circle active"></i> </a>
                                    @elseif ($value->Reg_Status == 1)
                                        <a class="btn btn-danger me-2"
                                            href="{{ URL::to('admin/registration/inactive', $value->Reg_Id) }}"><i
                                                class="fa fa-times-circle inactive"></i> </a>
                                    @else
                                        <span class="badge badge-warning">Unknown</span>
                                    @endif

                                    <form action=" {{ route('admin.registration.destroy', $value->Reg_Id) }}"
                                        method="POST" id="deleteForm">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger me-2" onclick="confirmDelete(this)">
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
