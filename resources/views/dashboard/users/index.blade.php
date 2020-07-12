@extends('layouts.admin')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/datatable.min.css') }}">
@endpush

@section('content')

<div class="modal fade text-left" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="">Create User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form class="form form-horizontal" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                @include('dashboard.parts.user-form') 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">
                    <i class="ft-plus"></i>
                    Create
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $pageTitle }}</h4>
                <button type="button" class="btn btn-info float-right"  data-toggle="modal" data-target="#create-user">
                    <i class="ft-plus"></i>
                    Create User
                </button>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-striped table-bordered dom-jQuery-events dataTable" id="myTable">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting">Image</th>
                                        <th class="sorting_asc">Name</th>
                                        <th class="sorting_asc">User ID</th>
                                        <th class="sorting">Phone No</th>
                                        <th class="sorting">Role</th>
                                        <th class="sorting">Account Status</th>
                                        {{-- <th class="sorting">Joined at</th> --}}
                                        <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   @foreach ($users as $item)
                                   <tr role="row" class="odd">
                                        <td>
                                            <img width="50px" src="{{ ($item->avatar != null) ? url('storage/users/'. $item->avatar) : asset('defaults/user.png') }}" alt="">      
                                        </td>
                                        <td class="sorting_1">{{ $item->name }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            @foreach ($item->roles as $role)
                                                {!! "#".$role->name."<br>" !!}
                                            @endforeach
                                        </td>
                                        <td>{!! ($item->account_status == true) ?
                                        "<p class='text-success'>Active</p>" : 
                                        "<p class='text-danger'>Inactive</p>" !!}</td>
                                        {{-- <td>{{ $item->created_at->format('d M, Y')}}</td> --}}
                                        <td>
                                            <button class="btn btn-success btn-sm float-right"  data-toggle="modal" data-target="#detailes-user-{{ $item->id }}">
                                                Edit
                                            </button>


<div class="modal fade text-left" id="detailes-user-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="">Update User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form class="form form-horizontal" action="{{ route('users.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                @include('dashboard.parts.user-detailes-form') 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">
                    <i class=""></i>
                    Update
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

                                        </td>
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
</div>
@endsection

@push('js')
    <script>
        // $(document).ready( function () {
        //     $('#myTable').DataTable();
        // } );
    </script>
@endpush