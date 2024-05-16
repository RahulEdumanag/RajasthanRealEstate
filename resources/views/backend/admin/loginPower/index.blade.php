@extends('backend.layouts.master')
@section('title', 'Logins')
@section('content')




    @if (session()->has('username_updated_success') && session()->has('password_updated_success'))
        <div id="credentials-alert" class="alert alert-info">
            <p>New Username: <span id="updatedUsername">{{ session('username_updated_success') }}</span></p>
            <p>New Password: <span id="updatedPassword">{{ session('password_updated_success') }}</span></p>

            <!-- You can add more styling or buttons if needed -->

            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#updatedUsername">
                Copy Username
            </button>

            <button class="btn btn-sm btn-outline-secondary" data-clipboard-target="#updatedPassword">
                Copy Password
            </button>

            <button class="btn btn-sm btn-outline-danger" onclick="removeCredentialsAlert()">
                &#10006; <!-- Cross icon -->
            </button>
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
                        <span class="text-muted fw-light">Login /</span> List
                    </h5>
                </div>

            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                           
                                <tr>
                                    <td class="serial-number"> {{ $loop->iteration }}</td>
                                    <td>{{ $value->Log_Username }}</td>
                                    <td class="d-flex">

                                        <a href="{{ route('admin.loginPower.edit', encodeId($value->Log_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <span class="me-2">

                                            @if ($value->Log_Status == 1)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/loginPower/active', $value->Log_Id) }}">
                                                    <i class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Log_Status == 0)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/loginPower/inactive', $value->Log_Id) }}">
                                                    <i class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif


                                        </span>

                                        <form action=" {{ route('admin.loginPower.destroy', $value->Log_Id) }}"
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
        function removeCredentialsAlert() {
            // You can customize this function based on your requirements
            document.getElementById('credentials-alert').style.display = 'none';
        }
    </script>


@stop
