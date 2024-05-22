@extends('layouts.interface')
@section('section')

<body>
       <!--================Home Banner Area =================-->
  <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            <p class="sub text-uppercase">men Collection</p>
            <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
            <h4>Fowl saw dry which a above together place.</h4>
            <a class="main_btn mt-40" href="#">View Collection</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->
 <!-- Start feature Area -->
 <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Money back gurantee</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Free Delivery</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Alway support</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Secure payment</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

<!--================ Feature Product Area =================-->
<section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Featured product</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">    
      @foreach($produits as $produit)
        <div class="col-lg-4 col-md-6">
        <div class="single-product">
          <a href="{{ route('shop.show', ['id' => $produit->id]) }}">
            <div class="product-img">
                <img src="{{ asset('storage/' . $produit->image) }}" class="img-fluid w-100" alt=""> 
                <div class="p_icon"> 
                    <form action="{{ route('cart.add') }}" method="POST">
                             @csrf
                            <input type="hidden" name="product_id" value="{{ $produit->id }}">
                            <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                            <i class="ti-shopping-cart"></i>
                            </button>
                        </form>
                </div>
            </div>
                <div class="product-btm">
                    <a href="#" class="d-block">
                        <h4>{{ $produit->designation }}</h4>
                        <p>{{ substr($produit->description, 0, 38) }}...</p>
                    </a>
                    <div class="mt-3">
                        <span class="mr-4">{{ $produit->prix_ht }}.00 DH / kg</span>
                        <!-- <del>$35.00</del> -->
                    </div>
                </div>
          </div>     
        </div>
        @endforeach
      </div>
     
  </section>
  <!--================ End Feature Product Area =================-->

  @endsection