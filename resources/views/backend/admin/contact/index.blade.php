@extends('backend.layouts.master')
@section('title', 'Contact')
@section('content')
    <style>
        .serial-number {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .serial-number:hover {
            overflow: visible;
            white-space: normal;
        }
    </style>
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
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">All Enquiries /</span> List
                    </h5>
                </div>
            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <form action="{{ route('admin.contact.soft-delete') }}" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                    <table class="invoice-list-table table border-top" id="footerDataTable">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th>#</th>
                                @if (getSelectedValue() == '38')
                                    <th>Property Type</th>
                                @endif
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected_records[]" value="{{ $value->Con_Id }}">
                                    </td>
                                    <td class="serial-number"> {{ $loop->iteration }}</td>
                                    <!-- <td class="serial-number" title="{{ $value->Con_ConCat_Id ?? 'N/A' }}">
                                                                                        {{ Str::limit($value->Con_ConCat_Id ?? 'N/A', 10) }}
                                                </td> -->
                                    @if (getSelectedValue() == '38')
                                        <td>
                                            {{ $value->propertyType->PTyp_Name ?? 'N/A' }}
                                        </td>
                                    @endif
                                    <td title="{{ $value->Con_Name }}">
                                        {{ Str::limit($value->Con_Name, 15) }}
                                    </td>
                                    <td title="{{ $value->Con_Email }}">
                                        <a href="mailto:{{ $value->Con_Email }}">
                                            {{ Str::limit($value->Con_Email, 10) }}</a>
                                    </td>
                                    <td title="{{ $value->Con_Number }}">
                                        <a href="callto:{{ $value->Con_Number }}">
                                            {{ Str::limit($value->Con_Number, 10) }}</a>
                                    </td>
                                    <td class="d-flex">
                                        <span>
                                            <a href="{{ route('admin.contact.edit', encodeId($value->Con_Id)) }}"
                                                class="btn btn-primary me-2">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </span>
                                        <span class='me-2'>
                                            @if ($value->Con_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/contact/active', $value->Con_Id) }}"><i
                                                        class="fa fa-check-circle active"></i> </a>
                                            @elseif ($value->Con_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/contact/inactive', $value->Con_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i></a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action="{{ route('admin.contact.destroy', $value->Con_Id) }}" method="POST"
                                            class="delete-form">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete('{{ $value->Con_Id }}')">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                        <i class="fa fa-trash-alt"></i> Delete Selected
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        console.log("Document ready!");
        $("#select-all").change(function() {
            console.log("#select-all changed!");
            $("input[name='selected_records[]']").prop('checked', $(this).prop("checked"));
        });
    });

    function confirmDelete(button) {
        if ($("input[name='selected_records[]']:checked").length > 0) {
            if (confirm("Are you sure you want to delete selected records?")) {
                document.getElementById('deleteForm').submit();
            }
        } else {
            alert("Please select at least one record to delete.");
        }
    }
</script>
