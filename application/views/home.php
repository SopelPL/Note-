<?php require_once("../config/autoload.php"); ?>
<?php if(isLogged()){header("Location: " . U_VIEWS . "desktop/dashboard.php"); exit();} ?>
<?php require_once("layouts/default/header.php"); ?>
<?php require_once("layouts/default/footer.php"); ?>

    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Nie trać karteczek na notatki!<br> Notuj online!</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <a href="#iconsSection" class="btn btn-primary smooth-link">Zobacz jakie to proste...</a>
          </div>
        </div>
      </div>
    </header>

    <section class="features-icons bg-light text-center" id="iconsSection">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
              <h3>Pełna responsywność</h3>
              <p class="lead mb-0">Nasza strona jest w 100% dostosowana do każdego urządzenia dzięki czemu notowanie będzie jeszcze łatwiejsze!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-lock m-auto text-primary"></i>
              </div>
              <h3>Bezpieczeństwo</h3>
              <p class="lead mb-0">Dbamy o twoje bezpieczeństwo, dlatego gromadzimy tylko potrzebne dane!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <h3>Prostota</h3>
              <p class="lead mb-0">Korzystanie z serwisu jest bardzo proste! Przyjazny układ elementów ułatwia poruszanie się po stronie.</p>
            </div>
          </div>

            <a href="#imagesSection" style="width:100%;margin:0 auto;font-size:2em;" class="btn btn-link smooth-link"><i class="fa fa-sort-down"></i></a>

        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase" id="imagesSection">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://awaremeditationapp.com/wp-content/uploads/2017/05/aaron-burden-123584-1.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Notuj kiedy chcesz i ile chcesz!</h2>
            <p class="lead mb-0">U nas nie musisz się o nic martwić, gdyż nie nakładamy żadnych limitów! Uważamy, że swoboda to podstawa, dlatego nie musisz zamartwiać się o to ile notatek możesz jeszcze utworzyć! </p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('https://www.forexexplore.com/images/brokers-do-not-pay.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Nie musisz za nic płacić!</h2>
            <p class="lead mb-0">Korzytstanie z serwisu jest w pełni darmowe! Nie wymagamy danych kart płatniczych, gdyż nie oferujemy płatnych usług</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Nie trać czasu!<br> Dołącz już teraz i ciesz się swobodą!</h2>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <a class="btn btn-success" data-toggle="modal" data-target="#registerModal" href="#">Dołącz już teraz!</a>
          </div>
        </div>
      </div>
    </section>
<?php require_once("layouts/default/modals.php"); ?>