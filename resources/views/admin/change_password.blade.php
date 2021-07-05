@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Change Password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.profile.change_password') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <h5>Old Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control" required
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>New Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="new_password" class="form-control" required
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Repeat New Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="new_password_repeat"
                                                    data-validation-match-match="new_password" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
