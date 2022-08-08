@extends('layouts.admin_theme.container')

@section('dynamicdata')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
          Role List
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>RoleName</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($roles as $role)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $role->role }}</td>
                  <td> @if($role->status == 1)
                    <small class="label btn-sm bg-green">Active</small>
                    @else
                    <small class="label btn-sm bg-red">Deactive</small>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>SN</th>
                  <th>RoleName</th>
                  <th>Option</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection