@extends('backend.layouts.master')
@section('title', ' All Expiry Periods')
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



     
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Expiry Period/</span> List
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/expiryPeriod/create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Expiry Period
                </a>
            </div>
        </div>


        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td>{{ $value->ExpPer_StartDate }}</td>
                                <td>{{ $value->ExpPer_EndDate }}</td>
                                <td>{{ $value->ExpPer_Amount }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.expiryPeriod.edit', encodeId($value->ExpPer_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    @if ($value->ExpPer_Status == 0)
                                        <a class="btn btn-success me-2"
                                            href="{{ URL::to('admin/expiryPeriod/active', $value->ExpPer_Id) }}"><i
                                                class="fa fa-check-circle active"></i> </a>
                                    @elseif ($value->ExpPer_Status == 1)
                                        <a class="btn btn-danger me-2"
                                            href="{{ URL::to('admin/expiryPeriod/inactive', $value->ExpPer_Id) }}"><i
                                                class="fa fa-times-circle inactive"></i> </a>
                                    @else
                                        <span class="badge badge-warning">Unknown</span>
                                    @endif

                                    <form action=" {{ route('admin.expiryPeriod.destroy', $value->ExpPer_Id) }}"
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
