@extends('front.layout.master')

@section('title', 'Product')

@section('body')
    <!-- Breadcrumb (định vị vị trí ở web) -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home">Trang Chủ</i></a>
                        <a href="/shop">Cửa hàng</a>
                        <span class="shop">Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Breadcrumb (định vị vị trí ở web) -->

    <!-- Products shop section -->
    <div class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    @include('front.shop.components.products-sidebar-filter')

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- image big -->
                            <div class="product-pic-zoom">
                                <img class="product-big-img"
                                     src="front/img/products/{{$product->CoffeeImages[0]->path ?? ''}}"
                                     alt="product-1">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <!-- image small -->
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">

                                    @foreach($product->CoffeeImages as $productImage)
                                        <div class="pt active"
                                             data-imgbigurl="front/img/products/{{$productImage->path ?? ''}}">
                                            <img src="front/img/products/{{$productImage->path ?? ''}}" alt="">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <!-- title -->
                                <div class="pd-title">
                                    <span>{{$product->CoffeeCategory->name}}</span>
                                    <h3>{{$product->name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <!-- moo ta -->
                                <div class="pd-desc">
                                    <p>
                                        {{$product->content}}
                                    </p>
                                    @if($product->discount != null)
                                        <h4>{{$product->discount}} 000₫<span>{{$product->price}} 000₫</span></h4>
                                    @else
                                        <h4>{{$product->price}} 000₫ </h4>
                                    @endif
                                </div>
                                <!-- button buy -->
                                <div class="quantity">
                                    <div class="quantity">
                                        <div class="pro-qty show-page">
                                            <input class="qty-product" type="text" value="1">
                                        </div>
                                        <button onclick="addCart({{$product->id}}, $(this).parent().find('input').val())" class="primary-btn pd-cart">Thêm giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <h1 class="container css-description">{!! $product->description !!}</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--ENd Products shop section -->

    <!-- Related Products -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)

                    <div class="col-lg-3 col-sm-6">
                        @include('front.components.product-item', ['product' => $relatedProduct])
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    <!-- END Related Products -->
@endsection
