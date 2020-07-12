@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('multi-select/css/multi-select.css') }}">
@endpush

@section('content')
<div class="row">
    @canany(['Create Role','Update Role','Delete Role'])
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Create Role</h4>
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
        
                    <form class="form" action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            {{-- <h4 class="form-section"><i class="ft-file"></i>Create Batch</h4> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">Role</label>
                                        <input type="text" id="projectinput1" class="form-control" name="role" value="{{ old('role') }}" placeholder="Enter role">
                                        <p class="text-danger">
                                            {{ $errors->first('role') }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <select multiple="multiple" id="permissions"  name="permissions[]">
                                            @foreach ($permissions as $key => $item)
                                                <option value='{{ $item->id }}'>{{ $key+1 }} ) {{  $item->name   }}</option>
                                            @endforeach
                                        </select>
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

    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Roles</h4>
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
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    @canany(['Create Role','Update Role','Delete Role'])
                                    <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                            data-target="#permissions-{{ $item->id }}">
                                            <i class="fa fa-eye"></i> view
                                        </button>
                                    </td>
                                        @canany(['Create Role','Update Role','Delete Role'])
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#edit-{{ $item->id }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="dropdown-item" type="button">
                                                        <i class="fa fa-times"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        @endcanany
                                    </tr>

<div class="modal fade" id="permissions-{{ $item->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permissions for <strong>{{ $item->name }}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
                @foreach ($item->permissions as $permission)
                    {!! '#'.$permission->name."<br>" !!}
                @endforeach
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
    </div>
  </div>
</div>

@canany(['Create Role','Update Role','Delete Role'])
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('role.update', $item->id) }}" method="post">
            @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="projectinput1">Role</label>
                <input type="text" id="projectinput1" class="form-control" name="role" value="{{ $item->name }}" placeholder="Enter role">
                <p class="text-danger">
                    {{ $errors->first('role') }}
                </p>
            </div>

            <div class="form-group">
                <select multiple="multiple" id="permissions-edit-{{ $item->id }}"  name="permissions[]">
                    @foreach ($permissions as $key => $permission)
                        <option 
                        
                           @foreach ($item->getAllPermissions() as $role_permission)
                               @if ($permission->id == $role_permission->id)
                                   selected
                               @endif
                           @endforeach
                        
                        value='{{ $permission->id }}'>{{ $key+1 }} ) {{  $permission->name   }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endcanany
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
<script src="{{ asset('multi-select/js/jquery.multi-select.js') }}"></script>
<script>
    $('#permissions').multiSelect( {
            selectableHeader: "<div class='bg-success text-light pl-2'>permissions</div>",
            selectionHeader: "<div class='bg-info text-light pl-2'>Selected permissions</div>",
            }
    );

    @foreach ($roles as $item)
        $('#permissions-edit-{{ $item->id }}').multiSelect( {
                selectableHeader: "<div class='bg-success text-light pl-2'>permissions</div>",
                selectionHeader: "<div class='bg-info text-light pl-2'>Selected permissions</div>",
                }
        );
    @endforeach
</script>
@endpush
