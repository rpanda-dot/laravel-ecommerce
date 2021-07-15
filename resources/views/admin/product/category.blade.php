@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <h4 class="box-title">Add New Category</h4>
                            <div>
                                <form method="POST" action="{{ route('category.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required
                                                data-validation-required-message="This field is required">
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
                            <h4 class="box-title">Category List</h4>
                            <div>
                                <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>


                                                        <a data-id="{{ $category->id }}"
                                                            data-csrf_token="{{ csrf_token() }}"
                                                            class="waves-effect waves-light btn btn-info btn-circle mx-5 delete-category">
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
