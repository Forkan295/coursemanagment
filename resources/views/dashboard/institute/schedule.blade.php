@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('multi-select/css/multi-select.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">All Schedules</h4>
                @canany(['Create Schedule'])
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#create-schedule">
                  <i class="fa fa-plus"></i>  Create Schedule
                </button>
                @endcanany
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                     <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Batch</th>
                                    <th>Course</th>
                                    <th>Class Days</th>
                                    <th>Class Time</th>
                                    @canany(['Update Schedule', 'Delete Schedule'])
                                    <th>#</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $key => $item)
                                <tr>
                                    <td>Batch {{ $item->batch->batch }}</td>
                                    <td>{{ $item->course->course_name }}</td>
                                    <td>
                                        @foreach($item->days as $key => $day)
                                          <strong>{{ $day->day }}</strong>, &nbsp;
                                        @endforeach    
                                    </td>
                                    <td>
                                        {{ $item->time }}
                                    </td>
                                    @canany(['Update Schedule', 'Delete Schedule'])
                                    <td>
                                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fa fa-cog"></i>  Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"  href="{{ route('schedule.edit', $item->id) }}">
                                               <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="{{ route('schedule.destroy', $item->id ) }}" onclick="return confirm('Are you sure to delete this schedule ?')">
                                               <i class="fa fa-times"></i> Delete
                                            </a>
                                        </div>
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

<div class="modal fade" id="create-schedule" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('schedule.store') }}" method="POST">
        <div class="modal-body">
            @csrf  
            <div class="form-group">
            <label for="batch">Batch</label>     
                <select class="form-control" id="batch" name="batch_id">
                    <option selected disabled>Select batch</option>
                    @foreach ($batches as $item)
                        <option value="{{ $item->id }}">Batch {{ $item->batch }}</option>
                    @endforeach 
                </select>
            </div>
        
            <div class="form-group" id="course">
                <select class="form-control" id="batch" name="course_id">
                    <option selected disabled>Select Course</option>
                    @foreach ($courses as $key => $item)
                    <option value="{{ $item->id }}">{{ $key+1 }} )  {{ $item->course_name   }}</option>
                    @endforeach 
                </select>
                
            </div>
        
            <div class="form-group">
            <select multiple="multiple" id="day-select"  name="day_id[]">
                @foreach ($days as $key => $item)
                    <option value='{{ $item->id }}'>{{ $key+1 }} ) {{  $item->day   }}</option>
                @endforeach
            </select>
            </div>
        
            <div class="form-group">
                <input type="text" class="form-control" name="time" placeholder="Enter time">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
        </form>
    </div>
  </div>
</div>

@endsection

@push('js')
<script src="{{ asset('multi-select/js/jquery.multi-select.js') }}"></script>

    <script>
        $(document).ready(function(e){

            var html = `
   <tr>
        <td>
            <div class="form-group">
                <select class="form-control" id="batch">
                    <option selected disabled>Select batch</option>
                    <option>Batch 1</option>
                    <option>Batch 2</option>
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <select class="form-control" id="course">
                    <option selected disabled>Select course</option>
                    @foreach ($courses as $item)
                        <option value="{{ $item->id }}">{{ $item->course_name }}</option>
                    @endforeach
                </select>
            </div>
        </td>
        <td> 
            <select multiple="multiple" id="day-select1"  name="day_id[]">
                @foreach ($days as $key => $item)
                    <option value='{{ $item->id }}'>{{ $key+1 }} ) {{  $item->day   }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter time">
            </div>
        </td>
        <td>
            <a href="#" class="btn btn-danger" id="remove-culumn">X</a>
        </td>
    </tr>
            `; 



    //To add a perticular column
            $('#add-culumn').click(function(e){
                e.preventDefault();
                $('#dynamic').append(html);
            });
    //To remove a perticular column
            $('#dynamic').on('click', '#remove-culumn', function(e){
                e.preventDefault();
                $(this).closest('tr').remove();
            });
        });

        $('#day-select').multiSelect( {
                selectableHeader: "<div class='bg-success text-light pl-2'>Selectable days</div>",
                selectionHeader: "<div class='bg-info text-light pl-2'>Selected days</div>",
             }
        );

</script>

@endpush