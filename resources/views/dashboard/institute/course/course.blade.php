@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success float-right" href="{{ route('course.create') }}">
          <i class="fa fa-plus"></i>  Create new course
        </a>
        <br><br><br>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All courses</h4>
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
                <div class="card-body">
                     <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Total Students</th>
                                    @canany(['Create Course','Update Course','Delete Course'])
                                    <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ ($item->students->where('is_admitted', true)->count() < 1) ? "No Students" :
                                     $item->students->where('is_admitted', true)->count() }}</td>
                                    @canany(['Create Course','Update Course','Delete Course'])
                                    <td>
                                        <a href="{{ route('course.edit', $item->id) }}">Edit</a>
                                    </td>
                                    @endcanany
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

@endsection