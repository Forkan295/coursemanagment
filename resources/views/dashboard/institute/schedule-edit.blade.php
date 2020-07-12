@extends('layouts.admin')
@push('css')
<link rel="stylesheet" href="{{ asset('multi-select/css/multi-select.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Update Schedule</h4>
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
                    <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
                        <div class="modal-body">
                            @csrf  
                            <div class="form-group">
                            <label for="batch">Batch</label>     
                            <input class="form-control" id="batch" disabled value="Batch {{ $schedule->batch->batch }}">
                            
                            </div>
                        
                            <div class="form-group" id="course">
                                <label>Course</label>
                                <input class="form-control" disabled value="{{ $schedule->course->course_name }}" />
                            </div>
                            <div class="form-group">
                                <select multiple="multiple" id="day-select"  name="day_id[]">
                                    @foreach ($days as $key => $item)
                                        <option
                                            @foreach ($schedule->days as $day)
                                                @if ($item->id == $day->id)
                                                    selected
                                                @endif
                                            @endforeach
                                        
                                        value='{{ $item->id }}'>{{ $key+1 }}) {{  $item->day   }}</option>
                                    @endforeach
                                </select>
                            </div>
                        

                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $schedule->time }}" name="time" placeholder="Enter time">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('schedule.index') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('multi-select/js/jquery.multi-select.js') }}"></script>

    <script>

       $('#day-select').multiSelect( {
                selectableHeader: "<div class='bg-success text-light pl-2'>Selectable days</div>",
                selectionHeader: "<div class='bg-info text-light pl-2'>Selected days</div>",
             }
        );

</script>

@endpush