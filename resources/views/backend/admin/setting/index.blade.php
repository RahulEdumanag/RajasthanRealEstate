@extends('backend.layouts.master')
@section('title', ' All Setting')
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




    <div class="main-page">
        <div class="tables">
            <h2 class="title1">Setting</h2>
            <div class="panel-body widget-shadow">
                <div class="d-flex">
                    <h4 class="col-lg-6">Setting List</h4>
                    <div class="eduTextEnd col-lg-6">
                        @if ($model->count() === 0)
                            <a href="{{ URL::to('admin/setting/create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-lg"></i> Add Setting
                            </a>
                        @endif
                    </div>
                </div>

                <table class="table" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image Max Size</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td> {{ $loop->iteration }}</td>

                                <td>
                                    @if ($value->imgsize)
                                        {{ Str::limit($value->imgsize->Img_Value, 50) }}
                                    @else
                                        No Imgsize Found
                                    @endif
                                </td>


                                <td class="display-short-txt" title="{{ $value->Set_Website }}">
                                    @if ($value->Set_Website == 0)
                                        Active
                                    @elseif($value->Set_Website == 1)
                                        Under Construction
                                    @else
                                        {{ Str::limit($value->Set_Website, 20) }}
                                    @endif
                                </td>


                                <td class="row">
                                    <span class='col-lg-2'>
                                        <a href="{{ route('admin.setting.edit', encodeId($value->Set_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="far fa-edit"></i>

                                        </a>
                                    </span>
                                    <span class='col-lg-2'>

                                        @if ($value->Set_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/setting/active', $value->Set_Id) }}"> <i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Set_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/setting/inactive', $value->Set_Id) }}"> <i
                                                    class="fa fa-times-circle inactive"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif

                                    </span>

                                    <span class='col-lg-2'>
                                        <form action=" {{ route('admin.setting.destroy', $value->Set_Id) }}" method="POST"
                                            id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                <i class="far fa-trash-alt"></i>

                                            </button>
                                        </form>
                                    </span>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>


@stop
