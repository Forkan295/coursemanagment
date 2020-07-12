@extends('layouts.admin')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/datatable.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $pageTitle }}</h4>
                @if (request()->route()->getName() == 'verified.applicants')
                <br>
                <a class="btn btn-outline-info btn-sm" 
                href="{{ route('unverified.applicants') }}">Phone number unverified applicants</a>
                @endif
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-striped table-bordered dom-jQuery-events dataTable" id="myTable">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc">Name</th>
                                        <th class="sorting">Phone No</th>
                                        <th class="sorting">Course</th>
                                        <th class="sorting">Address</th>
                                        <th class="sorting">Applied at</th>
                                        <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   @foreach ($applicants as $item)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->course->course_name }}</td>
                                        <td>{{ $item->present_address }}</td>
                                        <td>{{ $item->created_at->format('d M, Y')}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('detailes.applicants', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush