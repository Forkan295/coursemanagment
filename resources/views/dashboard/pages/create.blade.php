@extends('layouts.admin')

@push('css')

@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Create new page</h4>
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
                        <div class="col-md-12">
                            <form class="form" action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                                    <div class="row">
                                        <div class="col-md-8">
                                                
                                            <div class="form-group">
                                                <label for="projectinput1">Page Title</label>
                                                <input type="text" class="form-control" name="page_title" value="{{ old('page_title') }}" placeholder="Enter page title">
                                                <p class="text-danger">
                                                    {{ $errors->first('page_title') }}
                                                </p>
                                            </div>
                                            
                                          
                                            <div class="form-group">
                                                <label for="projectinput1">Page slug</label>
                                                <input type="text" class="form-control" name="page_slug" value="{{ old('page_slug') }}" placeholder="Enter page slug">
                                                <p class="text-danger">
                                                    {{ $errors->first('page_slug') }}
                                                </p>
                                            </div>
                                                  
                                            <div class="form-group">
                                                <label for="projectinput1">Page description</label>
                                                <textarea id="editor" rows="20" class="form-control" name="page_description" placeholder="page description">{{ old('page_description') }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('page_description') }}
                                                </p>
                                            </div>


                                            <button type="button" class="btn btn-link" id="show-meta-options">More options for SEO</button>

                                            <div id="meta-options" style="display:none">
                                                <div class="form-group">
                                                    <label for="projectinput1">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" placeholder="Enter meta title">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_title') }}
                                                    </p>
                                                </div>
        
                                                <div class="form-group">
                                                    <label for="projectinput1">Meta Keyword <span class="text-muted">( insert comma to separate tag )</span></label>
                                                    <input type="text" class="form-control" name="meta_keyword" value="{{ old('meta_keyword') }}" placeholder="Enter meta keyword">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_keyword') }}
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput1">Meta description</label>
                                                    <textarea id="editor" rows="10" class="form-control" name="meta_description" placeholder="Meta description">{{ old('meta_description') }}</textarea>
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_description') }}
                                                    </p>
                                                </div>
                                            </div>




                                        </div>

                                        <div class="col-md-4">

                                                <div class="form-group">
                                                    <label for="course-change">Page status</label>
                                                    <select id="course-change" name="page_status" class="form-control" >
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <p class="text-danger">
                                                        {{ $errors->first('page_status') }}
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Show in main menu</label>
                                                    <select class="form-control" type="select" name="show_main_menu" id="">
                                                         <option value="1">yes</option>  
                                                         <option value="0">No</option>  
                                                    </select>
                                                    <p class="text-danger">
                                                        {{ $errors->first('show_main_menu') }}
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Show in footer</label>
                                                    <select class="form-control" type="select" name="show_footer" id="">
                                                         <option value="1">yes</option>  
                                                         <option value="0">No</option>  
                                                    </select>
                                                    <p class="text-danger">
                                                        {{ $errors->first('show_footer') }}
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Featured Image <span class="text-muted">( 1920 X 717 )</span></label>
                                                    <input class="form-control" type="file" name="featured_image" id="">
                                                    <p class="text-danger">
                                                        {{ $errors->first('featured_image') }}
                                                    </p>
                                                </div><br><br>

                                                {{-- <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button> --}}
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save page
                                                </button>
        
                                        </div>{{-- Col-md-4 --}}
                                    </div> {{-- Row --}}
                                </div>{{-- Form Body --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
<script>
    $(document).ready(function(){

        $('#show-meta-options').click(function(){
            $('#meta-options').show();
            $('#show-meta-options').hide();
        });
        
    });


</script>
@endpush
