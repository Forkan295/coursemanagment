@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('multi-select/css/multi-select.css') }}">
@endpush

@section('content')
<div class="row">
    @canany(['Create Permission','Update Permission','Delete Permission'])
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
        
                    <form class="form" action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Permission</label>
                                        <input type="text" id="projectinput1" class="form-control" name="permission" value="{{ old('batch') }}" placeholder="Permission name">
                                        <p class="text-danger">
                                            {{ $errors->first('permission') }}
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
                                    <th>#</th>
                                    <th>Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
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