@extends('backend.layouts.master')
@section('title', 'Event')
@section('content')

    <?php
    
    use Carbon\Carbon; // Add this line
    ?>
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
                        <span class="text-muted fw-light">Events /</span> List
                    </h5>
                </div>

                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/event/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Events
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
                            <th>Title</th>
                            <th>Date </th>
                            <th> Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="DragNdDrop">
                        @foreach ($model as $value)
                            @php
                                $eventDate = \Carbon\Carbon::parse($value->Pag_Date);
                                $today = Carbon::now('Asia/Kolkata');
                            @endphp
                            <tr data-id="{{ $value->Pag_Id }}">
                            <td class="serial-number">
                                    <!-- <i class="fa fa-bars drag-handle" style="cursor: grab;"></i> -->
                                    <i class="fas fa-grip-vertical drag-handle"style="cursor: grab;"></i>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $value->Pag_Name }} </td>
                                <td>{{ $eventDate->format('F d, Y') }}</td>
                                <td> {{ $value->Pag_SerialOrder }} </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.event.edit', encodeId($value->Pag_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <span class='me-2'>
                                        @if ($value->Pag_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/event/active', $value->Pag_Id) }}"><i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Pag_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/event/inactive', $value->Pag_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i></a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>
                                    <form action=" {{ route('admin.event.destroy', $value->Pag_Id) }}" method="POST"
                                        id="deleteForm">
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
