@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Create Day</h4>
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
        
                    <form class="form" action="{{ route('remove.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Weekly remove</label>
                                        <input type="text" id="projectinput1" class="form-control" name="remove" value="{{ old('remove') }}" placeholder="Ex: Saturday, Sunday, Monday..">
                                        <p class="text-danger">
                                            {{ $errors->first('remove') }}
                                        </p>
                                        <input type="hidden" name="type" value="remove">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-header">
                <h4 class="card-title">Weekly removes</h4>
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
                                    <th>Weekly remove</th>
                                    <th>Total Students</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($remove as $key => $item)
                                <tr>
                                    <td>{{ $item->remove }}</td>
                                    <td>{{ ($item->students->where('is_admitted', true)->count() < 1) ? "No Students" :
                                     $item->students->where('is_admitted', true)->count() }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('remove.edit', $item->id) }}">Edit</a>
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

@endsection