@extends('layouts.admin')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/datatable.min.css') }}">
@endpush

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">All Features</h4>
                <button type="button" class="btn btn-info btn-sm float-right"  data-toggle="modal" data-target="#create-user">
                    <i class="ft-plus"></i>
                    Create new feature
                </button>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-striped table-bordered dom-jQuery-events dataTable" id="myTable">
                                <thead>
                                    <tr role="row">

                                        <th class="sorting_asc">Icon</th>
                                        <th class="sorting_asc">Title</th>
                                        <th class="sorting_asc">Description</th>
                                        <th class="sorting_asc">Status</th>
                                        {{-- <th class="sorting">Joined at</th> --}}
                                        <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   @foreach ($features as $item)
                                   <tr role="row" class="odd">
                                   <td><i class="fa {{$item->icon_name}} fa-2x"></i></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->status }}</td>

                                        <td class="d-flex">
                                            <button class="btn btn-success btn-sm "  data-toggle="modal" data-target="#edit-feature{{ $item->id }}">
                                                Edit
                                            </button>

                                            <a class="btn btn-danger btn-sm ml-1" onclick="return confirm('are you sure to delete this?')" href="{{route('features.delete',$item->id)}}">Delete</a>

<div class="modal fade text-left" id="edit-feature{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="">Update Feature</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form class="form form-horizontal" action="{{ route('features.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Icon class</label>
                                                <div class="col-md-9">
                                                Find icons: <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome 4.7</a>
                                                <input type="text" id="projectinput1" class="form-control" placeholder="fa fa-example" name="icon_name" value="{{ old('icon_name', $item->icon_name) }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput3">Title</label>
                                                <div class="col-md-9">
                                                    <strong>50 character only</strong>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="title" name="title" value="{{ old('title', $item->title) }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput4">Description</label>
                                                <div class="col-md-9">
                                                    <strong>120 character only</strong>
                                                    <textarea class="form-control" name="description" id="" rows="3">{{ old('description', $item->description) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput4">Status</label>
                                                <div class="col-md-9">
                                                      <select class="form-control" name="status" id="">
                                                        <option value="1" {{ $item->status == 1 ? "selected":'' }}>Active</option>
                                                        <option value="0" {{ $item->status == 0 ? "selected":'' }}>Inactive</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">
                        <i class=""></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

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


<div class="modal fade text-left" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="">Add new Feature</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form class="form form-horizontal" action="{{ route('features.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Icon class</label>
                                                <div class="col-md-9">
                                                    Find icons: <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome 4.7</a>
                                                    <input type="text" id="projectinput1" class="form-control" placeholder="fa fa-example" name="icon_name" value="{{ old('icon_name') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput3">Title</label>
                                                <div class="col-md-9">
                                                    <strong>50 character only</strong>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="title" name="title" value="{{ old('title') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput4">Description</label>
                                                <div class="col-md-9">
                                                    <strong>120 character only</strong>
                                                    <textarea class="form-control" name="description" id="" rows="3">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput4">Status</label>
                                                <div class="col-md-9">
                                                      <select class="form-control" name="status" id="">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">
                    <i class="ft-plus"></i>
                    Create
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        // $(document).ready( function () {
        //     $('#myTable').DataTable();
        // } );
    </script>
@endpush
