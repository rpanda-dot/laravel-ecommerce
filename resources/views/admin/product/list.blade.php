@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Products List</h3>
                    @if ($trashed_count)
                        <a class="btn btn-outline btn-secondary mb-5 ml-5" href="{{ route('product.trashed') }}">Trashed
                            Products</a>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="list-table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
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
                                            <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                                class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-table-edit"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-eye-outline"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-content-duplicate"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-archive"></span></a>

                                            <a data-id="{{ $product->id }}" data-csrf_token="{{ csrf_token() }}"
                                                class="waves-effect waves-light btn btn-info btn-circle mx-5 delete-product"><span
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
@endsection
