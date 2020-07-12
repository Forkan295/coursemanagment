@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success float-right" href="{{ route('content.create') }}">
          <i class="fa fa-plus"></i>  Create new content
        </a>
        <br><br><br>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Contents</h4>
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
                                    <th>Batch</th>
                                    <th>Course</th>
                                    <th>Lecture</th>
                                    <th>Content Title</th>
                                    <th>Pubic status</th>
                                    {{-- @canany(['Create Course','Update Course','Delete Course']) --}}
                                    <th>Action</th>
                                    {{-- @endcanany --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>Batch {{ $item->batch->batch }}</td>
                                    <td>{{ $item->course->course_name }}</td>
                                    <td>Lecture {{ $item->lecture }}</td>
                                    <td>{{ $item->content_title }}</td>
                                    <td>{{ ($item->is_public == true) ? "Yes" : "No"  }}</td>
                                    {{-- @canany(['Create Course','Update Course','Delete Course']) --}}
                                    <td>
                                        <a href="{{ route('content.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                    {{-- @endcanany --}}
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