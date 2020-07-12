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
                <h4 class="card-title" id="basic-layout-form">Update content</h4>
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
                            <form class="form" action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">lecture no (numeric only)</label>
                                                        <input type="number" class="form-control" name="lecture" value="{{ old('lecture', $content->lecture) }}" placeholder="Enter lecture nuber">
                                                        <p class="text-danger">
                                                            {{ $errors->first('lecture') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Content Title</label>
                                                        <input type="text" class="form-control" name="content_title" value="{{ old('content_title', $content->content_title) }}" placeholder="Enter content title">
                                                        <p class="text-danger">
                                                            {{ $errors->first('content_title') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="projectinput1">Video Link/URL (youtube only)</label>
                                                        <input type="text" class="form-control" id="link" placeholder="Video link or URL">

                                                        <button class="btn btn-warning float-right btn-sm" id="make-embed" type="button">Make Embed</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p class="text-success"> 
                                                    <strong>Note:</strong>
                                                    to get video embed frame code, copy a video link from youtube and past it to above "Video Link" field. then just press "Make Embed" yellow button.
                                                    you can also paste or edit embed code in "Video Embed" field by clicking the following "Edit Embed" button.
                                                </p>
                                                <label for="projectinput1">Video Embed</label>
                                                <textarea readonly class="form-control" name="video_embed" id="embed" cols="30" rows="2">{{ old('video_embed', $content->video_embed) }}</textarea>
                                                <button class="btn btn-info float-right btn-sm" id="edit-embed" type="button">Edit Embed</button>

                                                <p class="text-danger">
                                                    {{ $errors->first('video_embed') }}
                                                </p>
                                            </div><br><br>

                                            {!! $content->video_embed !!} 
                                            <br><br>
                                        </div> 

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Content description</label>
                                                <textarea id="editor" rows="20" class="form-control" name="content_description" placeholder="Course description">{{ old('content_description', $content->content_description) }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('content_description') }}
                                                </p>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="course-change">Course</label>
                                                        <select id="course-change" name="course_id" class="form-control" >
                                                            <option disabled>Select a course</option>
                                                            @foreach ($courses as $item)
                                                                <option 
                                                                    @if ($content->course_id == $item->id)
                                                                        selected
                                                                    @endif
                                                                value="{{ $item->id }}">{{ $item->course_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="text-danger">
                                                            {{ $errors->first('course_id') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput6">Batch</label>
                                                        <select id="projectinput6" name="batch_id" class="form-control">
                                                            <option disabled selected>Select a batch</option>
                                                            @foreach ($batches as $item)
                                                            <option 
                                                                @if ($content->batch_id == $item->id)
                                                                    selected
                                                                @endif
                                                            value="{{ $item->id }}">Batch {{ $item->batch }}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="text-danger">
                                                            {{ $errors->first('batch_id') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Content category (Course Attributes)</label>
                                                        <select class="form-control" id="select" name="attribute_id[]" multiple>
                                                            @foreach ($attributes as $item)
                                                                <option 
                                                                    @foreach ($content->attributes as $attr)
                                                                        @if ($attr->id == $item->id)
                                                                            selected
                                                                        @endif
                                                                    @endforeach

                                                                value="{{ $item->id }}"> {{  $item->attribute   }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput6">Show public</label>
                                                        <select id="projectinput6" name="is_public" class="form-control">
                                                            <option 
                                                               {{ ($content->is_public == false) ? "selected" : "" }}
                                                            value="0">No</option>
                                                            <option 
                                                                {{ ($content->is_public == true) ? "selected" : "" }}
                                                            value="1">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
        
                                <div class="form-actions">
                                    <a href="{{ route('admin.content') }}" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </a>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){

        $('#select').select2({
            tag: true,
            placeholder: "Select some categories"
        });
        // alert('course changed');
        $('#course-change').on('change',function(){
            var course_id = $("#course-change option:selected").val();
            var url = "{{ route('course.attributes') }}";
            $.ajax({
                url: url,
                method: "get",
                data: {
                    'course_id': course_id
                },
                success: function(response){
                    console.log(response);
                    $('#select').html(response);
                }
            }); 

        });


        $('#make-embed').click(function(){

            var link = $('#link').val();

            if(link == "")
            {
                alert('Error! please give a youtube video link');
            }
            else 
            {
                // alert(link);
                var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;

                var match = link.match(regExp);
                
                if (match && match[2].length == 11) {
                   
                    var embed = `<iframe width="100%" height="519px" src="https://www.youtube.com/embed/`+ match[2] +`?rel=0;hd=1&amp;modestbranding=1;showinfo=0" frameborder="1" allowfullscreen></iframe>`;

                    $('#link').val("");

                    $('#embed').html(embed);

                    alert('Embed created successfully.');
                    // return match[2];
                } else {
                //error
                    alert('Error! Invalid video link given');
                }

            }
        });

        $('#edit-embed').click(function(){
            $('#embed').removeAttr('readonly');
            $('#edit-embed').hide();
        });


    });


</script>
@endpush
