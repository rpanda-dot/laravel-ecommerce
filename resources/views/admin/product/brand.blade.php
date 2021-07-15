@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <h4 class="box-title">Add New Brand</h4>
                            <div>
                                <form method="POST" enctype="multipart/form-data" action="{{ route('brand.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Brand Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required
                                                data-validation-required-message="This field is required">
                                        </div>
                                        <div class="row mt-5">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Brand Image</h5>
                                                    <div class="controls">
                                                        <input type="file" id="brand_image" name="brand_image"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <img class="" style="display: none" id="showBrandImage" height="100"
                                                    alt="User Avatar">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="submit">
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <h4 class="box-title">Brands List</h4>
                            <div>
                                <div class="table-responsive">
                                    <table id="brands-table" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_brands as $brand)
                                                <tr>
                                                    <td>{{ $brand->id }}</td>
                                                    <td>{{ $brand->name }}</td>
                                                    <td><img height="100" src="{{ url('uploads/brand_logo/' . $brand->brand_image) }}"
                                                            alt="{{ $brand->name }}"></td>
                                                    <td>


                                                        <a data-id="{{ $brand->id }}"
                                                            data-csrf_token="{{ csrf_token() }}"
                                                            class="waves-effect waves-light btn btn-info btn-circle mx-5 delete-brand">
                                                            <span class="mdi mdi-delete"></span>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->

        </section>
        {{-- {{ print_r($all_categories) }} --}}
        <!-- /.content -->
    </div>
@endsection
