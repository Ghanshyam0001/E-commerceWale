@extends('admin-panel.layouts.app')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Products</h3>
        </div>


      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Products <small>List</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $k => $product)


                    <tr>
                      <th scope="row">{{ $k + 1 }}</th>
                      <td>{{$product->title}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->discount_price}}</td>
                      <td>{{ $product->category->name ?? 'N/A' }}</td>
                      <td>{{ $product->subCategory->name ?? 'N/A' }}</td>
                      <td><img src="{{asset('uploads/products/' . $product->image) }}" height="100" alt=""></td>
                      <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                      </td>
                      <td>
                        <form action="{{ route('products.delete', $product->id) }}" method="POST"
                          style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa fa-trash"></i>
                            
                          </button>
                        </form>
                      </td>

                    </tr>

                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>



      </div>
      <div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
    </div>
  </div>
  <!-- /page content -->

@endsection