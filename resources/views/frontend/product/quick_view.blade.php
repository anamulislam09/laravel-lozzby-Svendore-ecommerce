@php
    $rating5 = App\Models\Review::where('product_id', $product->id)
        ->where('rating', 5)
        ->count();
    $rating4 = App\Models\Review::where('product_id', $product->id)
        ->where('rating', 4)
        ->count();
    $rating3 = App\Models\Review::where('product_id', $product->id)
        ->where('rating', 3)
        ->count();
    $rating2 = App\Models\Review::where('product_id', $product->id)
        ->where('rating', 2)
        ->count();
    $rating1 = App\Models\Review::where('product_id', $product->id)
        ->where('rating', 1)
        ->count();
    
    // average rating
    $sum_rating = App\Models\Review::where('product_id', $product->id)->sum('rating');
    $count_rating = App\Models\Review::where('product_id', $product->id)->count('rating');


    $images = json_decode($product->images, true);
    $color = explode(',', $product->product_color);
    $size = explode(',', $product->product_size);


  @endphp

<div class="row">
    <div class="col-4">
      <div class="image">
        <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}" style="width: 220px" />
      </div>
    </div>
    <div class="col-8">

        <div class="product_description">

          {{-- <div class="product_category">
            {{ $product->category->category_name }}>{{ $product->subcategory->subcategory_name }}</div> --}}
          <div class="product_name" style="font-size: 20px;">{{ $product->product_name }}</div>
          <div class="product_category"><span class="text-info">Brand: </span><a href="#"
              style="color: #838080;">{{ $product->brand->brand_name }}</a></div>
          <div class="product_category"><span>Stock: </span> @if ( $product->stock_quantity < 1)
            <span class="badge badge-danger"> Stock out </span> @else <span class="badge badge-primary"> Stock Available </span>
          @endif 
          </div>
          {{-- <div class="product_category"><span class="text-info">Unit: </span>{{ $product->product_unit }}
          </div> --}}
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
                @php
                $rat = $sum_rating / $count_rating;
              @endphp
                <a href="#review" class="pl-2">{{number_format($rat,1);}} Ratings</a>
              @elseif ($sum_rating / $count_rating < 4.5 && $sum_rating / $count_rating >= 3.5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                @php
                $rat = $sum_rating / $count_rating;
              @endphp
                <a href="#review" class="pl-2">{{number_format($rat,1);}} Ratings</a>>
              @elseif ($sum_rating / $count_rating < 3.5 && $sum_rating / $count_rating >= 2.5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star"></span>
                @php
                $rat = $sum_rating / $count_rating;
              @endphp
                <a href="#review" class="pl-2">{{number_format($rat,1);}} Ratings</a>
             
                @elseif ($sum_rating / $count_rating < 2.5 && $sum_rating / $count_rating >= 1.5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star"></span>
                @php
                $rat = $sum_rating / $count_rating;
              @endphp
                <a href="#review" class="pl-2">{{number_format($rat,1);}} Ratings</a>
              @else
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star"></span>
                @php
                $rat = $sum_rating / $count_rating;
              @endphp
                <a href="#review" class="pl-2">{{number_format($rat,1);}} Ratings</a>
              @endif
            @endif
          </div>
          {{-- cart details --}}
          <div class="order_info d-flex flex-row">
            <form action="{{route('addToCartQv')}}" method="POST" id="add_cart_form_Qv">
              @csrf
              <input type="hidden" name="id" value="{{$product->id}}">

              @if ($product->descount_price == null)
              <input type="hidden" name="price" value="{{ $product->selling_price }}">
            @else
              <input type="hidden" name="price" value="{{ $product->descount_price }}">
            @endif

              <div class="clearfix" style="z-index: 1000">
                <div class="form-group">
                  <div class="row">
                    @isset($product->product_size)
                      <div class="col-6">
                        <label for="">Size:</label>
                        <select name="size" class="form-control form-control-sm" style="min-width:120px;"
                          id="">
                          <option value="" selected disabled>Select Size</option>
                          @foreach ($size as $row)
                            <option value="{{ $row }}">{{ $row }}</option>
                          @endforeach
                        </select>
                      </div>
                    @endisset
                    @isset($product->product_color)
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
                  <input id="quantity_input" type="text" name="qty" pattern="[1-9]*" value="1" />
                  <div class="quantity_buttons">
                    <div id="quantity_inc_button" class="quantity_inc quantity_control">
                      <i class="fas fa-chevron-up"></i>
                    </div>
                    <div id="quantity_dec_button" class="quantity_dec quantity_control">
                      <i class="fas fa-chevron-down"></i>
                    </div>
                  </div>
                </div>
                

              </div>
              @if ($product->descount_price == null)
                <div class="product_price">{{ $setting->currency }}{{ $product->selling_price }}</div>
              @else
                <div class="product_price"><del class="text-danger pr-3"
                    style="font-size: 20px">{{ $setting->currency }}{{ $product->selling_price }}</del>{{ $setting->currency }}{{ $product->descount_price }}
                </div>
              @endif
              <div class="button_container">
                  <div class="input-group-prepend">
                   @if ($product->stock_quantity<1)
                   <button class="btn btn-sm btn-danger" disabled>Stock out</button>
                     @else
                     <button class="btn btn-sm btn-primary" type="submit">Add to Cart  <span class="loading d-none">...</span></button>
                   @endif
                    <a href="{{route('add.wishlist',$product->id)}}" class="btn btn-sm btn-warning" type="button">Add to Wishlist</a>
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>

  <script>
    // add to cart 
    $('#add_cart_form_Qv').submit(function(e) {
      e.preventDefault();
      $('.loading').removeClass('d-none');
      var url = $(this).attr('action');
      var request = $(this).serialize();
      $.ajax({
        url: url,
        type:'post',
        async: false,
        data: request,
        success:function(data){
          toastr.success(data);
          $('#add_cart_form')[0].reset();
          $('.loading').addClass('d-none');
          cart();
        }
      })
    })
  </script>