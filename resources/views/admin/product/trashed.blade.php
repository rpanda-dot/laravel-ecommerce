@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Deleted Products List</h3>
                    @if (count($products))
                        <a class="btn btn-outline btn-secondary mb-5" onclick="return confirm('Are you sure?')"
                            href="{{ route('product.empty_trashed') }}">Empty
                            Trash</a>
                    @endif

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="trashed-product-list"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>SKU</th>
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
                                            <a href="{{ route('product.restore', ['product' => $product->id]) }}"
                                                onclick="return confirm('Are you sure?')"
                                                class="waves-effect waves-light btn btn-info btn-circle mx-5">
                                                <span class="mdi mdi-restore">
                                                </span>
                                            </a>
                                            <a href="{{ route('product.permanenet_delete', ['product' => $product->id]) }}"
                                                onclick="return confirm('Are you sure?')"
                                                class="waves-effect waves-light btn btn-info btn-circle mx-5">
                                                <span class="mdi mdi-delete">
                                                </span>
                                            </a>
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
