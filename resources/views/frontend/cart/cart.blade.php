@extends('layouts.app')

 @section('content')
  @include('layouts.frontend_partial.main_nav')
  {{-- main navbar ends here  --}}

  <div class="cart_section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cart_container">
            <div class="cart_title">Shopping Cart</div>
            <div class="cart_items">
              <ul class="cart_list">
                @foreach ($products as $product )

                <li class="cart_item clearfix">
                  <div class="cart_item_image"><img src="{{$product->thumbnail}}" alt></div>
                  <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                    <div class="cart_item_name cart_info_col">
                      <div class="cart_item_title">Name</div>
                      <div class="cart_item_text" style="width: 200px">{{$product->name}}</div>
                    </div>
                    <div class="cart_item_color cart_info_col">
                      <div class="cart_item_title">Color</div>
                      <div class="cart_item_text"><span style="background-color:#999999;"></span>{{$product->color}}</div>
                    </div>
                    <div class="cart_item_quantity cart_info_col">
                      <div class="cart_item_title">Quantity</div>
                      <div class="cart_item_text">{{$product->qty}}</div>
                    </div>
                    <div class="cart_item_quantity cart_info_col">
                      <div class="cart_item_title">Size</div>
                      <div class="cart_item_text">{{$product->size}}</div>
                    </div>
                    <div class="cart_item_price cart_info_col">
                      <div class="cart_item_title">Price</div>
                      <div class="cart_item_text">{{$product->price}}</div>
                    </div>
                    <div class="cart_item_total cart_info_col">
                      <div class="cart_item_title">Total</div>
                      <div class="cart_item_text">{{$product->total}}</div>
                    </div>
                    <div class="cart_item_total cart_info_col">
                      <div class="cart_item_title">Action</div>
                      <div class="cart_item_text"><a href="#" class="text-danger fw-bold">X</a></div>
                    </div>
                  </div>
                </li>

                @endforeach

              </ul>
            </div>

            <div class="order_total">
              <div class="order_total_content text-md-right">
                <div class="order_total_title">Order Total:</div>
                <div class="order_total_amount">{{Cart::subtotal()}}</div>
              </div>
            </div>
            <div class="cart_buttons">
              <button type="button" class="button cart_button_clear">Add to Cart</button>
              <button type="button" class="button cart_button_checkout">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
