@extends('layouts.admin_theme.container')

@section('dynamicdata')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    User List
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-body">
                    @include('layouts.admin_theme.alert')

                        <h3><a href="javascript:;" class="add-user-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
                        <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->email }}</td>
                                    <td>{{ $result->role->role }}</td>
                                    <td> @if($result->status == 1)
                                        <small class="label btn-sm bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm bg-red">Deactive</small>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit',$result->id) }}" title="Edit User">
                                            <button type="button" class="btn btn-sm bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>&nbsp;
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Add Form Start -->
                    <div class="modal fade" id="adduserForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card-header">
                                    <h3 class="card-title" id="myModalLabel">Add User</h3>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="name">Full Name <span style="color: red;"> *</span></label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter full name" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="email">Email <span style="color: red;"> *</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="password">Password <span style="color: red;"> *</span></label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="password">Confirm Password <span style="color: red;"> *</span></label>
                                                <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Confirm password" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role_id">Select Role <span style="color: red;"> *</span></label>
                                            <select class="form-control m-bot15" name="role_id" required>
                                                <option value="">--Please choose an option--</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control m-bot15" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="image_icon">Profile Pic</label>
                                                <input type="file" name="image_icon" class="form-control" id="image_icon" accept="image/png, image/jpeg" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Form -->

                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection