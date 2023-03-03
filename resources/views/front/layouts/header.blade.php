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
        @include('front.layouts.menu')
      </div><!-- /.navbar-collapse -->
      <div class="navbar-modules">
        <ul class="list-unstyled d-flex align-items-center modules__btns-list">
          <!--<li><a href="#" class="module__btn module__btn-search"><i class="fa fa-search"></i></a></li>-->
          <li class="d-none d-lg-block">
            <div class="module__btn module__btn-phone d-flex align-items-center">
              <i class="icon-phone"></i>
              <a href="tel:919924121119">+91 9924121119</a>            </div>
          </li>
        </ul>
      </div>
    </div><!-- /.container -->
  </nav><!-- /.navabr -->
</header><!-- /.Header -->