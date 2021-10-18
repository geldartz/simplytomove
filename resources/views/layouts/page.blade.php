<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Simply 2 Move</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <header id="header" class="fixed-top d-flex align-items-cente">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-center">
  
        <a href="/" class="logo me-auto me-lg-0"><img src="images/logo.png" alt="" class="img-fluid"></a>
  
        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#">FOR RENT</a></li>
            <li><a class="nav-link scrollto" href="#">FOR SALE</a></li>
            <li><a class="nav-link scrollto" href="#">FIND FLATMATES</a></li>
            <li><a class="nav-link scrollto" href="#">FIND AGENTS</a></li>
            <li><a class="nav-link scrollto" href="#">PROPERTY MANAGEMENT</a></li>
  
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <a href="#" class="post-ad-btn scrollto d-none d-lg-flex login-btn" data-toggle="modal" data-target="#loginModal">Login / Register</a>
        <a href="#" class="post-ad-btn d-none d-lg-flex">Post Your AD</a>
  
      </div>
    </header>
    <main id="main">
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
  </main>
    
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
  
            <div class="col-lg-3 col-md-6">
              <div class="footer-info">
                <img src="images/logo-footer.png" alt="">
                  <p class="preload-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda animi ad, deserunt autem expedita hic non dolorum voluptatem natus iure iste est! Harum repellendus perferendis ut, odit ab ipsa. Sapiente?</p>
                  <br>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Quick link</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">House for Rent</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">House for Sale</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Studio Flat</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Room for Share</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Single Room for Rent </a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Double Room for Rent </a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Ensuite Room for Rent </a></li>
                
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>About Us</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About Simply2move</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Simply2move Blog</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms and Condition</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy Policy</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">FAQs</a></li>
              </ul>
            </div>
  
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
  
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Simply2Move</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Developed by <a href="#">Developer</a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <div class="modal fade @error('email') with-error @enderror @error('password') with-error @enderror" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-body p-0">
                  <div class="row">
                  <div class="col-md-6 guilherme-stecanella">

                  </div>
                  <div class="col-md-6 p-0">
                      <div class="tabs">
      
                      <input type="radio" id="tab1" name="tab-control" checked>
                      <input type="radio" id="tab2" name="tab-control">

                      <ul>
                          <li title="Features"><label for="tab1" role="button"><span>Login</span></label>
                      </li>
                              <li title="Delivery Contents"><label for="tab2" role="button"><span>Register</span></label></li>
                      </ul>
                      
                      <div class="slider"><div class="indicator"></div></div>
                      <div class="content">
                          <section class="tab-container">
                          <div class="row">
                              <div class="col-sm-6 text-center">
                                  <a href="{{url('auth/redirect/facebook')}}" class="facebook-btn"><i class="bi bi-facebook"></i></a>
                              </div>
                              <div class="col-sm-6 text-center">
                              <a href="{{url('auth/redirect/google')}}" class="google-btn"><i style="font-size: 35px;" class="fa fa-google-plus-official" aria-hidden="true"></i></a>
                              </div>
                              
                              <div class="col-sm-12">
                              <span class="or-line">
                                  or
                              </span>
                              <form method="POST" action="{{ route('login') }}">
                                @csrf
                                  <div class="form-group mt-5 mb-3">
                                  <label for="exampleInputEmail1">Email</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                      </div>
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group mb-3">
                                  <label for="exampleInputEmail1">Password</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                      </div>
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                  <a class="lost-password" href="{{ route('password.request') }}">Lost your password?</a>
                                  </div>
                                  <button type="submit" class="btn btn-primary mt-4 btn-primary form-control">Submit</button>
                              </form>
                              </div>
                          </div>
                          </section>
                          <section class="tab-container">
                              <div class="row">
                                <div class="col-sm-6 text-center">
                                    <a href="{{url('auth/redirect/facebook')}}" class="facebook-btn"><i class="bi bi-facebook"></i></a>
                                </div>
                                <div class="col-sm-6 text-center">
                                <a href="{{url('auth/redirect/google')}}" class="google-btn"><i style="font-size: 35px;" class="fa fa-google-plus-official" aria-hidden="true"></i></a>
                                </div>
                                
                                <div class="col-sm-12">
                                <span class="or-line">
                                    or
                                </span>
                                <form method="POST" action="{{ route('register') }}">
                                  @csrf
                                  <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group mt-4 mb-1">
                                          <label for="exampleInputEmail1">First Name</label>
                                          <div class="input-group">
                                              <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="email" autofocus>
                                              @error('first_name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group mt-4 mb-1">
                                          <label for="exampleInputEmail1">Last Name</label>
                                          <div class="input-group">
                                              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="email" autofocus>
                                              @error('last_name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group mb-1">
                                      <label for="exampleInputEmail1">Email</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                          </div>
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                      <label for="exampleInputEmail1">Password</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                          </div>
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                          @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                      <label for="exampleInputEmail1">Confirm Password</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                          </div>
                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                      <label for="exampleInputEmail1">About Me</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                          </div>
                                          <select name="aboutme" class="form-control" id="">
                                              <option value="renter">I am looking to rent/Tenant</option>
                                              <option value="landlord">I have a property to let/Landlord</option>
                                              <option value="agent">I am an  agent/Agency</option>
                                              <option value="tenant">I want to share my room/Current Tenant</option>
                                          </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-1 btn-primary form-control">Sign Up</button>
                                    <p class="cookie">Simply2move send you email, email alerts with relevant offers and news. If you would like you can change the frequency of these emails or unsubscribe at any time through My Account.</p>
                                    <p class="cookie">By Clicking to Sign up you confirm that you are agree to our website <a href="#">Terms of use</a>, our <a href="#">Privacy policy</a> and consent to <a href="#">Cookies</a> being stored on your device.</p>
                                </form>
                                </div>
                            </div>
                          </section>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
          </div>
      </div>
  </div>
</div>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @auth
  <script>
      window.user = @json(auth()->user())
  </script>
@endauth
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ mix('/js/app.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>