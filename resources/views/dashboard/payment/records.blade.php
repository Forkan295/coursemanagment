@extends('layouts.admin')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/datatable.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        {{-- <a class="btn btn-success float-right" href="{{ route('content.create') }}">
          <i class="fa fa-plus"></i>  Create new content
        </a> --}}
        {{-- <br><br><br> --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Student payment records</h4>
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
                        <div class="col-sm-12 table-responsive">
                            <div class="table-responsive">
                               <table class="table" id="myTable">
                                   <thead>
                                       <tr>
                                           <th>#</th>
                                           <th>Date</th>
                                           <th>Cashier</th>
                                           <th>Amount</th>
                                           <th>Student ID</th>
                                           <th>Student info</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($payments as $key => $item)
                                       <tr>
                                           <th scope="row">{{ $key+1 }}</th>
                                           <td>
                                               {{ $item->created_at->format('d M, Y') }} <br>
                                               {{ $item->created_at->format('l') }}
                                           </td>
                                           <td>{{ $item->user->name }}</td>
                                           <td>{{ $item->amount }} TK</td>
                                           <td>{{ $item->student->student_id }}</td>
                                           <td>
                                               <strong>Name</strong> - {{ $item->student->name }} <br>
                                               <strong>Course</strong> - {{ $item->student->course->course_name }} <br>
                                               <strong>Batch</strong> - {{ $item->student->batch->batch  }}
                                           </td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                               <br><br>
                               
                               {{ $payments->links() }}
                                
                           </div>
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
        } );
    </script>
@endpush