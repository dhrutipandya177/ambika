<ul class="navbar-nav">
  <li class="nav__item with-dropdown">
    <a href="{{ url('/') }}" class="dropdown-toggle nav__item-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
  </li><!-- /.nav-item -->
  <li class="nav__item with-dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle nav__item-link">Products & Services</a>
    <i class="fa fa-angle-right" data-toggle="dropdown"></i>
    @if(!$menuCategories->isEmpty())
      <ul class="dropdown-menu">
        @foreach($menuCategories as $menuCategory)
          <li class="nav__item with-dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle nav__item-link">{{ $menuCategory['name'] }}</a>
              @if(!$menuCategory['subcategories']->isEmpty())
                  <i class="fa fa-angle-right" data-toggle="dropdown"></i>
                  <ul class="dropdown-menu">
                @foreach($menuCategory['subcategories'] as $menuSubCategory)
                      <li class="nav__item">
                          <a href="{{ route('get-category-products-list',base64_encode($menuSubCategory['id'])) }}" class="nav__item-link">{{ $menuSubCategory['name'] }}</a>
                      </li>    
                @endforeach
                  </ul>
              @endif
          </li>
        @endforeach
      </ul>  
    @endif
  </li><!-- /.nav-item -->
  <li class="nav__item">
    <a href="{{ route('gallery') }}" class="nav__item-link {{ (request()->is('gallery')) ? 'active' : '' }}">Gallery</a>
  </li><!-- /.nav-item -->
  <li class="nav__item">
    <a href="{{ route('about-us') }}" class="nav__item-link {{ (request()->is('about-us')) ? 'active' : '' }}">About Us</a>
  </li><!-- /.nav-item -->
  <li class="nav__item">
    <a href="{{ route('contact-us') }}" class="nav__item-link {{ (request()->is('contact-us')) ? 'active' : '' }}">Contact Us</a>
  </li><!-- /.nav-item -->
</ul><!-- /.navbar-nav -->