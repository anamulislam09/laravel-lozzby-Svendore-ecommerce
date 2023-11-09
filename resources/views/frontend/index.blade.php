@extends('layouts.app')

@section('navbar')
  {{-- main navbar start here  --}}
  @include('layouts.frontend_partial.main_nav')
  {{-- main navbar ends here  --}}
@endsection

@section('content')
  <div class="banner">
    <div class="banner_background" style="background-image:url({{ asset('frontend/images/banner_background.jpg') }})"></div>
    <div class="container fill_height">
      <div class="row fill_height">
        <div class="banner_product_image"><img src="{{ $bannerproduct->product_thumbnail }}"
            alt="{{ $bannerproduct->product_name }}" style="width: 500px"></div>
        <div class="col-lg-5 offset-lg-4 fill_height">
          <div class="banner_content">
            <h1 class="banner_text">{{ $bannerproduct->product_name }}</h1>
            @if ($bannerproduct->descount_price == null)
              <div class="banner_price">{{ $setting->currency }}{{ $bannerproduct->selling_price }}</div>
            @else
              <div class="banner_price">
                <span>{{ $setting->currency }}{{ $bannerproduct->selling_price }}</span>{{ $setting->currency }}{{ $bannerproduct->descount_price }}
              </div>
            @endif
            <div class="banner_product_name">{{ $bannerproduct->brand->brand_name }}</div>
            <div class="button banner_button"><a
                href="{{ route('product.product_details', $bannerproduct->product_slug) }}">Shop Now</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="characteristics">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 char_col">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt></div>
            <div class="char_content">
              <div class="char_title">Free Delivery</div>
              <div class="char_subtitle">from $50</div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 char_col">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt></div>
            <div class="char_content">
              <div class="char_title">Free Delivery</div>
              <div class="char_subtitle">from $50</div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 char_col">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt></div>
            <div class="char_content">
              <div class="char_title">Free Delivery</div>
              <div class="char_subtitle">from $50</div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 char_col">
          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt></div>
            <div class="char_content">
              <div class="char_title">Free Delivery</div>
              <div class="char_subtitle">from $50</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="deals_featured">
    <div class="container">
      <div class="row">
        <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

          <div class="deals col-md-4">
            <div class="deals_title">Deals of the Week</div>
            <div class="deals_slider_container">

              <div class="owl-carousel owl-theme deals_slider">

                <div class="owl-item deals_item">
                  <div class="deals_image"><img src="{{ asset('frontend/images/deals.png') }}" alt></div>
                  <div class="deals_content">
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_category"><a href="#">Headphones</a></div>
                      <div class="deals_item_price_a ml-auto">$300</div>
                    </div>
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_name">Beoplay H7</div>
                      <div class="deals_item_price ml-auto">$225</div>
                    </div>
                    <div class="available">
                      <div class="available_line d-flex flex-row justify-content-start">
                        <div class="available_title">Available: <span>6</span></div>
                        <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                      </div>
                      <div class="available_bar"><span style="width:17%"></span></div>
                    </div>
                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                      <div class="deals_timer_title_container">
                        <div class="deals_timer_title">Hurry Up</div>
                        <div class="deals_timer_subtitle">Offer ends in:</div>
                      </div>
                      <div class="deals_timer_content ml-auto">
                        <div class="deals_timer_box clearfix" data-target-time>
                          <div class="deals_timer_unit">
                            <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                            <span>hours</span>
                          </div>
                          <div class="deals_timer_unit">
                            <div id="deals_timer1_min" class="deals_timer_min"></div>
                            <span>mins</span>
                          </div>
                          <div class="deals_timer_unit">
                            <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                            <span>secs</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="owl-item deals_item">
                  <div class="deals_image"><img src="{{ asset('frontend/images/deals.png') }}" alt></div>
                  <div class="deals_content">
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_category"><a href="#">Headphones</a></div>
                      <div class="deals_item_price_a ml-auto">$300</div>
                    </div>
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_name">Beoplay H7</div>
                      <div class="deals_item_price ml-auto">$225</div>
                    </div>
                    <div class="available">
                      <div class="available_line d-flex flex-row justify-content-start">
                        <div class="available_title">Available: <span>6</span></div>
                        <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                      </div>
                      <div class="available_bar"><span style="width:17%"></span></div>
                    </div>
                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                      <div class="deals_timer_title_container">
                        <div class="deals_timer_title">Hurry Up</div>
                        <div class="deals_timer_subtitle">Offer ends in:</div>
                      </div>
                      <div class="deals_timer_content ml-auto">
                        <div class="deals_timer_box clearfix" data-target-time>
                          <div class="deals_timer_unit">
                            <div id="deals_timer2_hr" class="deals_timer_hr"></div>
                            <span>hours</span>
                          </div>
                          <div class="deals_timer_unit">
                            <div id="deals_timer2_min" class="deals_timer_min"></div>
                            <span>mins</span>
                          </div>
                          <div class="deals_timer_unit">
                            <div id="deals_timer2_sec" class="deals_timer_sec"></div>
                            <span>secs</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="owl-item deals_item">
                  <div class="deals_image"><img src="{{ asset('frontend/images/deals.png') }}" alt></div>
                  <div class="deals_content">
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_category"><a href="#">Headphones</a></div>
                      <div class="deals_item_price_a ml-auto">$300</div>
                    </div>
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_name">Beoplay H7</div>
                      <div class="deals_item_price ml-auto">$225</div>
                    </div>
                    <div class="available">
                      <div class="available_line d-flex flex-row justify-content-start">
                        <div class="available_title">Available: <span>6</span></div>
                        <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                      </div>
                      <div class="available_bar"><span style="width:17%"></span></div>
                    </div>
                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                      <div class="deals_timer_title_container">
                        <div class="deals_timer_title">Hurry Up</div>
                        <div class="deals_timer_subtitle">Offer ends in:</div>
                      </div>
                      <div class="deals_timer_content ml-auto">
                        <div class="deals_timer_box clearfix" data-target-time>
                          <div class="deals_timer_unit">
                            <div id="deals_timer3_hr" class="deals_timer_hr"></div>
                            <span>hours</span>
                          </div>
                          <div class="deals_timer_unit">
                            <div id="deals_timer3_min" class="deals_timer_min"></div>
                            <span>mins</span>
                          </div>
                          <div class="deals_timer_unit">
                            <div id="deals_timer3_sec" class="deals_timer_sec"></div>
                            <span>secs</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="deals_slider_nav_container">
              <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
              <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
            </div>
          </div>

          {{-- Featured product start here --}}
          <div class="featured col-md-8">
            <div class="tabbed_container">
              <div class="tabs ">
                <ul class="clearfix">
                  <li class="active">Featured Products</li>
                </ul>
              </div>
              <hr class="pb-2">
              <div class="row">
                @foreach ($featured as $fItem)
                  <div class="f_product col-md-3">
                    {{-- <div class="product_item"> --}}

                    <div class="product_image "><img src="{{ $fItem->product_thumbnail }}" alt></div>
                    <div class="product_content">
                      <div class="product_price discount">
                        @if ($fItem->descount_price == null)
                          {{ $setting->currency }}{{ $fItem->selling_price }}
                        @else
                          <span>{{ $setting->currency }}{{ $fItem->selling_price }}</span>{{ $setting->currency }}{{ $fItem->descount_price }}
                        @endif
                      </div>
                      <div class="product_name">
                        <a
                          href="{{ route('product.product_details', $fItem->product_slug) }}">{{ substr($fItem->product_name, 0, 20) }}...</a>
                      </div>
                    </div>
                    {{-- <form action="{{ route('addToCart') }}" method="POST" id="add_cart_form{{$fItem->id}}">
                      @csrf
                      <input type="hidden" name="id" value="{{ $fItem->id }}">

                      @if ($fItem->descount_price == null)
                        <input type="hidden" name="price" value="{{ $fItem->selling_price }}">
                      @else
                        <input type="hidden" name="price" value="{{ $fItem->descount_price }}">
                      @endif --}}

                      @if ($fItem->stock_quantity < 1)
                        
                        <a href="" class="btn btn-sm btn-danger" disabled>Stock out</a>
                      @else
                        <a href="{{ route('addToCart') }}"   data-button-form="true" 
                          data-method="post" 
                          data-token="{{ csrf_token() }}" 
                          data-no-confirm="true" 
                          data-id="{{ $fItem->id }}" id="add_cart_form" class="btn btn-sm btn-primary"  type="submit">Add to Cart <span
                            class="loading d-none">...</span></a>
                      @endif

                      <a href="#" class="quick_view" id="{{ $fItem->id }}" data-toggle="modal"
                        data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a href="{{ route('add.wishlist', $fItem->id) }}" class="product_fav"><i
                          class="fas fa-heart"></i></a>
                    {{-- </form> --}}
                    {{-- </div> --}}
                  </div>
                @endforeach
              </div>
              {{-- Featured product ends here --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Most Popular product start here --}}

  <div class="container py-5">
    <div>
      <div class="tabs ">
        <ul class="clearfix">
          <li class="active">Most Popular Products</li>
        </ul>
      </div>
      <hr class="pb-2">
      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        @foreach ($popular as $row)
          <div class="f_product col-lg-2 col-md-3 col-sm-6">

            <div class="product_image "><img src="{{ $row->product_thumbnail }}" alt></div>
            <div class="product_content">
              <div class="product_price discount">
                @if ($row->descount_price == null)
                  {{ $setting->currency }}{{ $row->selling_price }}
                @else
                  <span>{{ $setting->currency }}{{ $row->selling_price }}</span>{{ $setting->currency }}{{ $row->descount_price }}
                @endif
              </div>
              <div class="product_name">
                <a
                  href="{{ route('product.product_details', $row->product_slug) }}">{{ substr($row->product_name, 0, 20) }}...</a>
              </div>
            </div>
            <form action="{{ route('addToCart') }}" method="POST" id="add_cart_form">
              @csrf
              <input type="hidden" name="id" value="{{ $row->id }}">

              @if ($row->descount_price == null)
                <input type="hidden" name="price" value="{{ $row->selling_price }}">
              @else
                <input type="hidden" name="price" value="{{ $row->descount_price }}">
              @endif

              @if ($row->stock_quantity < 1)
                <button class="btn btn-sm btn-danger" disabled>Stock out</button>
              @else
                <button class="btn btn-sm btn-primary" type="submit">Add to Cart <span
                    class="loading d-none">...</span></button>
              @endif

              <a href="#" class="quick_view" id="{{ $row->id }}" data-toggle="modal"
                data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a href="{{ route('add.wishlist', $row->id) }}" class="product_fav"><i class="fas fa-heart"></i></a>
            </form>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- Most Popular product ends here --}}

  <div class="popular_categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="popular_categories_content">
            <div class="popular_categories_title">Popular Categories</div>
            <div class="popular_categories_slider_nav">
              <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i>
              </div>
              <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i>
              </div>
            </div>
            <div class="popular_categories_link"><a href="#">full catalog</a></div>
          </div>
        </div>

        <div class="col-lg-9">
          <div class="popular_categories_slider_container">
            <div class="owl-carousel owl-theme popular_categories_slider">
              @foreach ($sub_category as $row)
                <div class="owl-item">
                  <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                    <div class="popular_category_image">
                      <img src="{{ $row->image }}" alt="{{ $row->subcategory_name }}" style="width: 150px">

                    </div>
                    <div class="popular_category_text"><a href="{{ route('category.products', $row->id) }}"
                        style="color: #777676">{{ $row->subcategory_name }}</a></div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="banner_2">
    <div class="banner_2_background"
      style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
    <div class="banner_2_container">
      <div class="banner_2_dots"></div>

      <div class="owl-carousel owl-theme banner_2_slider">

        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Laptops</div>
                    <div class="banner_2_title">MacBook Air 13</div>
                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                      fermentum laoreet.</div>
                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                  </div>
                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{ asset('frontend/images/banner_2_product.png') }}" alt>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Laptops</div>
                    <div class="banner_2_title">MacBook Air 13</div>
                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                      fermentum laoreet.</div>
                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                  </div>
                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{ asset('frontend/images/banner_2_product.png') }}" alt>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Laptops</div>
                    <div class="banner_2_title">MacBook Air 13</div>
                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                      fermentum laoreet.</div>
                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                  </div>
                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{ asset('frontend/images/banner_2_product.png') }}" alt>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @foreach ($sub_category as $item)
    @php
      $products = DB::table('products')
          ->where('subcategory_id', $item->id)
          ->get();
    @endphp
    <div class="container pt-5">
      <div class="tabs  pb-3">
        <div class="new_arrivals_title">{{ $item->subcategory_name }}</div>
        <ul class="clearfix right_btn">
          <li class=""><a href="{{ route('category.products', $item->id) }}">see
              more...</a></li>
        </ul>
      </div>
      <hr class="pb-2">
      {{-- catgory Products start here  --}}
      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-12 "></div>
        @foreach ($products as $row)
          <div class="f_product col-lg-2 col-md-3 col-sm-6">
            <div class="product_item">

              <div class="product_image "><img src="{{ $row->product_thumbnail }}" alt></div>
              <div class="product_content">
                <div class="product_price discount">
                  @if ($row->descount_price == null)
                    {{ $setting->currency }}{{ $row->selling_price }}
                  @else
                    <span>{{ $setting->currency }}{{ $row->selling_price }}</span>{{ $setting->currency }}{{ $row->descount_price }}
                  @endif
                </div>
                <div class="product_name">
                  <a
                    href="{{ route('product.product_details', $row->product_slug) }}">{{ substr($row->product_name, 0, 20) }}...</a>
                </div>
              </div>
               <form action="{{ route('addToCart') }}" method="POST" id="add_cart_form">
              @csrf
              <input type="hidden" name="id" value="{{ $row->id }}">
             
                 @if ($row->stock_quantity < 1)
                <button class="btn btn-sm btn-danger" disabled>Stock out</button>
              @else
                <button class="btn btn-sm btn-primary" type="submit">Add to Cart <span
                    class="loading d-none">...</span></button>
              @endif
              

              <a href="#" class="quick_view" id="{{ $row->id }}" data-toggle="modal"
                data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a href="{{ route('add.wishlist', $row->id) }}" class="product_fav"><i class="fas fa-heart"></i></a>
           </form>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  @endforeach
  <div class="adverts">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 advert_col">

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_title"><a href="#">Trends 2018</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
            </div>
            <div class="ml-auto">
              <div class="advert_image"><img src="{{ asset('frontend/images/adv_1.png') }}" alt>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 advert_col">

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_subtitle">Trends 2018</div>
              <div class="advert_title_2"><a href="#">Sale -45%</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="ml-auto">
              <div class="advert_image"><img src="{{ asset('frontend/images/adv_2.png') }}" alt></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 advert_col">

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_title"><a href="#">Trends 2018</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="ml-auto">
              <div class="advert_image"><img src="{{ asset('frontend/images/adv_3.png') }}" alt></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- Trendy Products start here  --}}

  <div class="trends">
    <div class="trends_background" style="background-image:url({{ asset('frontend/images/trends_background.jpg') }})">
    </div>
    <div class="trends_overlay"></div>
    <div class="container">
      <div class="row">

        <div class="col-lg-3">
          <div class="trends_container">
            <h2 class="trends_title">Trendy Products</h2>
            <div class="trends_text">
              <p>Best trendy products for you.</p>
            </div>
            <div class="trends_slider_nav">
              <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
              <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
            </div>
          </div>
        </div>

        {{-- Trendy single Products start here  --}}
        <div class="col-lg-9">
          <div class="trends_slider_container">
            <div class="owl-carousel owl-theme trends_slider">
              @foreach ($trendy as $row)
                <div class="owl-item">
                  <div class="trends_item is_new">
                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img
                        src="{{ $row->product_thumbnail }}" alt></div>
                    <div class="trends_content">
                      <div class="trends_category"><a href="#">{{ $row->subcategory->subcategory_name }}</a>
                        <div class="trends_price">
                          @if ($row->descount_price == null)
                            {{ $setting->currency }}{{ $row->selling_price }}
                          @else
                            <del
                              class="pr_discount">{{ $setting->currency }}{{ $row->selling_price }}</del>{{ $setting->currency }}{{ $row->descount_price }}
                          @endif
                        </div>
                      </div>

                      <div class="trends_info clearfix">
                        <div class="trends_name"><a
                            href="{{ route('product.product_details', $row->product_slug) }}">{{ substr($row->product_name, 0, 20) }}...</a>
                        </div>

                      </div>
                    </div>
                    <ul class="trends_marks">
                      <li class="trends_mark trends_new quick_view" id="{{ $row->id }}" class=""
                        data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i>
                      </li>
                    </ul>
                    <a href="{{ route('add.wishlist', $row->id) }}" class="trends_fav"><i
                        class="fas fa-heart"></i></a>
                  </div>
                </div>
              @endforeach

              {{-- Trendy Products ends here  --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Trendy Products ends here  --}}

  <div class="reviews">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="reviews_title_container">
            <h3 class="reviews_title">Latest Reviews</h3>
            <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
          </div>
          <div class="reviews_slider_container">

            <div class="owl-carousel owl-theme reviews_slider">

              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div class="review_image"><img src="{{ asset('frontend/images/review_1.jpg') }}" alt></div>
                  </div>
                  <div class="review_content">
                    <div class="review_name">Roberto Sanchez</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div class="review_image"><img src="{{ asset('frontend/images/review_2.jpg') }}" alt></div>
                  </div>
                  <div class="review_content">
                    <div class="review_name">Brandon Flowers</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div class="review_image"><img src="{{ asset('frontend/images/review_3.jpg') }}" alt></div>
                  </div>
                  <div class="review_content">
                    <div class="review_name">Emilia Clarke</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div class="review_image"><img src="{{ asset('frontend/images/review_1.jpg') }}" alt></div>
                  </div>
                  <div class="review_content">
                    <div class="review_name">Roberto Sanchez</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div class="review_image"><img src="{{ asset('frontend/images/review_2.jpg') }}" alt></div>
                  </div>
                  <div class="review_content">
                    <div class="review_name">Brandon Flowers</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div class="review_image"><img src="{{ asset('frontend/images/review_3.jpg') }}" alt></div>
                  </div>
                  <div class="review_content">
                    <div class="review_name">Emilia Clarke</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="reviews_dots"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="viewed">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="viewed_title_container">
            <h3 class="viewed_title">Recently Viewed</h3>
            <div class="viewed_nav_container">
              <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
              <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
            </div>
          </div>
          <div class="viewed_slider_container">

            <div class="owl-carousel owl-theme viewed_slider">

              <div class="owl-item">
                <div
                  class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('frontend/images/view_1.jpg') }}" alt></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$225<span>$300</span></div>
                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>

              <div class="owl-item">
                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('frontend/images/view_2.jpg') }}" alt></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$379</div>
                    <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>

              <div class="owl-item">
                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('frontend/images/view_3.jpg') }}" alt></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$225</div>
                    <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>

              <div class="owl-item">
                <div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('frontend/images/view_4.jpg') }}" alt></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$379</div>
                    <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>

              <div class="owl-item">
                <div
                  class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('frontend/images/view_5.jpg') }}" alt></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$225<span>$300</span></div>
                    <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>

              <div class="owl-item">
                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('frontend/images/view_6.jpg') }}" alt></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$375</div>
                    <div class="viewed_name"><a href="#">Speedlink...</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>
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
              @foreach ($brand as $row)
                <div class="owl-item">
                  <div class="brands_item d-flex flex-column justify-content-center">
                    <a href="#" title="{{ $row->brand_name }}"><img
                        src="{{ $row->brand_logo }}"alt="{{ $row->brand_name }}" style="width: 70px"></a>
                    {{-- <a href="" class="pt-3" style="color: #999">{{ $row->brand_name }}</a> --}}
                  </div>
                </div>
              @endforeach
            </div>

            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
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
              <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}" alt></div>
              <div class="newsletter_title">Sign up for Newsletter</div>
              <div class="newsletter_text">
                <p>...and receive %20 coupon for first shopping.</p>
              </div>
            </div>
            <div class="newsletter_content clearfix">
              <form action="#" class="newsletter_form">
                <input type="email" class="newsletter_input" required="required"
                  placeholder="Enter your email address">
                <button class="newsletter_button">Subscribe</button>
              </form>
              <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- single product model start here --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>

          </button>
        </div>
        <div class="modal-body" id="quick_view">

        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div> --}}
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

  <script>
    $(document).on('click', '.quick_view', function() {
      let id = $(this).attr('id');
      // alert(id);
      $.get("product_quick_view/" + id, function(data) {
        $('#quick_view').html(data);
      })
    })
  </script>

  <script>
    // add to cart 
    $('#add_cart_form').submit(function(e) {
      e.preventDefault();
      $('.loading').removeClass('d-none');
      var url = $(this).attr('href');
      var request = $(this).serialize();
      $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: request,
        success: function(data) {
          toastr.success(data);
          $('#add_cart_form')[0].reset();
          $('.loading').addClass('d-none');
          cart();
        }
      })
    })
  </script>
@endsection
