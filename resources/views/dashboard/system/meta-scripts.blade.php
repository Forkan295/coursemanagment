@extends('layouts.admin')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Meta Scripts</h4>
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
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('meta.scripts') }}" method="POST"> 
                            @csrf
                            <fieldset>

                                <br><br><h4>Header & Footer Scripts</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Header scripts</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="header_scripts" id="" cols="30" rows="20">{!! old('header_scripts',$system->header_scripts) !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Footer scripts</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="footer_scripts" id="" cols="30" rows="20">{!! old('footer_scripts',$system->footer_scripts) !!}</textarea>
                                        </div>
                                    </div>
                                </div>
        
                                <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>{{-- card-body --}}
        </div>{{-- card-content --}}
    </div>{{-- card --}}
</div>{{-- Col-md-10 --}}
</div> {{-- Row --}}

@endsection

@push('js')
<script>

</script>    
@endpush