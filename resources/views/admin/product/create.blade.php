@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

        <!-- Main content -->

        <section class="content">

            @if (isset($product))
                <form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}">
                    @method('PATCH')

                @else
                    <form method="POST" action="{{ route('product.store') }}">

            @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h5>Name of Product <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name"
                                value="{{ (old('name') ? old('name') : isset($product)) ? $product->name : '' }}"
                                class="form-control" required>
                            <div class="help-block"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Price of product <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="price" class="form-control"
                                        value="{{ old('price') ? old('price') : (isset($product) ? $product->price : '') }}"
                                        required>
                                    <div class=" help-block">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sale Price of product <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="sale_price" class="form-control"
                                        value="{{ old('sale_price') ? old('sale_price') : (isset($product) ? ($product->sale_price ? $product->sale_price : '') : '') }}""
                                                                                                                required>
                                                                                                            <div class="
                                        help-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Multiple</label>

                            <select class="form-control select2 " name="categories[]" multiple="multiple"
                                data-placeholder="Select a State" style="width: 100%;">

                                @foreach ($categories as $item)
                                    @if ($product && in_array($item->id, $selected_categories))
                                        <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Description of you product<br>
                            <small>Please Specify Long description of your product</small>
                        </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <textarea id="long_description" name="long_description" rows="10" cols="80">
                                                                                                                        {{ old('long_description') ? old('long_description') : (isset($product) ? ($product->long_description ? $product->long_description : '') : '') }}
                                                                                                                                                        </textarea>
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Highlights<br>
                            <small>Specify Short description of your product</small>
                        </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <textarea name="short_description" id="short_description" class="textarea"
                            placeholder="Short Description of your product"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                                                                        {{ old('short_description') ? old('short_description') : (isset($product) ? ($product->short_description ? $product->short_description : '') : '') }}
                                                                                                                    </textarea>
                    </div>
                </div>
            </div>

            <div>
                <input type="submit" class="btn btn-rounded btn-primary mb-5"
                    value="{{ isset($product) ? 'Update' : 'Create' }}">
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
