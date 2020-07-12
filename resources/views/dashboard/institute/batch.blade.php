@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('multi-select/css/multi-select.css') }}">
@endpush

@section('content')
<div class="row">
    @canany(['Create Batch','Update Batch','Delete Batch'])
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Create Batch</h4>
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
        
                    <form class="form" action="{{ route('batch.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Batch</label>
                                        <input type="number" id="projectinput1" class="form-control" name="batch" value="{{ old('batch') }}" placeholder="Batch No">
                                        <p class="text-danger">
                                            {{ $errors->first('batch') }}
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
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
        </div>
    </div>
    @endcanany 
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Batches</h4>
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
                                    <th>Batch</th>
                                    <th>Students</th>
                                    <th>Batch Status</th>
                                    @canany(['Create Batch','Update Batch','Delete Batch'])
                                    <th>Action</th>
                                    @endcanany 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($batches as $key => $item)
                                <tr>
                                    <td>Batch {{ $item->batch }}</td>
                                    <td>{{ ($item->students->count() < 1) ? "No Students" : $item->students->count() }}</td>
                                    <td>
                                        @if($item->start_status == false)
                                        @canany(['Create Batch','Update Batch','Delete Batch'])
                                        <a href="{{ route('start.batch', $item->id) }}" onclick="return confirm('Are you sure to start this batch?')" class="btn btn-warning btn-sm">
                                            Start batch
                                        </a>
                                        @endcanany 
                                        @else 
                                            @if($item->completion_status == false)
                                                <span class="text-info">  
                                                    <strong>Running...</strong>
                                                </span> 
                                                @canany(['Create Batch','Update Batch','Delete Batch'])
                                                &nbsp;
                                                    <a href="{{ route('end.batch', $item->id) }}" onclick="return confirm('Are you sure to end this batch?')" class="btn btn-danger btn-sm">
                                                        End this
                                                    </a>
                                                @endcanany
                                            @else 
                                              <span class="text-success">
                                                  <strong>Completed.</strong>
                                               </span>
                                            @endif
                                        @endif
                                         
                                    </td>
                                    @canany(['Create Batch','Update Batch','Delete Batch'])
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('batch.view', $item->id) }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
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

@push('js')


@endpush