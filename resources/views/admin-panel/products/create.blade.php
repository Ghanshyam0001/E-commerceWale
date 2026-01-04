@extends('admin-panel.layouts.app')
@section('content')

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Product</h3>
        </div>


      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Product <small>Create</small></h2>

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
              <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST" id="demo-form2"
                data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Title<span
                      class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price<span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="price" name="price" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount_price">Discount Price<span
                      class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="discount_price" name="discount_price" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span
                      class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="description" cols="30" rows="10" id="description" class="form-control"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Select Category">Select Category<span
                      class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="category_id" class="form-control">
                      <option value="">Select Category</option>
                      @foreach ($Categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Select Sub Category">Select Sub
                    Category<span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="sub_category_id" class="form-control">
                      <option value="">Select Sub Category</option>
                      @foreach ($Sub_Categories as $sub_cat)
                        <option value="{{ $sub_cat->id }}" class="sub_cat_options"
                          data-category_id="{{$sub_cat->category_id}}" style="display: none">{{ $sub_cat->name }}</option>

                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image<span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{ route('products.list') }}" class="btn btn-primary">Cancel</a>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </form>
             

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <!-- /page content -->


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