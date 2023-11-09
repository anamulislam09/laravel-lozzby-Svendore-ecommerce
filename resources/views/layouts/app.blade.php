<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="OneTech shop project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
  <link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet"
    type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">
 
    <!-- toaste -->
    <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.css')}}">

  {{-- <script nonce="56ba8d5e-ddb3-4602-b0f2-4db2698c22ae">
    (function(w, d) {
      ! function(j, k, l, m) {
        j[l] = j[l] || {};
        j[l].executed = [];
        j.zaraz = {
          deferred: [],
          listeners: []
        };
        j.zaraz.q = [];
        j.zaraz._f = function(n) {
          return async function() {
            var o = Array.prototype.slice.call(arguments);
            j.zaraz.q.push({
              m: n,
              a: o
            })
          }
        };
        for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
        j.zaraz.init = () => {
          var q = k.getElementsByTagName(m)[0],
            r = k.createElement(m),
            s = k.getElementsByTagName("title")[0];
          s && (j[l].t = k.getElementsByTagName("title")[0].text);
          j[l].x = Math.random();
          j[l].w = j.screen.width;
          j[l].h = j.screen.height;
          j[l].j = j.innerHeight;
          j[l].e = j.innerWidth;
          j[l].l = j.location.href;
          j[l].r = k.referrer;
          j[l].k = j.screen.colorDepth;
          j[l].n = k.characterSet;
          j[l].o = (new Date).getTimezoneOffset();
          if (j.dataLayer)
            for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                ...x[1],
                ...y[1]
              })), {}))) zaraz.set(w[0], w[1], {
              scope: "page"
            });
          j[l].q = [];
          for (; j.zaraz.q.length;) {
            const z = j.zaraz.q.shift();
            j[l].q.push(z)
          }
          r.defer = !0;
          for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_")))
            .forEach((B => {
              try {
                j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
              } catch {
                j[l]["z_" + B.slice(7)] = A.getItem(B)
              }
            }));
          r.referrerPolicy = "origin";
          r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
          q.parentNode.insertBefore(r, q)
        };
        ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz
          .init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script> --}}
</head>

