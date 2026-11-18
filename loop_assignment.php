<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Infinite IT Consulting - Assignment 1: Loops"/>
    <title>Assignment 1: Loops | Infinite IT</title>
    <link rel="stylesheet" href="fontawesome-5.5/css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <style>
      /* ---------- Coursework dropdown in the navbar (CSS only) ---------- */
      .tm-dropdown {
        position: relative;
      }

      .tm-dropdown > .nav-link::after {
        content: " \25BE";          /* small down arrow */
        font-size: 0.8em;
      }

      .tm-dropdown-menu {
        display: none;               /* hidden until hover or tap */
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 240px;
        margin: 0;
        padding: 8px 0;
        list-style: none;
        background: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        z-index: 1000;
      }

      .tm-dropdown:hover .tm-dropdown-menu,
      .tm-dropdown:focus-within .tm-dropdown-menu {
        display: block;
      }

      .tm-dropdown-menu a {
        display: block;
        padding: 10px 20px;
        color: #3a6496;
        white-space: nowrap;
        text-decoration: none;
      }

      .tm-dropdown-menu a:hover,
      .tm-dropdown-menu a:focus {
        background: #eef3f9;
      }

      @media (max-width: 991px) {
        .tm-dropdown-menu {
          position: static;
          border: none;
          box-shadow: none;
          padding-left: 15px;
        }
      }

      /* ---------- Assignment page layout ---------- */
      body.tm-assignment-page {
        background: #f4f6f9;         /* plain light background, no photo */
      }

      .tm-assignment-main {
        padding: 150px 0 60px;       /* leaves room for the fixed navbar */
      }

      .tm-assignment-intro {
        color: #555;
        margin-bottom: 30px;
      }

      /* Each question sits in its own card */
      .tm-question-card {
        height: 100%;
        padding: 24px;
        background: #fff;
        border: 1px solid #e3e8ef;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
      }

      .tm-question-card h3 {
        font-size: 1.4rem;
        color: #3a6496;
        margin-bottom: 6px;
      }

      .tm-question-desc {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 16px;
      }

      /* Loop output shown as a wrapped row of small number tiles */
      .tm-number-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
      }

      .tm-number {
        min-width: 40px;
        padding: 6px 10px;
        text-align: center;
        background: #eef3f9;
        color: #2c4a70;
        border-radius: 4px;
      }

      .tm-result {
        font-size: 1.6rem;
        font-weight: 600;
        color: #2c4a70;
      }
    </style>
<!--
Tooplate 2117 Infinite Loop
https://www.tooplate.com/view/2117-infinite-loop
-->
  </head>

  <body class="tm-assignment-page">

    <!-- Navigation: "scroll" gives it the solid white style from the template -->
    <nav class="navbar navbar-expand-md tm-navbar scroll" id="tmNav" aria-label="Main navigation">
      <div class="container">
        <a href="index.php#infinite" class="navbar-brand">Infinite IT</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars navbar-toggler-icon" aria-hidden="true"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="index.php#infinite">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="index.php#whatwedo">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="index.php#testimonials">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="index.php#gallery">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="index.php#contact">Contact</a>
            </li>
            <li class="nav-item tm-dropdown">
              <span class="nav-link tm-nav-link active" tabindex="0">Coursework</span>
              <ul class="tm-dropdown-menu">
                <li><a class="external" href="loop_assignment.php">Assignment 1: Loops</a></li>
                <li><a class="external" href="index.php#contact">Assignment 2: Contact Form</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="tm-assignment-main">
      <div class="container">
        <h2 class="tm-text-primary tm-section-title mb-3">Assignment 1: Loops</h2>
        <p class="tm-assignment-intro">Each result below is generated on the server by a PHP loop.</p>

        <div class="row">

          <!-- Question 1 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="tm-question-card">
              <h3>Question 1</h3>
              <p class="tm-question-desc">A <code>for</code> loop that prints the numbers 1 to 18.</p>
              <div class="tm-number-list">
                <?php
                for ($x = 1; $x <= 18; $x++) {
                    echo '<span class="tm-number">' . $x . '</span>';
                }
                ?>
              </div>
            </div>
          </div>

          <!-- Question 2 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="tm-question-card">
              <h3>Question 2</h3>
              <p class="tm-question-desc">A <code>while</code> loop that prints the numbers 1 to 27.</p>
              <div class="tm-number-list">
                <?php
                $x = 1;
                while ($x <= 27) {
                    echo '<span class="tm-number">' . $x . '</span>';
                    $x++;
                }
                ?>
              </div>
            </div>
          </div>

          <!-- Question 3 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="tm-question-card">
              <h3>Question 3</h3>
              <p class="tm-question-desc">A <code>do...while</code> loop that prints the numbers 1 to 15.</p>
              <div class="tm-number-list">
                <?php
                $x = 1;
                do {
                    echo '<span class="tm-number">' . $x . '</span>';
                    $x++;
                } while ($x <= 15);
                ?>
              </div>
            </div>
          </div>

          <!-- Question 4 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="tm-question-card">
              <h3>Question 4</h3>
              <p class="tm-question-desc">The sum of the odd numbers from 2 to 21.</p>
              <?php
              $sum = 0;
              for ($x = 2; $x <= 21; $x++) {
                  if ($x % 2 == 1) {
                      $sum += $x;
                  }
              }
              echo '<p class="tm-result">Sum: ' . number_format($sum) . '</p>';
              ?>
            </div>
          </div>

          <!-- Question 5 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="tm-question-card">
              <h3>Question 5</h3>
              <p class="tm-question-desc">The product of the even numbers from 3 to 17.</p>
              <?php
              $prod = 1;
              for ($x = 3; $x <= 17; $x++) {
                  if ($x % 2 == 0) {
                      $prod *= $x;
                  }
              }
              echo '<p class="tm-result">Product: ' . number_format($prod) . '</p>';
              ?>
            </div>
          </div>

        </div>
      </div>
    </main>

    <!-- Only jQuery and Bootstrap are needed here (for the mobile menu button).
         The home page's scrolling/parallax scripts are left out on purpose:
         they would block the nav links on this page. -->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
