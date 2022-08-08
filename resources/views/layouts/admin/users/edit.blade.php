@extends('layouts.admin_theme.container')

@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit User
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">

                    <form id="userEditForm" action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('layouts.admin_theme.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name <span style="color: red;"> *</span></label>
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $user->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email <span style="color: red;"> *</span></label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ $user->email }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="role_id">Select Role <span style="color: red;"> *</span></label>
                                        <select class="form-control m-bot15" name="role_id" required>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? 'selected="selected"' : '' }}>{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($user->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($user->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="image_icon">Profile Pic</label>
                                            <img src="{{ asset('uploads/users/'. $user->image_icon) }}" height="80" width="100">
                                            <input type="file" name="image_icon" class="form-control" id="image_icon" accept="image/png, image/jpeg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_method" value="PUT">

                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection