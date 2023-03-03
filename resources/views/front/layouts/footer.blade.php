<!-- Footer -->
<footer id="footer" class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-4 footer__widget footer__widget-nav">
          <h6 class="footer__widget-title">About Ambica</h6>
          <div class="footer__widget-content">
            <p>We are Ambica Enterprise leading name in all type of Industrial product Supplier. Our beginning was by marketing roof sheets of leading Indian brands and our own brands.</p>
          </div><!-- /.footer-widget-content -->
        </div><!-- /.col-xl-2 -->
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2 offset-xl-1 footer__widget footer__widget-nav">
          <h6 class="footer__widget-title">Company</h6>
          <div class="footer__widget-content">
            <nav>
              <ul class="list-unstyled">
                <li><a href="{{ route('about-us') }}">About Us</a></li>
                <li><a href="{{ route('contact-us') }}">Contacts</a></li>
                <li><a href="{{ route('gallery') }}">Gallary</a></li>
              </ul>
            </nav>
          </div><!-- /.footer-widget-content -->
        </div><!-- /.col-xl-2 -->
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 offset-xl-1 footer__widget footer__widget-about">
          <h6 class="footer__widget-title">Quick Contact</h6>
          <div class="footer__widget-content">
            <p class="color-gray">If you have any questions or need help, feel free to contact with our team.</p>
            <p class="footer__contact-phone">
              <i class="icon-phone"></i>
              <a href="tel:919924121119">+91 9924121119</a>
            </p>
            <p>Bharuch, Gujarat, India.</p>
            <ul class="social__icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
            </ul><!-- /.social-icons -->
          </div>
        </div><!-- /.col-xl-3 -->
        <!--<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2 footer__widget footer__widget-nav">
          <h6 class="footer__widget-title">Industries</h6>
          <div class="footer__widget-content">
            <nav>
              <ul class="list-unstyled">
                <li><a href="#">Retail & Consumer</a></li>
                <li><a href="#">Sciences & Healthcare</a></li>
                <li><a href="#">Industrial & Chemical</a></li>
                <li><a href="#">Power Generation</a></li>
                <li><a href="#">Food & Beverage</a></li>
                <li><a href="#">Oil & Gas</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-6 col-xl-4 footer__widget footer__widget-newsletter">
          <div class="footer__widget-content">
            <p>Sign up for industry alerts, our latest news, thoughts, and insights from Koira.</p>
            <form class="widget__newsletter-form">
              <div class="form-group mb-0">
                <input type="text" class="form-control" placeholder="Your Email Address">
                <button type="submit" class="btn btn__primary btn__hover2">
                  <i class="icon-arrow-right"></i>
                </button>
              </div>
            </form>
          </div>
          <p class="text-right fz-13 mt-20 mb-0">You may withdraw your consent at any time!</p>
        </div>-->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.footer-top -->
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <img src="{{ asset('front/images/logo/logo-footer.png') }}" alt="logo">
        </div><!-- /.col-lg-3 -->
        <div class="col-sm-12 col-md-9 col-lg-9 text-right">
          <div class="footer__copyright">
            <nav>
              <ul class="footer__copyright-links list-unstyled d-flex flex-wrap justify-content-end">
                <li><a href="{{ route('terms-and-condition') }}">Terms & Conditions </a></li>
                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                <!--<li><a href="#">Sitemap</a></li>
                <li><a href="#">Employee login</a></li>-->
              </ul>
            </nav>
            <p class="mb-0"> &copy; 2020 Ambica Enterprise, All Rights Reserved by
              <a href="http://AmbicaEnterprise.com">Ambica Enterprise</a>
            </p>
          </div><!-- /.Footer-copyright -->
        </div><!-- /.col-lg-9 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.Footer-bottom -->
</footer><!-- /.Footer -->
<button id="scrollTopBtn"><i class="fa fa-long-arrow-up"></i></button>

<div class="module__search-container">
  <i class="fa fa-times close-search"></i>
  <form class="module__search-form">
    <input type="text" class="search__input" placeholder="Type Words Then Enter">
    <button class="module__search-btn"><i class="fa fa-search"></i></button>
  </form>
</div><!-- /.module-search-container -->
