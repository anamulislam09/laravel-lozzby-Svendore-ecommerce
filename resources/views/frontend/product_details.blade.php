@extends('layouts.app')

@section('content')
  {{-- main navbar start here  --}}
  @include('layouts.frontend_partial.main_nav')

  @php
    $rating5 = App\Models\Review::where('product_id', $singleProduct->id)
        ->where('rating', 5)
        ->count();
    $rating4 = App\Models\Review::where('product_id', $singleProduct->id)
        ->where('rating', 4)
        ->count();
    $rating3 = App\Models\Review::where('product_id', $singleProduct->id)
        ->where('rating', 3)
        ->count();
    $rating2 = App\Models\Review::where('product_id', $singleProduct->id)
        ->where('rating', 2)
        ->count();
    $rating1 = App\Models\Review::where('product_id', $singleProduct->id)
        ->where('rating', 1)
        ->count();
    
    // average rating
    $sum_rating = App\Models\Review::where('product_id', $singleProduct->id)->sum('rating');
    $count_rating = App\Models\Review::where('product_id', $singleProduct->id)->count('rating');
  @endphp

  <div class="single_product">
    <div class="container">
      <div class="row">
        @php
          $images = json_decode($singleProduct->images, true);
          $color = explode(',', $singleProduct->product_color);
          $size = explode(',', $singleProduct->product_size);
        @endphp
        <div class="col-lg-2 order-lg-1 order-2">
          <ul class="image_list">
            @foreach ($images as $image)
              <li data-image="{{ asset('files/product/' . $image) }}">
                <img src="{{ asset('files/product/' . $image) }}" alt />
              </li>
            @endforeach
          </ul>
        </div>

        <div class="col-lg-3 order-lg-2 order-1">
          <div class="image_selected">
            <img src="{{ asset($singleProduct->product_thumbnail) }}" alt="{{ $singleProduct->product_name }}" />
          </div>
        </div>



        <div class="col-lg-7 order-3">

          <div class="row">
            <div class="col-6 pr-5" style="border-right: 1px solid #d1d1d1; ">
              <div class="product_description">
                <div class="product_category">
                  {{ $singleProduct->category->category_name }}>{{ $singleProduct->subcategory->subcategory_name }}</div>
                <div class="product_name" style="font-size: 20px;">{{ $singleProduct->product_name }}</div>
                <div class="product_category"><span class="text-info">Brand: </span><a href="#"
                    style="color: #838080;">{{ $singleProduct->brand->brand_name }}</a></div>
                <div class="product_category"><span class="text-info">Stock: </span>{{ $singleProduct->stock_quantity }}
                </div>
                <div class="product_category"><span class="text-info">Unit: </span>{{ $singleProduct->product_unit }}
                </div>
                <div class="rating_r rating_r_4 product_rating">
                  @if ($sum_rating == null)
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span> (0)</span>
                  @elseif ($sum_rating != null)
                    @if ($sum_rating / $count_rating == 5 || $sum_rating / $count_rating >= 4.5)
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <a href="#review" class="pl-2">{{ $sum_rating / $count_rating }} Ratings</a>
                    @elseif ($sum_rating / $count_rating < 4.5 && $sum_rating / $count_rating >= 3.5)
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <a href="#review" class="pl-2">{{ $sum_rating / $count_rating }} Ratings</a>
                    @elseif ($sum_rating / $count_rating < 3.5 && $sum_rating / $count_rating >= 2.5)
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star "></span>
                      <span class="fa fa-star"></span>
                      <a href="#review" class="pl-2">{{ floatval($sum_rating / $count_rating )}} Ratings</a>
                    @elseif ($sum_rating / $count_rating < 2.5 && $sum_rating / $count_rating >= 1.5)
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star "></span>
                      <span class="fa fa-star "></span>
                      <span class="fa fa-star"></span>
                      <a href="#review" class="pl-2">{{ $sum_rating / $count_rating }} Ratings</a>
                    @else
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star "></span>
                      <span class="fa fa-star "></span>
                      <span class="fa fa-star "></span>
                      <span class="fa fa-star"></span>
                      <a href="#review" class="pl-2">{{ $sum_rating / $count_rating }} Ratings</a>
                    @endif
                  @endif
                </div>
                {{-- <div class="product_text"> 
                  <p>
                    Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Maecenas fermentum.
                    laoreet turpis, nec sollicitudin dolor
                    cursus at. Maecenas aliquet, dolor a
                    faucibus efficitur, nisi tellus cursus
                    urna, eget dictum lacus turpis.
                  </p>
                </div> --}}
                <div class="order_info d-flex flex-row">
                  <form action="#">
                    <div class="clearfix" style="z-index: 1000">
                      <div class="form-group">
                        <div class="row">
                          @isset($singleProduct->product_size)
                            <div class="col-6">
                              <label for="">Size:</label>
                              <select name="size" class="form-control form-control-sm" style="min-width:120px;"
                                id="">
                                <option value="" selected disabled>Select Size</option>
                                @foreach ($size as $row)
                                  <option value="">{{ $row }}</option>
                                @endforeach
                              </select>
                            </div>
                          @endisset
                          @isset($singleProduct->product_color)
                            <div class="col-6">
                              <label for="">Color:</label>
                              <select name="color" class="form-control form-control-sm" style="min-width:120px;"
                                id="">
                                <option value="" selected disabled>Select color</option>
                                @foreach ($color as $row)
                                  <option value="">{{ $row }}</option>
                                @endforeach
                              </select>
                            </div>
                          @endisset
                        </div>
                      </div>
                      <div class="product_quantity clearfix">
                        <span>Quantity: </span>
                        <input id="quantity_input" type="text" pattern="[1-9]*" value="1" />
                        <div class="quantity_buttons">
                          <div id="quantity_inc_button" class="quantity_inc quantity_control">
                            <i class="fas fa-chevron-up"></i>
                          </div>
                          <div id="quantity_dec_button" class="quantity_dec quantity_control">
                            <i class="fas fa-chevron-down"></i>
                          </div>
                        </div>
                      </div>

                      {{-- <ul class="product_color">
                        <li>
                          <span>Color: </span>
                          <div class="color_mark_container">
                            <div id="selected_color" class="color_mark"></div>
                          </div>
                          <div class="color_dropdown_button">
                            <i class="fas fa-chevron-down"></i>
                          </div>
                          <ul class="color_list">
                            <li>
                              <div class="color_mark" style="background: #999999;">
                              </div>
                            </li>
                            <li>
                              <div class="color_mark" style="background: #b19c83; ">
                              </div>
                            </li>
                            <li>
                              <div class="color_mark" style=" background: #000000; ">
                              </div>
                            </li>
                          </ul>
                        </li>
                      </ul> --}}
                    </div>
                    {{-- <div class="product_price">{{ $setting->currency }}{{ $singleProduct->selling_price }}</div> --}}
                    @if ($singleProduct->descount_price == null)
                      <div class="product_price">{{ $setting->currency }}{{ $singleProduct->selling_price }}</div>
                    @else
                      <div class="product_price"><del class="text-danger pr-3"
                          style="font-size: 20px">{{ $setting->currency }}{{ $singleProduct->selling_price }}</del>{{ $setting->currency }}{{ $singleProduct->descount_price }}
                      </div>
                    @endif

                    <div class="button_container">
                      <button type="button" class="button cart_button">
                        Add to Cart
                      </button>
                      <div class="product_fav">
                        <i class="fas fa-heart"></i>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 pl-4">
              <p>Pickup point of this product</p>
              <strong>{{ $singleProduct->pickuppoint->pickup_point_name }}</strong>

              <br>
              <hr><br>
              @isset($singleProduct->product_video)
                <strong>Product Video : </strong>
                <iframe width="300" height="200"
                  src="https://www.youtube.com/embed{{ $singleProduct->product_video }}" frameborder="0"
                  title="Youtube video player" allow="accelerometer; autoplay;"></iframe>
              @endisset
            </div>
          </div>

        </div>



      </div>

      <div class="card mt-5">
        <div class="card-header">
          <div class="product_name pl-3" style="font-size: 20px;">Product details of
            {{ $singleProduct->product_name }}.
          </div>
        </div>
        <div class="card-body">
          <p>{{ $singleProduct->product_description }}</p>
        </div>
      </div>

      <div class="card mt-5" id="review">
        <div class="card-header">
          <div class="product_name pl-3" style="font-size: 20px;">Rating & Reviews of
            {{ $singleProduct->product_name }}.

          </div>
        </div>
        <div class="card-body row">
          <div class="col-3">
            {{-- Average rating for this product   --}}
            <p>Average Reviews of {{ $singleProduct->product_name }}.</p>
            <div class="rating_r rating_r_4 product_rating">
              @if ($sum_rating == null)
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span> (0)</span>
              @elseif ($sum_rating != null)
                @if ($sum_rating / $count_rating == 5 || $sum_rating / $count_rating >= 4.5)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="pl-2">{{ $sum_rating / $count_rating }} Ratings</span>
                @elseif ($sum_rating / $count_rating < 4.5 && $sum_rating / $count_rating >= 3.5)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="pl-2">{{ $sum_rating / $count_rating }} Ratings</span>
                @elseif ($sum_rating / $count_rating < 3.5 && $sum_rating / $count_rating >= 2.5)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star "></span>
                  <span class="fa fa-star"></span>
                  <span class="pl-2">{{ $sum_rating / $count_rating }} Ratings</span>
                @elseif ($sum_rating / $count_rating < 2.5 && $sum_rating / $count_rating >= 1.5)
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star "></span>
                  <span class="fa fa-star "></span>
                  <span class="fa fa-star"></span>
                  <span class="pl-2">{{ $sum_rating / $count_rating }} Ratings</span>
                @else
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star "></span>
                  <span class="fa fa-star "></span>
                  <span class="fa fa-star "></span>
                  <span class="fa fa-star"></span>
                  <span class="pl-2">{{ $sum_rating / $count_rating }} Ratings</span>
                @endif
              @endif
            </div>
          </div>
          <div class="col-3">
            <p>Total review of this product</p>
            {{-- All review   --}}

            <div class="rating_r rating_r_4 product_rating">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="pl-2">total {{ $rating5 }}</span>
            </div>
            <div class="rating_r rating_r_4 product_rating">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="pl-2">total {{ $rating4 }}</span>
            </div>
            <div class="rating_r rating_r_4 product_rating">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star "></span>
              <span class="fa fa-star"></span>
              <span class="pl-2">total {{ $rating3 }}</span>
            </div>
            <div class="rating_r rating_r_4 product_rating">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star "></span>
              <span class="fa fa-star "></span>
              <span class="fa fa-star"></span>
              <span class="pl-2">total {{ $rating2 }}</span>
            </div>
            <div class="rating_r rating_r_4 product_rating">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star "></span>
              <span class="fa fa-star "></span>
              <span class="fa fa-star "></span>
              <span class="fa fa-star"></span>
              <span class="pl-2">total {{ $rating1 }}</span>
            </div>


          </div>
          <div class="col-6">
            <form action="{{ route('store.review') }}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{ $singleProduct->id }}">
              <div class="form-group">
                <label for=""> Write your review</label>
                <textarea class="form-control" name="review" id=""></textarea>
              </div>
              <div class="form-group">
                <label for="">Write your review</label>
                <select name="rating" class="custom-select" id="" style="min-width:170px;">
                  <option value="" selected disabled>Select your review</option>
                  <option value="1">1 star</option>
                  <option value="2">2 star</option>
                  <option value="3">3 star</option>
                  <option value="4">4 star</option>
                  <option value="5">5 star</option>
                </select>
              </div>
              @if (Auth::check())
                <button type="submit" class="btn btn-sm btn-info"><span class="fa fa-star">submit
                    review</span></button>
              @else
                <p>please login first to your account for submit a review</p>
              @endif
            </form>
          </div>

        </div>
        <br><br>
        {{-- All reviews of this product --}}
        <strong class="pl-4">All review of {{ $singleProduct->product_name }}</strong><br>
        <div class="row">
          @foreach ($review as $row)
            <div class="card col-lg-11 col-md-11 col-sm-11 ml-3 my-2">
              <div class="card-header" style="display: flex; justify-content:space-between;">
                <strong>{{ $row->user->name }}</strong>
                <span style="font-size: 12px"> ({{ date('d F , Y'), strtotime($row->review_date) }})</span>
              </div>
              <div class="card-body">
                {{ $row->review }}
                @if ($row->rating == 5)
                  <div class="rating_r rating_r_4 product_rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    {{-- <span class="pl-2">total 00</span> --}}
                  </div>
                @elseif ($row->rating == 4)
                  <div class="rating_r rating_r_4 product_rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                  </div>
                @elseif ($row->rating == 3)
                  <div class="rating_r rating_r_4 product_rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                  </div>
                @elseif ($row->rating == 2)
                  <div class="rating_r rating_r_4 product_rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                  </div>
                @elseif ($row->rating == 1)
                  <div class="rating_r rating_r_4 product_rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="viewed">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="viewed_title_container">
            <h3 class="viewed_title">Related product </h3>
            <div class="viewed_nav_container">
              <div class="viewed_nav viewed_prev">
                <i class="fas fa-chevron-left"></i>
              </div>
              <div class="viewed_nav viewed_next">
                <i class="fas fa-chevron-right"></i>
              </div>
            </div>
          </div>
          <div class="viewed_slider_container">
            <div class="owl-carousel owl-theme viewed_slider">
              @foreach ($reletedProduct as $item)
                <div class="owl-item">
                  <div
                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="viewed_image">
                      <img src="{{ asset($item->product_thumbnail) }}" alt="{{ $item->product_name }}" />
                    </div>
                    <div class="viewed_content text-center">
                      <div class="viewed_price">
                        @if ($item->descount_price == null)
                          <div class="viewed_price">{{ $setting->currency }}{{ $item->selling_price }}</div>
                        @else
                          <div class="viewed_price"><del class="pr-3"
                              style="font-size: 12px; color:#838080;">{{ $setting->currency }}{{ $item->selling_price }}</del>{{ $setting->currency }}{{ $item->descount_price }}
                          </div>
                        @endif
                      </div>
                      <div class="viewed_name">
                        <a
                          href="{{ route('product.product_details', $item->product_slug) }}">{{ substr($item->product_name, 0, 50) }}</a>
                      </div>
                    </div>
                    <ul class="item_marks">
                      <li class="item_mark item_discount">
                        New
                      </li>

                    </ul>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="brands">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="brands_slider_container">
            <div class="owl-carousel owl-theme brands_slider">
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_1.jpg') }}"alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_2.jpg') }}" alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_3.jpg') }}" alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_4.jpg') }}" alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_5.jpg') }}" alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_6.jpg') }}" alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_7.jpg') }}" alt />
                </div>
              </div>
              <div class="owl-item">
                <div class="brands_item d-flex flex-column justify-content-center">
                  <img src="{{ asset('frontend/images/brands_8.jpg') }}" alt />
                </div>
              </div>
            </div>

            <div class="brands_nav brands_prev">
              <i class="fas fa-chevron-left"></i>
            </div>
            <div class="brands_nav brands_next">
              <i class="fas fa-chevron-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col">
          <div
            class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
            <div class="newsletter_title_container">
              <div class="newsletter_icon">
                <img src="images/send.png" alt />
              </div>
              <div class="newsletter_title">
                Sign up for Newsletter
              </div>
              <div class="newsletter_text">
                <p>
                  ...and receive %20 coupon for first
                  shopping.
                </p>
              </div>
            </div>
            <div class="newsletter_content clearfix">
              <form action="#" class="newsletter_form">
                <input type="email" class="newsletter_input" required="required"
                  placeholder="Enter your email address" />
                <button class="newsletter_button">
                  Subscribe
                </button>
              </form>
              <div class="newsletter_unsubscribe_link">
                <a href="#">unsubscribe</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
