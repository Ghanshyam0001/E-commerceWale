@extends('admin-panel.layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3>Product</h3></div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product <small>Edit</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="control-label col-md-3" for="title">Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $product->title) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="price">Price</label>
                                <div class="col-md-6">
                                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="discount_price">Discount Price</label>
                                <div class="col-md-6">
                                    <input type="text" id="discount_price" name="discount_price" class="form-control" value="{{ old('discount_price', $product->discount_price) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="description">Description</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="category_id">Select Category</label>
                                <div class="col-md-6">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($Categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="sub_category_id">Select Sub Category</label>
                                <div class="col-md-6">
                                    <select name="sub_category_id" class="form-control">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($Sub_Categories as $sub_cat)
                                        <option value="{{ $sub_cat->id }}" data-category_id="{{ $sub_cat->category_id }}" 
                                            class="sub_cat_options"
                                            style="{{ $sub_cat->category_id == $product->category_id ? '' : 'display:none' }}"
                                            {{ $sub_cat->id == $product->sub_category_id ? 'selected' : '' }}>
                                            {{ $sub_cat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="image">Image</label>
                                <div class="col-md-6">
                                    <input type="file" id="image" name="image" class="form-control">
                                    @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" height="100" alt="Product Image" style="margin-top:10px;">
                                    @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ route('products.list') }}" class="btn btn-primary">Cancel</a>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
$('select[name=category_id]').change(function () {
    var category_id = $(this).val();
    $('.sub_cat_options').hide();
    $('.sub_cat_options[data-category_id=' + category_id + ']').show();
});
</script>
@endpush
