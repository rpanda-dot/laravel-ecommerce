@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Orders List</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="list-table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Price</th>
                                    <th>Products</th>
                                    <th>Date</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->products }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>yesterday</td>

                                        <td>
                                            <a href="{{ route('customer.edit', ['customer' => $order->id]) }}"
                                                class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-table-edit"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-eye-outline"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-content-duplicate"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                    class="mdi mdi-archive"></span></a>

                                            <a data-id="{{ $order->id }}" data-csrf_token="{{ csrf_token() }}"
                                                class="waves-effect waves-light btn btn-info btn-circle mx-5 delete-customer"><span
                                                    class="mdi mdi-delete"></span></a>

                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Price</th>
                                    <th>Products</th>
                                    <th>Date</th>
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
