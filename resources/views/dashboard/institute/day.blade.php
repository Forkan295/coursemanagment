@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">
                <h4 class="card-title float-left">Weekly day's</h4>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create-day">
                   <i class="fa fa-plus"></i> Create Day
                </button>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                     <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Comment</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($days as $key => $item)
                                <tr>
                                    <td>{{ $item->day }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>
                                         <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#edit-day-{{ $item->id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>


<div class="modal fade" id="edit-day-{{ $item->id }}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="{{ route('day.update', $item->id) }}" method="POST">
      <div class="modal-body">
            @csrf
            <div class="form-body">
                {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput1">Day</label>
                            <input type="text" id="projectinput1" class="form-control" name="day" value="{{ old('day', $item->day ) }}" placeholder="Ex: Saturday, Sunday, Monday..">
                            <p class="text-danger">
                                {{ $errors->first('day') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <input type="text" class="form-control" name="comment" value="{{ old('comment', $item->comment ) }}" placeholder="Enter day note">
                            <p class="text-danger">
                                {{ $errors->first('comment') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="create-day" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="{{ route('day.store') }}" method="POST">
      <div class="modal-body">
            @csrf
            <div class="form-body">
                {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput1">Day</label>
                            <input type="text" id="projectinput1" class="form-control" name="day" value="{{ old('day') }}" placeholder="Ex: Saturday, Sunday, Monday..">
                            <p class="text-danger">
                                {{ $errors->first('day') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Comment</label>
                            <input type="text" id="projectinput1" class="form-control" name="comment" value="{{ old('comment', 'No comments') }}" placeholder="Enter day note">
                            <p class="text-danger">
                                {{ $errors->first('comment') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
</div>
</div>

@endsection