@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->

        <section class="content">

            @if (isset($customer))
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('customer.update', ['customer' => $customer->id]) }}">
                    @method('PATCH')

                @else
                    <form method="POST" enctype="multipart/form-data" action="{{ route('customer.store') }}">

            @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h5>Name of Customer <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name"
                                value="{{ (old('name') ? old('name') : isset($customer)) ? $customer->name : '' }}"
                                class="form-control" required>
                            <div class="help-block"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h5>Email of Customer <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="email"
                                value="{{ (old('email') ? old('email') : isset($customer)) ? $customer->email : '' }}"
                                class="form-control" required>
                            <div class="help-block"></div>
                        </div>

                    </div>
                </div>
                @if (!isset($customer))

                    <div class="col-md-12">
                        <div class="form-group">
                            <h5>Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="password"
                                    value="{{ (old('password') ? old('password') : isset($customer)) ? $customer->password : '' }}"
                                    class="form-control" required>
                                <div class="help-block"></div>
                            </div>

                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Shipping Address Line 1</h5>
                                <div class="controls">
                                    <input type="text" name="shipping_address_line_1"
                                        value="{{ (old('shipping_address_line_1') ? old('shipping_address_line_1') : isset($customer)) ? $customer->address->shipping_address_line_1 : '' }}"
                                        class="form-control" required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Billing Address Line 1</h5>
                                <div class="controls">
                                    <input type="text" name="billing_address_line_1"
                                        value="{{ (old('billing_address_line_1') ? old('billing_address_line_1') : isset($customer)) ? $customer->address->billing_address_line_1 : '' }}"
                                        class="form-control">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Shipping Address Line 2</h5>
                                <div class="controls">
                                    <input type="text" name="shipping_address_line_2"
                                        value="{{ (old('shipping_address_line_2') ? old('shipping_address_line_2') : isset($customer)) ? $customer->address->shipping_address_line_2 : '' }}"
                                        class="form-control" required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Billing Address Line 2</h5>
                                <div class="controls">
                                    <input type="text" name="billing_address_line_2"
                                        value="{{ (old('billing_address_line_2') ? old('billing_address_line_2') : isset($customer)) ? $customer->address->billing_address_line_2 : '' }}"
                                        class="form-control">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Shipping District</h5>
                                <div class="controls">
                                    <input type="text" name="shipping_district"
                                        value="{{ (old('shipping_district') ? old('shipping_district') : isset($customer)) ? $customer->address->shipping_district : '' }}"
                                        class="form-control" required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Billing District</h5>
                                <div class="controls">
                                    <input type="text" name="billing_district"
                                        value="{{ (old('billing_district') ? old('billing_district') : isset($customer)) ? $customer->address->billing_district : '' }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Shipping State</h5>
                                <div class="controls">
                                    <input type="text" name="shipping_state"
                                        value="{{ (old('shipping_state') ? old('shipping_state') : isset($customer)) ? $customer->address->shipping_state : '' }}"
                                        class="form-control" required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Billing State</h5>
                                <div class="controls">
                                    <input type="text" name="billing_state"
                                        value="{{ (old('billing_state') ? old('billing_state') : isset($customer)) ? $customer->address->billing_state : '' }}"
                                        class="form-control">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Shipping Pincode</h5>
                                <div class="controls">
                                    <input type="text" name="shipping_pin"
                                        value="{{ (old('shipping_pin') ? old('shipping_pin') : isset($customer)) ? $customer->address->shipping_pin : '' }}"
                                        class="form-control" required>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Billing Pincode</h5>
                                <div class="controls">
                                    <input type="text" name="billing_pin"
                                        value="{{ (old('billing_pin') ? old('billing_pin') : isset($customer)) ? $customer->address->billing_pin : '' }}"
                                        class="form-control">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Customer Profile Image</h5>
                                <div class="controls">
                                    <input type="file" id="image" name="profile_photo_path" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img class="" id="showImage" height="100"
                                src="{{ !empty($customer->profile_photo_path) ? url('uploads/customer_profile/' . $customer->profile_photo_path) : url('uploads/no-image.png') }}"
                                alt="User Avatar">
                        </div>
                        {{-- <div>
                            <input type="submit" value="Update" class="btn btn-rounded btn-primary mb-5">
                        </div> --}}

                    </div>
                    <div>
                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                            value="{{ isset($customer) ? 'Update' : 'Create' }}">
                    </div>
                </div>

                </form>

        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
