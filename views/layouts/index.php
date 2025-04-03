<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

use models\Users;
use core\Core;
/**@var string $Title */
/**@var string $Content */
if (empty($Title))
  $Title = '';
if (empty($Content))
  $Content = '';

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="/css/layout.css/layout.css" rel="stylesheet">
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/site/index" class="nav-link px-2 text-secondary"><img src="/img/imgForAds/Pizza.jpg" style="width:70px;height:44px;"></a></li>
          <li><a href="/site/index" class="nav-link px-2 text-secondary">Головна</a></li>
          <li><a href="/products/index?page=0" class="nav-link px-2 text-white">Асортимент</a></li>
          <?php if (Users::IsUserLoged()) :?>
          <li><a href="/basket/index" class="nav-link px-2 text-white">Кошик</a></li>
          <?php endif;?>
        </ul>
        
        <div class="text-end">
          <?php if (!Users::IsUserLoged()) :?>
          <button type="button" class="btn btn-outline-light me-2" onclick="location.href='/user/login'">Вхід на сайт</button>
          <?php endif;?>
          <?php if (Users::IsUserLoged()) :?>
          <button type="button" class="btn btn-outline-light me-2" onclick="location.href='/user/logout'">Вийти</button>
          <?php endif;?>
          <?php if (!Users::IsUserLoged()) :?>
          <button type="button" class="btn btn-warning" onclick="location.href='/user/register'">Реєстрація</button>
          <?php endif;?>
        </div>
        <?php if (Users::IsUserLoged()) :?>
        <ul class="navbar-nav">
        <?php endif;?>
      </ul>
      </div>
    </div>
  </header>



  <div>
  <?=$Content?>
  </div>



  <div class="content-wrapper">
        <div class="container">
            <!-- Your page content here -->
        </div>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/site/index" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="/site/index#about-section" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2024 Company, FishDream</p>
        </footer>
    </div>
</body>
</html>