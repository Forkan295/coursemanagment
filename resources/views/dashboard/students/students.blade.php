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
                                        <th class="sorting">ID</th>
                                        <th class="sorting_asc">Trainee Name</th>
                                        <th class="sorting">Phone No</th>
                                        <th class="sorting">Course Name</th>
                                        <th class="sorting">Batch</th>
                                        <th class="sorting">Paid (BDT)</th>
                                        <th class="sorting">Due (BDT)</th>
                                        <th class="sorting">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   @foreach ($students as $item)
                                    <tr role="row" class="odd">
                                        <td>{{ $item->student_id }}</td>
                                        <td class="sorting_1">{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->course->course_name }}</td>
                                        <td>{{ $item->batch->batch }}</td>
                                        <td>{{ $item->paid }} TK</td>
                                        <td>{{ $item->course->course_fees - $item->paid }} TK</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('detailes.student', $item->id) }}">
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