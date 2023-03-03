<header id="header" class="header header-white header-full">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('front/images/logo/logo-light.png')}}" class="logo-light" alt="logo">
        <img src="{{ asset('front/images/logo/logo-dark.png')}}" class="logo-dark" alt="logo">
      </a>
      <div class="header__topbar d-none d-lg-block">
        <div class="d-flex flex-wrap">
          <ul class="contact__list list-unstyled">
            <li>
              <i class="icon-phone"></i>
              <div>
                <span>Call Us:</span><strong>+91 99041-21119</strong>
              </div>
            </li>
            <li>
              <i class="icon-envelope"></i>
              <div>
                <span>Email Us:</span><strong><a href="mailto:ambicaent1119@gmail.com">ambicaent1119@gmail.com</a></strong>
              </div>
            </li>
            <li>
              <i class="icon-clock"></i>
              <div>
                <span>Opening Hours:</span><strong>Mon-Fri: 8am – 7pm</strong>
              </div>
            </li>
          </ul>
          <ul class="social__icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          </ul>
        </div>
      </div><!-- /.header-topbar -->
      <button class="navbar-toggler" type="button">
        <span class="menu-lines"><span></span></span>
      </button>
    </div><!-- /.container -->
    <div class="navbar__bottom sticky-navbar">
      <div class="container">
        <div class="collapse navbar-collapse" id="mainNavigation">
          @include('front.layouts.menu')
        </div><!-- /.navbar-collapse -->
        <div class="navbar-modules d-none d-lg-block">
          <ul class="list-unstyled d-flex align-items-center modules__btns-list">
            <!--<li><a href="#" class="module__btn module__btn-search color-white"><i class="fa fa-search"></i></a></li>
            <li class="d-none d-lg-block">
              <a href="{{ route('contact-us') }}" class="btn btn__primary btn__hover2 module__btn-request">
                <span>Get A Quote</span><i class="icon-arrow-right"></i>
              </a>
            </li>-->
          </ul><!-- /.modules-wrapper -->
        </div><!-- /.navbar-modules -->
      </div><!-- /.container -->
    </div><!-- /.navbar-bottom -->
  </nav><!-- /.navabr -->
</header><!-- /.Header -->
