@extends('backend.layouts.master')
@section('title', 'Page Category')
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
                <span class="text-muted fw-light">Page Category /</span> List
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/pageCategory/create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Page Category 
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
                          
                            <!-- <th>Order</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>{{ $value->PagCat_Name }} </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.pageCategory.edit', encodeId($value->PagCat_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <span class='me-2'>
                                        @if ($value->PagCat_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/pageCategory/active', $value->PagCat_Id) }}"><i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->PagCat_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/pageCategory/inactive', $value->PagCat_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i> </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>
                                    @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                        <form action=" {{ route('admin.pageCategory.destroy', $value->PagCat_Id) }}"
                                            method="POST" id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger " onclick="confirmDelete(this)">
                                             <i class="fa fa-trash-alt"></i>

                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
