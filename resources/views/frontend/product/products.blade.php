@extends('layouts.app')

@section('content')
  {{-- main navbar start here 
  @include('layouts.frontend_partial.main_nav') --}}

  {{-- product start here --}}

  <div class="container pb-4">
    <div class="row">
      <div class="featured col-md-12">
        <div class="tabbed_container">
          <div class="tabs ">
            <ul class="clearfix">
              {{-- <li class="active">{{$Subcategory->subcategory_name}} Products</li> --}}
            </ul>
          </div>
          <hr class="pb-2">
          <div class="row">
            @foreach ($product as $row)
              <div class="f_product col-lg-2 col-md-3 col-sm-12">
                {{-- <div class="product_item"> --}}
    
                  <div class="product_image "><img src="{{ env('BASE_URL').$row->product_thumbnail}}" alt="{{ $row->product_name }}"></div>
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
    
                  @if ($row->stock_quantity<1)
                  <button class="btn btn-sm btn-danger" disabled>Stock out</button>
                    @else
                    <button class="btn btn-sm btn-primary" type="submit">Add to Cart  <span class="loading d-none">...</span></button>
                  @endif
                  <a href="#" class="quick_view" id="{{ $row->id }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  {{-- <a href="#" class="quick_view" id="{{ $row->id }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  <a href="{{ route('add.wishlist', $row->id) }}" class="product_fav"><i
                      class="fas fa-heart"></i></a> --}}
                {{-- </div> --}}
              </div>
            @endforeach
          </div>
          {{-- Featured product ends here --}}
        </div>
      </div>
    </div>
  </div>

  {{-- single product model start here --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
      let base = "{{env('BASE_URL')}}"
      $.get(base+"product_quick_view/" + id, function(data) {
        $('#quick_view').html(data);
      })
    })
  </script>
@endsection
