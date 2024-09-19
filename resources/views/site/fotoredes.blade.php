<i class="header-toggle d-xl-none bi bi-list"></i>

<div class="profile-img">
  <img src="{{ Auth::user()->foto }}" alt="" class="img-fluid rounded-circle">
</div>

<a href="#" class="logo d-flex align-items-center justify-content-center">
  <!-- Uncomment the line below if you also wish to use an image logo -->
  <!-- <img src="assets/img/logo.png" alt=""> -->
  <p style="color:white">{{ Auth::user()->email }}</p>
</a>

<div class="social-links text-center">
  <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
  <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
</div>
