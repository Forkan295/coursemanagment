<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput1">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput1" class="form-control" placeholder="Full Name" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                            <div class="col-md-9">
                                <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput6">User Role</label>
                            <div class="col-md-9">
                                <select id="projectinput6" name="role" class="form-control">
                                    <option disabled selected>Select a role</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>