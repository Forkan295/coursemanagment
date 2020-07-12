@extends('layouts.admin')

@push('css')

@endpush

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Update Batch</h4>
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
        
                    <form class="form" action="{{ route('batch.update', $batch->id) }}" method="POST">
                        @csrf
                        <div class="form-body">
                            {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Batch</label>
                                        <input type="text" id="projectinput1" class="form-control" name="batch" value="{{ old('batch', $batch->batch) }}" placeholder="Course name">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="">
                            <a href="{{ route('batch.index') }}" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Update
                            </button>
                        </div>



                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')


@endpush