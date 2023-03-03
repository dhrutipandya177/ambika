<!-- Header -->
<header id="header" class="header header-transparent">
  <nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('front/images/logo/logo-light.png')}}" class="logo-light" alt="logo">
        <img src="{{ asset('front/images/logo/logo-dark.png')}}" class="logo-dark" alt="logo">
      </a>
      <button class="navbar-toggler" type="button">
        <span class="menu-lines"><span></span></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav__item">
            <a href="{{ url('/') }}" class="dropdown-toggle nav__item-link active">Home</a>
          </li><!-- /.nav-item -->
          <li class="nav__item with-dropdown">
            <a href="about-us.html" class="dropdown-toggle nav__item-link">Products</a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="{{ route('about-us') }}" class="nav__item-link">About Us</a></li>
              <!-- /.nav-item -->
              <li class="nav__item"><a href="{{ route('why-us') }}" class="nav__item-link">Why Choose Us</a></li>
              <!-- /.nav-item -->
              <li class="nav__item"><a href="{{ route('leadership-team') }}." class="nav__item-link">Leadership Team</a></li>
              <!-- /.nav-item -->
              <li class="nav__item"><a href="{{ route('pricing') }}" class="nav__item-link">Pricing & Plans</a></li>
              <!-- /.nav-item -->
              <li class="nav__item"><a href="{{ route('faqs') }}" class="nav__item-link">Help & FAQs</a></li>
              <!-- /.nav-item -->
              <li class="nav__item"><a href="{{ route('careers') }}" class="nav__item-link">careers</a></li>
              <li class="nav__item"><a href="{{ route('contact-us') }}" class="nav__item-link">Contact-Us</a></li>
              <!-- /.nav-item -->
            </ul><!-- /.dropdown-menu -->
          </li><!-- /.nav-item -->
          <li class="nav__item">
            <a href="{{ route('about-us') }}" class="nav__item-link">About Us</a>
          </li><!-- /.nav-item -->
          <li class="nav__item">
            <a href="{{ route('contact-us') }}" class="nav__item-link">Contact Us</a>
          </li><!-- /.nav-item -->
        </ul><!-- /.navbar-nav -->
      </div><!-- /.navbar-collapse -->
      <!--<div class="navbar-modules">
        <ul class="list-unstyled d-flex align-items-center modules__btns-list">
          <li><a href="#" class="module__btn module__btn-search"><i class="fa fa-search"></i></a></li>
          <li class="d-none d-lg-block">
            <div class="module__btn module__btn-phone d-flex align-items-center">
              <i class="icon-phone"></i>
              <a href="tel:5565454117">55 654 541 17</a>
            </div>
          </li>
        </ul>
      </div> -->
    </div><!-- /.container -->
  </nav><!-- /.navabr -->
</header><!-- /.Header -->