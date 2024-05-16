@extends('backend.layouts.master')
@section('title', 'Menu Allotment')
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
                <span class="text-muted fw-light">Menu Allotment/</span> List
            </h5>
            @if ($model->count() == 0)
                <!-- Your HTML content here -->
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/adminMenuAllotment/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Menu Allotment
                    </a>
                </div>
            @endif


        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Admin Menu Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $menuIds = explode(',', $value->Add_MenAllo_AddMen_Id);
                                        $menuNames = \App\Models\AdminMenu::whereIn('AddMen_Id', $menuIds)
                                            ->pluck('AddMen_Name')
                                            ->implode(', ');
                                        echo $menuNames;
                                    @endphp
                                </td>

                                <td class="d-flex">
                                    <a href="{{ route('admin.adminMenuAllotment.edit', encodeId($value->Add_MenAllo_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>
                                    <span class='me-2'>
                                        @if ($value->Add_MenAllo_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/adminMenuAllotment/active', $value->Add_MenAllo_Id) }}"><i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Add_MenAllo_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/adminMenuAllotment/inactive', $value->Add_MenAllo_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i> </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>

                                    <form action=" {{ route('admin.adminMenuAllotment.destroy', $value->Add_MenAllo_Id) }}"
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
@stop
