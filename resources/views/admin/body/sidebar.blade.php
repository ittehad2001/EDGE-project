<aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="{{asset('backend/assets/img/logo.jpg')}}" class="header-logo" /> 
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Brand</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.brand') }}">All Brands</a></li>
                <li><a class="nav-link" href="{{ route('add.brand') }}">Add Brands</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Category</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.category') }}">All Category</a></li>
                <li><a class="nav-link" href="{{ route('add.category') }}">Add Category</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Product Manage</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.product') }}">All Products</a></li>
                <li><a class="nav-link" href="{{ route('add.product') }}">Add Product</a></li>
               
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Slider</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.slider') }}">All Slider</a></li>
                <li><a class="nav-link" href="{{ route('add.slider') }}">Add slider</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Banner</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.banner') }}">All Banner</a></li>
                <li><a class="nav-link" href="{{ route('add.banner') }}">Add Banner</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Shipping Area</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('all.division') }}">All Division</a></li>
                <li><a href="{{ route('add.division') }}">Add Division</a></li>
                <li><a href="{{ route('all.district') }}">All District</a></li>
                <li><a href="{{ route('add.district') }}">Add District</a></li>
                <li><a href="{{ route('all.state') }}">All State</a></li>
                <li><a href="{{ route('add.state') }}">Add State</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Coupon</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('all.coupon') }}">All Coupon</a></li>
                <li><a href="{{ route('add.coupon') }}">Add Coupon</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Order Manage</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('pending.order') }}">Pending Order</a></li>
                <li><a class="nav-link" href="{{ route('admin.confirmed.order') }}">Confirmed Order</a></li>
                <li><a class="nav-link" href="{{ route('admin.processing.order') }}">Processing Order</a></li>
                <li><a class="nav-link" href="{{ route('admin.delivered.order') }}">Delivered Order</a></li>
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Return Order </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('return.request') }}">Return Request</a></li>
                <li><a class="nav-link" href="{{ route('complete.return.request') }}">Complete Request</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Reports Manage</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('report.view') }}">Report View</a></li>
                <li><a class="nav-link" href="{{ route('order.by.user') }}">Order By User</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="pie-chart"></i><span>Stock Manage</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('product.stock') }}">Product Stock</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Setting Manage</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('site.setting') }}">Site Setting</a></li>
                <li><a class="nav-link" href="{{ route('seo.setting') }}">Seo Setting</a></li>
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Review Manage</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('pending.review') }}">Pending Review</a></li>
                <li><a class="nav-link" href="{{ route('publish.review') }}">Publish Review</a></li>
              </ul>
            </li>
            
            
            <li><a class="nav-link" href="{{route('contact.message')}}"><i data-feather="map-pin"></i><span>Contact Message</span></a></li>
            <li><a class="nav-link" href="{{ route('smtp.setting') }}"><i data-feather="map-pin"></i><span>Manage SMPT</span></a></li>
          </ul>
        </aside>