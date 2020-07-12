@extends('layouts.admin')

@push('css')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Create new course</h4>
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
                        <div class="col-md-6 offset-md-3">
                            <form class="form" action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Course name</label>
                                                <input type="text" class="form-control" name="course_name" value="{{ old('course_name') }}" placeholder="Enter course name">
                                                <p class="text-danger">
                                                    {{ $errors->first('course_name') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Course title</label>
                                                <input type="text"  class="form-control" name="course_title" value="{{ old('course_title') }}" placeholder="Enter course title">
                                                <p class="text-danger">
                                                    {{ $errors->first('course_title') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Course Fees</label>
                                                <input type="number" class="form-control" name="course_fees" value="{{ old('course_fees') }}" placeholder="Course fees">
                                                <p class="text-danger">
                                                    {{ $errors->first('course_fees') }}
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Admission Fees</label>
                                                <input type="number" class="form-control" name="admission_fees" value="{{ old('admission_fees') }}" placeholder="Admission fees">
                                                <p class="text-danger">
                                                    {{ $errors->first('admission_fees') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Course description</label>
                                                <textarea id="editor" rows="20" class="form-control" name="course_description" placeholder="Course description">{{ old('course_description') }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('course_description') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Course Attributes</label>
                                                <select class="form-control" id="select" name="attribute[]" multiple>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Course period</label>
                                                <input type="text" class="form-control" name="course_period" value="{{ old('course_period') }}" placeholder="Ex: 6 month">
                                                <p class="text-danger">
                                                    {{ $errors->first('course_period') }}
                                                </p>
                                            </div>
                                        </div>
        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput6">Is active ?</label>
                                                <select id="projectinput6" name="is_active" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('is_active') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput6">Course Image</label>
                                                <input type="file" name="image" id="">
                                                <p class="text-danger">
                                                    {{ $errors->first('is_active') }}
                                                </p>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',  // change this value according to your HTML
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#select').select2({
        tags: true,
        placeholder: "Add some attributes like EX: Php, Javascript, Mysql.. etc.",
        tokenSeparators: [',', ' ']
    });
});
</script>
@endpush