<body>
  <div class="super_container">

    <header class="header">

      <div class="top_bar">
        <div class="container">
          <div class="row">
            <div class="col d-flex flex-row">
              <div class="top_bar_contact_item">
                <div class="top_bar_icon"><a href="tel:01847309892"><img src="{{ asset('frontend/images/phone.png') }}" class="pr-2" alt>01847309892</a></div>
              </div>
              <div class="top_bar_contact_item">
                <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt></div><a
                  href="https://preview.colorlib.com/cdn-cgi/l/email-protection#81e7e0f2f5f2e0ede4f2c1e6ece0e8edafe2eeec"><span
                    class="__cf_email__"
                    data-cfemail="0c6a6d7f787f6d60697f4c6b616d6560226f6361">[email&#160;protected]</span></a>
              </div>
              <div class="top_bar_content ml-auto">
                <div class="top_bar_menu">
                  <ul class="standard_dropdown top_bar_dropdown">
                    <li>
                      <a href="#">lang<i class="fas fa-chevron-down"></i></a>
                      <ul>
                        <li><a href="#">English</a></li>
                        <li><a href="#">বাংলা</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">Currency<i class="fas fa-chevron-down"></i></a>
                      <ul>
                        <li><a href="#">Dollar ($)</a></li>
                        <li><a href="#">taka (৳)</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="top_bar_menu">
                  @guest
                  <ul class="standard_dropdown top_bar_dropdown">
                  <li>
                    <a href="#"><i class="fas fa-user"></i>User</a>
                    <ul>
                      <li><a href="#" style="color: #4b4b49" data-toggle="modal" data-target="#login">login<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="{{route('register')}}">Registration</a></li>
                    </ul>
                  </li>
                </ul>
                    @else
                    <ul class="standard_dropdown top_bar_dropdown">
                      <li>
                        <a href="#">{{Auth::user()->name}}<i class="fas fa-chevron-down"></i></a>
                        <ul>
                          <li><a href="#">Profile</a></li>
                          <li><a href="#">Setings</a></li>
                          <li><a href="#">Order List</a></li>
                          <li><a href="{{route('customer.logout')}}">Logout</a></li>
                        </ul>
                      </li>
                    </ul>
                  @endguest
 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="header_main">
        <div class="container">
          <div class="row">

            <div class="col-lg-2 col-sm-3 col-3 order-1">
              <div class="logo_container">
                <div class="logo"><a href="/">LozzBy</a></div>
              </div>
            </div>

            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
              <div class="header_search">
                <div class="header_search_content">
                  <div class="header_search_form_container">
                    <form action="#" class="header_search_form clearfix">
                      <input type="search" required="required" class="header_search_input"
                        placeholder="Search for products...">
                      <div class="custom_dropdown">
                        <div class="custom_dropdown_list">
                          <span class="custom_dropdown_placeholder clc">All Categories</span>
                          <i class="fas fa-chevron-down"></i>
                          <ul class="custom_list clc">
                            <li><a class="clc" href="#">All Categories</a></li>
                            <li><a class="clc" href="#">Computers</a></li>
                            <li><a class="clc" href="#">Laptops</a></li>
                            <li><a class="clc" href="#">Cameras</a></li>
                            <li><a class="clc" href="#">Hardware</a></li>
                            <li><a class="clc" href="#">Smartphones</a></li>
                          </ul>
                        </div>
                      </div>
                      <button type="submit" class="header_search_button trans_300" value="Submit"><img
                          src="{{ asset('frontend/images/search.png') }}" alt></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            @php
              $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->count();
            @endphp
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
              <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                  <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt></div>
                  <div class="wishlist_content">
                    <div class="wishlist_text"><a href="#">Wishlist</a></div>
                    <div class="wishlist_count">{{$wishlist}}</div>
                  </div>
                </div>

                <div class="cart">
                  <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                    <div class="cart_icon">
                      <img src="{{ asset('frontend/images/cart.png') }}" alt>
                      <div class="cart_count"><span>{{Cart::count()}}</span></div>
                    </div>
                    <div class="cart_content">
                      <div class="cart_text"><a href="{{route('removeCart')}}">Cart</a></div>
                      <div class="cart_price">{{ $setting->currency }}{{Cart::total()}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @yield('navbar')
    </header>

    @yield('content')

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 footer_col">
            <div class="footer_column footer_contact">
              <div class="logo_container">
                <div class="logo"><a href="/">LozzBy</a></div>
              </div>
              <div class="footer_title">Got Question? Call Us 24/7</div>
              <div class="footer_phone">+38 068 005 3570</div>
              <div class="footer_contact_text">
                <p>17 Princess Road, London</p>
                <p>Grester London NW18JR, UK</p>
              </div>
              <div class="footer_social">
                <ul>
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fab fa-google"></i></a></li>
                  <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-2 offset-lg-2">
            <div class="footer_column">
              <div class="footer_title">Find it Fast</div>
              <ul class="footer_list">
                <li><a href="#">Computers & Laptops</a></li>
                <li><a href="#">Cameras & Photos</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Smartphones & Tablets</a></li>
                <li><a href="#">TV & Audio</a></li>
              </ul>
              <div class="footer_subtitle">Gadgets</div>
              <ul class="footer_list">
                <li><a href="#">Car Electronics</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="footer_column">
              <ul class="footer_list footer_list_2">
                <li><a href="#">Video Games & Consoles</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Cameras & Photos</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Computers & Laptops</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="footer_column">
              <div class="footer_title">Customer Care</div>
              <ul class="footer_list">
                <li><a href="#">My Account</a></li>
                <li><a href="#">Order Tracking</a></li>
                <li><a href="#">Wish List</a></li>
                <li><a href="#">Customer Services</a></li>
                <li><a href="#">Returns / Exchange</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Product Support</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
              <div class="copyright_content">
                Copyright &copy;
                <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>

              </div>
              <div class="logos ml-sm-auto">
                <ul class="logos_list">
                  <li><a href="#"><img src="{{ asset('frontend/images/logos_1.png') }}" alt></a></li>
                  <li><a href="#"><img src="{{ asset('frontend/images/logos_2.png') }}" alt></a></li>
                  <li><a href="#"><img src="{{ asset('frontend/images/logos_3.png') }}" alt></a></li>
                  <li><a href="#"><img src="{{ asset('frontend/images/logos_4.png') }}" alt></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Login Modal start here -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror"
              name="email" placeholder="Enter  your email">
          </div>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" placeholder="Enter  your password">
          </div>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Login Modal ends here -->


  <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
  <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
  <script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
  <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
  <script src="{{ asset('frontend/js/product_custom.js') }}"></script>
   <!-- toaste -->
<script src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

  <script>
    @if (Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
      switch (type) {
        case 'info':
          toastr.info("{{Session::get('message')}}");
          break;
        case 'success':
          toastr.success("{{Session::get('message')}}");
          break;
        case 'warning':
          toastr.warning("{{Session::get('message')}}");
          break;
        case 'error':
          toastr.error("{{Session::get('message')}}");
          break;
      }
    @endif
  </script>

  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/onetech/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Aug 2023 12:37:44 GMT -->

</html>
