@extends('layouts.app')

@section('content')


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders') }}">orders</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">All Products</h1>
            <br>
            <br>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                         
                        </div>

                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">

                                            @foreach ($categories as $cat)
                                                <li data-cat_id="{{ $cat->id }}" class="category_li">
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="javascript:void(0);"><i
                                                                class="fas fa-apple-alt me-2"></i>{{$cat->name}}</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="100000" value="0" oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Sub Category</h4>

                                        @foreach ($subcategories as $sub_cat)
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="sub-category-{{ $sub_cat->id }}"
                                                    name="sub_category" value="{{ $sub_cat->id }}">

                                                <label for="sub-category-{{ $sub_cat->id }}">
                                                    {{ $sub_cat->name }}
                                                </label>
                                            </div>
                                        @endforeach



                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="img/banner3.jpg" class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Attractive <br> <br>December <br><br>Offer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">

                            <div id="loder" style="display: none">
                                <img src="{{ asset('img/loder.gif') }}" alt="">
                            </div>
                            <div class="row g-4 justify-content-center shop-products">

                                @include('shop_product')
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection

@push('scripts')
    <script>
        $(document).on('click', 'input[name=sub_category]', function () {
            var sub_cat_id = $(this).val();
            var data = { sub_cat_id: sub_cat_id };
            getProducts(data);

        });

        $(document).on('click', '.category_li', function () {
            var cat_id = $(this).data('cat_id');
            var data = { cat_id: cat_id };
            getProducts(data);


        });
        $(document).on('change', 'input[name=rangeInput]', function () {
            var range = $(this).val();
            var data = { range: range };
            getProducts(data);

        });

        function getProducts(data) {
            $(document).find('#loder').show();
            $('.shop-products').html('');

            $.ajax({
                url: "{{ url()->current() }}",
                type: 'GET',
                data: data,
                success: function (response) {
                    $(document).find('#loder').hide();

                    $('.shop-products').html(response);

                },
                error: function (error) {
                    console.log(error);
                }
            });

        }
    </script>

@endpush