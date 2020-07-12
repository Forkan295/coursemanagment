@extends('layouts.admin')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/datatable.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $pageTitle }}</h4><br>
                    <form class="form">
                            {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="projectinput6">Course</label>
                                        <select id="projectinput6" name="is_active" class="form-control course">
                                            <option selected disabled>Select course</option>
                                            @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">{{ $item->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="projectinput6">Batch</label>
                                        <select id="projectinput6" name="is_active" class="form-control batch">
                                            <option selected disabled>Select Batch</option>
                                            @foreach ($batches as $item)
                                            <option value="{{ $item->id }}">Batch - {{ $item->batch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                 
                            </div>
                    </form>

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
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">

                            <table class="table table-striped table-bordered dom-jQuery-events dataTable" id="myTable">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting">ID</th>
                                        <th class="sorting_asc">Trainee Name</th>
                                        <th class="sorting">Phone No</th>
                                        <th class="sorting">Course Name</th>
                                        <th class="sorting">Batch</th>
                                        <th class="sorting">Paid (BDT)</th>
                                        <th class="sorting">Due (BDT)</th>
                                        <th class="sorting">#</th>
                                    </tr>
                                </thead>
                                <tbody id="filter-students"></tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();


             var key = "all";
             var id = '';

             sendRequest(key, id);
             
            $('select.course').change(function(){
                 key = "course";
                 id = $(this).children("option:selected").val();
                 sendRequest(key, id);
            }); 

            $('select.batch').change(function(){
                 key = "batch";
                 id = $(this).children("option:selected").val();
                 sendRequest(key, id);
            }); 


             function sendRequest(key, id)
             {
               $.ajax({
                    url: "{{ route('search.students') }}",
                    method: "GET",
                    data:{ key: key, id: id },
                    success: function(response){
                    console.log(response);
                    $('#filter-students').html(response);
                    }
                });  
             }

        } );
    </script>
@endpush