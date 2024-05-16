@extends('backend.layouts.master')
@section('title', 'Website Help')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <style>
            .record {
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 10px;
            }

            .no-record {
                text-align: center;
                padding: 20px;
                background-color: #f8f8f8;
                border: 1px solid #ddd;
            }

            
        .empty-state__message {
            color: #ac6900;
            font-size: 1.5rem;
            font-weight: 500;
            margin-top: 0.85rem;
        }
        </style>
        <div class="container-fluid">
            @if (Auth::user()->EmpRegistration->Emp_Role == '1')

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Website Help /</span> List
                    </h5>
                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/websiteHelp/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add Website Help
                        </a>
                    </div>
                </div>



                <div>
                    <div class="card-datatable table-responsive">

                        <table class="invoice-list-table table border-top" id="footerDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $value)
                                    <tr>
                                        <td class="serial-number"> {{ $loop->iteration }}</td>
                                        <td>{!! $value->Pag_FullDesc !!}</td>


                                        <td class="d-flex">
                                            <a href="{{ route('admin.websiteHelp.edit', encodeId($value->Pag_Id)) }}"
                                                class="btn btn-primary me-2">
                                                <i class="fa fa-pencil"></i>

                                            </a>
                                            <span class='me-2'>

                                                @if ($value->Pag_Status == 0)
                                                    <a class="btn btn-success"
                                                        href="{{ URL::to('admin/websiteHelp/active', $value->Pag_Id) }}"><i
                                                            class="fa fa-check-circle active"></i>
                                                    </a>
                                                @elseif ($value->Pag_Status == 1)
                                                    <a class="btn btn-danger"
                                                        href="{{ URL::to('admin/websiteHelp/inactive', $value->Pag_Id) }}"><i
                                                            class="fa fa-times-circle inactive"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-warning">Unknown</span>
                                                @endif
                                            </span>


                                            <form action=" {{ route('admin.websiteHelp.destroy', $value->Pag_Id) }}"
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
            @else
                @if (count($model) > 0)
                    @foreach ($model as $value)
                        <div class="record">
                            {!! $value->Pag_FullDesc !!}
                        </div>
                    @endforeach
                @else
                    <div class="no-record">
                         <div class="empty-state__message">No records has been added yet.</div>
                    </div>
                @endif




            @endif

        </div>
    @stop
