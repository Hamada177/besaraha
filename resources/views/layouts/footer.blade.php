<!-- [ Start Footer ] -->
<footer class="text-center text-white pt-4 mt-4" >
  <!-- Grid container -->
<div class="mt-4" style="background-color: var(--color-7);">


  <div class="container p-4 pb-0" >
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-dark btn-floating m-1 shadow"
        style="background-color: #3b5998;"
        href="#!"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-dark btn-floating m-1"
        style="background-color: #55acee;"
        href="#!"
        role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-dark btn-floating m-1"
        style="background-color: #dd4b39;"
        href="#!"
        role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-dark btn-floating m-1"
        style="background-color: #ac2bac;"
        href="#!"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn btn-dark btn-floating m-1"
        style="background-color: #0082ca;"
        href="#!"
        role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>
      <!-- Github -->
      <a
        class="btn btn-dark btn-floating m-1"
        style="background-color: #333333;"
        href="#!"
        role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->

  </div>
  <!-- Grid container -->

  <div class="row_footer col-md-7 m-auto">
    
    <a href="{{ route('index') }}">{{ __('footer.home') }}</a>
    <a href="{{ route('privacy') }}">{{ __('footer.privacy') }}</a>
    <a href="{{ route('contact') }}">{{ __('footer.contact') }}</a>
    <a href="w">{{ __('footer.developer') }}</a>

  </div>
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color:rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-white" href="https://islam-heiraten.com/">{{ config('app.url') }}</a>
  </div>
  <!-- Copyright -->

</div>
</footer>
