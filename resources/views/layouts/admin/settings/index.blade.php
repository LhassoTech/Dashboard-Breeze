@extends('layouts.admin_theme.container')

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Settings
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
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-general-tab" data-toggle="pill" href="#custom-tabs-three-general" role="tab" aria-controls="custom-tabs-three-general" aria-selected="true"><i class="fa fa-university"></i> General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-social_media-tab" data-toggle="pill" href="#custom-tabs-three-social_media" role="tab" aria-controls="custom-tabs-three-social_media" aria-selected="false"><i class="fa fa-link"></i> Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-others-tab" data-toggle="pill" href="#custom-tabs-three-others" role="tab" aria-controls="custom-tabs-three-others" aria-selected="false"><i class="fa fa-list"></i> Others</a>
                                </li>
                            </ul>
                        </div>
                        @include('layouts.admin_theme.alert')

                        <form id="settingEditForm" action="{{ route('admin.setting.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">
                                        <div class="form-group">
                                            <label class="control-label">Name <span style="color:red;"> *</span></label>
                                            <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="{{ $setting->site_name }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Site Url</label>
                                            <input type="text" class="form-control" name="site_url" placeholder="Site URL" value="{{ $setting->site_url }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Email <span style="color:red;"> *</span></label>
                                            <input type="text" class="form-control" name="site_email" placeholder="Site Email" value="{{ $setting->site_email }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Mobile Number <span style="color:red;"> *</span></label>
                                            <input type="text" class="form-control" name="site_mobile" placeholder="Site Mobile No." value="{{ $setting->site_mobile }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" class="form-control" name="site_phone" placeholder="Site Phone" value="{{ $setting->site_phone }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Address <span style="color:red;"> *</span></label>
                                            <input type="text" class="form-control" name="site_address" placeholder="Site Address" value="{{ $setting->site_address }}" required>
                                        </div>

                                        <div className="form-group">
                                            <label class="control-label" for="img_logo">Logo Image Upload</label>
                                            <input type="file" class="form-control" name="img_logo" value="{{ $setting->img_logo }}">
                                            <img src="{{ asset('uploads/settings/'. $setting->img_logo) }}" height="80" width="100">
                                        </div>
                                            <br>
                                        <div className="form-group">
                                            <label class="control-label" for="img_fav">Fav Image Upload</label>
                                            <input type="file" class="form-control" name="img_fav" value="{{ $setting->img_fav }}">
                                            <img src="{{ asset('uploads/settings/'. $setting->img_fav) }}" height="80" width="100">
                                        </div>
                                            <br>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Latitude</label>
                                                <input type="text" class="form-control" name="latitude" placeholder="Enter Latitude">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Longitude</label>
                                                <input type="text" class="form-control" name="longitude" placeholder="Site Longitude">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-social_media" role="tabpanel" aria-labelledby="custom-tabs-three-social_media-tab">
                                        <div class="form-group">
                                            <label class="control-label">Facebook Url</label>
                                            <input type="text" class="form-control" name="facebook_url" placeholder="Enter Facebook Url" value="{{ $setting->facebook_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Twitter Url</label>
                                            <input type="text" class="form-control" name="twitter_url" placeholder="Enter Twitter Url" value="{{ $setting->twitter_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Linkedin Url</label>
                                            <input type="text" class="form-control" name="linkedin_url" placeholder="Enter Linkedin Url" value="{{ $setting->linkedin_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Instagram Url</label>
                                            <input type="text" class="form-control" name="instagram_url" placeholder="Enter Instagram Url" value="{{ $setting->instagram_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Youtube Url</label>
                                            <input type="text" class="form-control" name="youtube_url" placeholder="Enter youtube Url" value="{{ $setting->youtube_url }}">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-others" role="tabpanel" aria-labelledby="custom-tabs-three-others-tab">
                                        <div class="clearfix"></div>

                                        <div class="form-group">
                                            <label class="control-label">Site Copyright</label>
                                            <input type="text" class="form-control" name="site_copyright" placeholder="Copyright:Date SiteName.com" value="{{ $setting->site_copyright }}">
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