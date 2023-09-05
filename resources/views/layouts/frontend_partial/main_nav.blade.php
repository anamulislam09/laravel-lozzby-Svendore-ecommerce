
@php
 $category = DB::table('categories')->get();
@endphp

<nav class="main_nav">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="main_nav_content d-flex flex-row">

          <div class="cat_menu_container">
            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
              <div class="cat_burger"><span></span><span></span><span></span></div>
              <div class="cat_menu_text">categories</div>
            </div>
            <ul class="cat_menu">
              
              {{-- <li><a href="#">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li> --}}
              @foreach ( $category as $item )

              @php
                $subcategory = DB::table('subcategories')->where('category_id',$item->id)->get();
              @endphp
              <li class="hassubs">
                <a href="#">{{$item->category_name}}<i class="fas fa-chevron-right"></i></a>
                <ul>
                  @foreach ( $subcategory as $item )
                  @php
                  $childcategory = DB::table('childcategories')->where('subcategory_id',$item->id)->get();
                @endphp
                  <li class="hassubs">
                    <a href="#">{{$item->subcategory_name}}<i class="fas fa-chevron-right"></i></a>
                    <ul>
                      @foreach ( $childcategory as $item )
                      <li><a href="#">{{$item->childcategory_name}}<i class="fas fa-chevron-right"></i></a></li>
                     @endforeach
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </li>
              @endforeach
            </ul>
          </div>

          <div class="main_nav_menu ml-auto">
            <ul class="standard_dropdown main_nav_dropdown">
              <li><a href="{{route('index')}}">Home<i class="fas fa-chevron-down"></i></a></li>
              <li class="hassubs">
                <a href="#">Campaign<i class="fas fa-chevron-down"></i></a>
                <ul>
                  <li>
                    <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                    </ul>
                  </li>
                  <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                </ul>
              </li>
              <li class="hassubs">
                <a href="#">Contact<i class="fas fa-chevron-down"></i></a>
                <ul>
                  <li>
                    <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                    </ul>
                  </li>
                  <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                </ul>
              </li>
              
              <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
              <li><a href="blog.html">Helpline<i class="fas fa-chevron-down"></i></a></li>
            </ul>
          </div>

          <div class="menu_trigger_container ml-auto">
            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
              <div class="menu_burger">
                <div class="menu_trigger_text">menu</div>
                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

{{-- mobile nav start here --}}

<div class="page_menu">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_menu_content">
          <div class="page_menu_search">
            <form action="#">
              <input type="search" required="required" class="page_menu_search_input"
                placeholder="Search for products...">
            </form>
          </div>
          <ul class="page_menu_nav">
            <li class="page_menu_item has-children">
              <a href="#">Language<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Currency<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item">
              <a href="#">Home<i class="fa fa-angle-down"></i></a>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item has-children">
                  <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
            <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
          </ul>
          <div class="menu_contact">
            <div class="menu_contact_item">
              <div class="menu_contact_icon"><img src="{{ asset('frontend/images/phone_white.png') }}" alt>
              </div>+38 068 005 3570
            </div>
            <div class="menu_contact_item">
              <div class="menu_contact_icon"><img src="{{ asset('frontend/images/mail_white.png') }}" alt>
              </div><a
                href="https://preview.colorlib.com/cdn-cgi/l/email-protection#076166747374666b627447606a666e6b2964686a"><span
                  class="__cf_email__"
                  data-cfemail="afc9cedcdbdccec3cadcefc8c2cec6c381ccc0c2">[email&#160;protected]</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- mobile nav ends here --}}
