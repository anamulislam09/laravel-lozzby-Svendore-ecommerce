<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <strong class="brand-text pl-5">Admin Panel</strong>
  </a>

  <!-- Sidebar -->
  <div class="sidebar mainsidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('admin.home') }}" class="d-block"> {{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="{{ route('admin.home') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        {{-- services menu start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('subcategory.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>SubCategory</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('childcategory.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Child Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('brand.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
              </a>
            </li>

          </ul>
        </li>
        {{-- servises menu ends here --}}

        {{-- Products menu start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('product.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>New Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('product.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Product</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- Products menu ends here --}}

        {{-- waerhouse menu start here --}}
        <li class="nav-item">
          <a href="{{ route('warehouse.index') }}" class="nav-link">
            <i class="fa fa-home" aria-hidden="true"></i>
            <p>Warehouse</p>
          </a>
        </li>
        {{-- waerhouse ends here --}}

        {{-- offers start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fa fa-wrench" aria-hidden="true"></i>
            <p>
              Offers
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('coupon.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Coupon</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('website.setting') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>E-Campaign</p>
              </a>
            </li>


          </ul>
        </li>
        {{-- Offers ends here --}}

        {{-- offers start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fa fa-wrench" aria-hidden="true"></i>
            <p>
              Pickup point
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pickup_point.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pickup-Point</p>
              </a>
            </li>



          </ul>
        </li>
        {{-- Offers ends here --}}


        {{-- Settings start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fa fa-wrench" aria-hidden="true"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('seo.setting') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>SEO Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('website.setting') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Website Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('page.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Page Manegement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('smtp.setting') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>SMTP Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('brand.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Payment Gateway</p>
              </a>
            </li>

          </ul>
        </li>
        {{-- Settings ends here --}}

        {{-- orders menu start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Orders
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Confirmed Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order Delivered</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- orders menu ends here --}}
        {{-- Reporting start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <p class="pl-2">
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Confirmed Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order Delivered</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- Reporting ends here --}}
        {{-- table menu start here --}}
        <li class="nav-item">
          <a href="#" class="nav-link pl-2">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/jsgrid.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- table menu ends here --}}
        <li class="nav-header">LABELS</li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Informational</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
