@extends('backend.layouts.master')
@section('title', 'Clients')
@section('content')

    @php
        use Illuminate\Support\Str;
    @endphp
   
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
            <div class="page-title-wrapper d-flex justify-content-between align-items-center">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Clients /</span> List
                    </h5>
                </div>

                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/clients/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Clients
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
                            <!-- <th>Short Desc</th> -->
                            <th> Image</th>
                            <th> Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            @if (Auth::user()->registration->Reg_Role === 'SUPERADMIN' ||
                                    (!$value->Pag_AdminExists && Auth::user()->role !== 'SUPERADMIN'))
                                <tr>
                                    <td class="serial-number">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $value->Pag_Name }} </td>
                                    </style>
                                    <!-- <td class="serial-number" title="{{ $value->Pag_ShortDesc }}">
                                        {{ Str::limit($value->Pag_ShortDesc, 30) }}
                                    </td> -->



                                    

                                    <?php
                                    $userImage = '/uploads/' . $value->Pag_Image;
                                    $defaultImage = '/assets/images/default.jpg';
                                    if (file_exists(public_path($userImage))) {
                                        $imagePath = $userImage;
                                    } else {
                                        $imagePath = $defaultImage;
                                    }
                                    
                                    ?>


                                    <td><img id="imageResult" src="{{ URL::to($imagePath) }}" alt=""
                                            class="img-fluid rounded shadow-sm mx-auto d-block" style="width:45px;"></td>



                                    <td> {{ $value->Pag_SerialOrder }} </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.clients.edit', encodeId($value->Pag_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <span class='me-2'>
                                            @if ($value->Pag_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/clients/active', $value->Pag_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Pag_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/clients/inactive', $value->Pag_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.clients.destroy', $value->Pag_Id) }}"
                                            method="POST" id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                <i class="fa fa-trash-alt"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
