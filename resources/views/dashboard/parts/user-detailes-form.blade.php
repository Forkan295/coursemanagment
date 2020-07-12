<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">

                        <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput1">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput1" class="form-control" placeholder="Full Name" name="name" value="{{ $item->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email"  value="{{ $item->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput4">Contact Number</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput4" class="form-control" placeholder="Phone number" name="phone" value="{{ $item->phone }}">
                            </div>
                        </div>

                        <h4 class="form-section"><i class="ft-clipboard"></i> Address</h4>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput5">Address</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput5" class="form-control" placeholder="Street address" name="address" value="{{ $item->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput5">City</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput5" class="form-control" placeholder="City" name="city" value="{{ $item->city }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput5">Zip/Postal</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput5" class="form-control" placeholder="Zip/Postal code" name="postal_code" value="{{ $item->postal_code }}">
                            </div>
                        </div>

                        <h4 class="form-section"><i class="ft-clipboard"></i> Account</h4>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput6">Account status</label>
                            <div class="col-md-9">
                                <select id="projectinput6" name="account_status" class="form-control">
                                    <option
                                        @if ($item->account_status == true)
                                         selected
                                        @endif
                                    value="1">Active</option> 

                                    <option
                                        @if ($item->account_status == false)
                                         selected
                                        @endif
                                    value="0">Inactive</option> 
                                  
                                </select>
                            </div>
                        </div>


                        <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput6">User Role</label>
                            <div class="col-md-9">
                                <select id="projectinput6" name="role" class="form-control">
                                    @foreach ($roles as $role)
                                    <option

                                      @foreach ($item->roles as $userRole)
                                        @if ($role->name == $userRole->name)
                                         selected
                                        @endif
                                      @endforeach

                                    value="{{ $role->id }}">{{ $role->name }}</option> 
                                    @endforeach
                                  
                                </select>
                            </div>
                        </div>


            
                        <div class="form-group row">
                            <label class="col-md-3 label-control">User Avatar</label>
                            <div class="col-md-6">
                                <label id="projectinput8" class="file center-block">
                                    <input type="file" id="file" name="avatar">
                                    <span class="file-custom"></span>
                                </label>
                            </div>

                            <div class="col-md-3 user-avatar text-center">
                                <img width="100px" class="img img-thumbnail" src="{{ url('storage/users/'. $item->avatar) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>