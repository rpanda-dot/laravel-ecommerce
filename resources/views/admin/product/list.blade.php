@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Hover Export Data Table</h3>
                    <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>SKU</th>
                                    <th>Stock</th>
                                    <th>Publish Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->sale_price ? $product->sale_price : $product->price }}</td>
                                        <td>{{ $product->stock ? $product->stock : '-' }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-success">In Stock</span>
                                        </td>

                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-table-edit"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-eye-outline"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-content-duplicate"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-archive"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-delete"></span></a>

                                        </td>
                                    </tr>

                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>SKU</th>
                                    <th>Stock</th>
                                    <th>Publish Date</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

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
