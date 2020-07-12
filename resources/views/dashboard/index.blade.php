@extends('layouts.admin')

@section('content')

<div class="row">

    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-success">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left">
                            <h3 class="text-white">{{ $ApllicationInLast7dayes }}</h3>
                            <span>New Applicants</span>
                        </div>
                        <div class="align-self-center">
                            <i class="ft-user-plus text-white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-info">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left">
                            <h3 class="text-white">{{ $AdmittedInLast7dayes }}</h3>
                            <span>New Students</span>
                        </div>
                        <div class="align-self-center">
                            <i class="icon-user text-white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-danger">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left">
                            <h3 class="text-white">{{ $TotalStudents }}</h3>
                            <span>Total Students</span>
                        </div>
                        <div class="align-self-center">
                            <i class="ft-users text-white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-warning">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left">
                            <h3 class="text-white">{{ $UnverifiedApplicants }}</h3>
                            <span>Unverified Applicants</span>
                        </div>
                        <div class="align-self-center">
                            <i class="ft-user-x text-white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Applicants (in last 7 day's)</h4>
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
                                        <th class="sorting">Gender</th>
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
                                        <td>{{ ucfirst($item->gender) }}</td>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Students  (in last 7 day's)</h4>
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

{{-- {!! $chart->script() !!} --}}

@endsection

@push('js')
    
@endpush
