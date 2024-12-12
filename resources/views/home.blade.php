@extends('layouts.home')

@section('container')
 <main>
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/pic4.jpg" class="d-block w-70" alt="...">
            <div class="carousel-caption d-none d-md-block mt-2">
              <h1>Mulai Hidup Sehat.</h1>
              <p class="opacity-20">Memahami, merawat, dan mengelola kesehatan  dengan bijaksana.</p>
              <p><a class="btn btn-lg btn-primary" href="/register">Sign up today</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/bg2.jpg" class="d-block w-70" alt="...">
            <div class="carousel-caption d-none d-md-block mt-2">
              <h1>Temukan Tips Hidup Sehat.</h1>
              <p>Jembatan yang menghubungkan individu dengan sumber daya yang diperlukan untuk menjalani gaya hidup yang sehat dan berdaya.</p>
              <p><a class="btn btn-lg btn-primary" href="/posts">Learn more</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/bg3.jpg" class="d-block w-70" alt="...">
            <div class="carousel-caption d-none d-md-block mt-2">
              <h1>Stayfit.</h1>
              <p>Informasi kesehatan yang akurat dan terpercaya.</p>
              <p><a class="btn btn-lg btn-primary" href="/posts">Browse stayfit</a></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button"
          data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button"
          data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container marketing">

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">Menu Sehat: <span class="text-body-secondary">" Kenikmatan Sayuran untuk Kesehatan Optimal".</span></h2>
            <p class="lead">Menjaga kesehatan dengan mengonsumsi beragam sayuran adalah langkah bijak untuk memastikan asupan nutrisi yang optimal bagi tubuh.</p>
          </div>
          <div class="col-md-5">
            <img src="img/pic5.jpg"
              class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
              alt="pic1" width="500" height="500" style="object-fit: cover;">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">Yoga: <span class="text-body-secondary"> Mengasah Kesehatan Tubuh dan Ketenangan Pikiran.</span></h2>
            <p class="lead">Melalui latihan yoga yang teliti dan kesadaran dalam setiap gerakan serta napas, kita tidak hanya meraih kebugaran fisik optimal, tetapi juga mencapai kedamaian batin yang mendalam.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img src="img/pic3.jpg"
              class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
              alt="pic1" width="500" height="500" style="object-fit: cover;">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">yang terakhir dan sangat penting.
              <span class="text-body-secondary">olahraga lari.</span></h2>
            <p class="lead">Lari memiliki sejumlah manfaat, seperti meningkatkan kesehatan jantung, mengurangi risiko penyakit kronis, menurunkan stres, membantu penurunan berat badan, memperkuat otot, dan meningkatkan kualitas tidur.</p>
          </div>
          <div class="col-md-5">
            <img src="img/pic1.jpg"
              class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
              alt="pic1" width="500" height="500" style="object-fit: cover;">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2023 Stayfit</p>
      </footer>
    </main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


@endsection
    
