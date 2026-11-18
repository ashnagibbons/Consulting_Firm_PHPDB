<?php require "contact_handler.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Infinite IT Consulting - Streamline and secure your business operations"/>
    <title>Infinite IT Consulting</title>
    <link rel="stylesheet" href="fontawesome-5.5/css/all.min.css" />
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="stylesheet" href="magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
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
  top: 100%;                   /* sits directly under the link */
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

/* Show the menu on mouse hover, or when tapped / tabbed to */
.tm-dropdown:hover .tm-dropdown-menu,
.tm-dropdown:focus-within .tm-dropdown-menu {
  display: block;
}

.tm-dropdown-menu a {
  display: block;
  padding: 10px 20px;
  color: #3a6496;              /* change to match your nav link color */
  white-space: nowrap;
  text-decoration: none;
}

.tm-dropdown-menu a:hover,
.tm-dropdown-menu a:focus {
  background: #eef3f9;
}

/* On small screens, show the items in the menu flow instead of floating */
@media (max-width: 991px) {
  .tm-dropdown-menu {
    position: static;
    border: none;
    box-shadow: none;
    padding-left: 15px;
  }
}

/* Contact form messages: solid boxes so they stay readable on the photo background */
.tm-form-msg {
  margin: 0 0 20px;
  padding: 14px 18px;
  border-radius: 4px;
  background: #fff;
  list-style: none;
}
.tm-form-ok  { color: #1e6b3a; border-left: 5px solid #2e9d57; }
.tm-form-err { color: #a12a2a; border-left: 5px solid #d64545; }
.tm-form-err li + li { margin-top: 4px; }

    </style>
<!--
Tooplate 2117 Infinite Loop
https://www.tooplate.com/view/2117-infinite-loop
-->

  </head>
  <body>    
    <!-- Hero section -->
    <section id="infinite" class="text-white tm-font-big tm-parallax">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-md tm-navbar" id="tmNav" aria-label="Main navigation">
        <div class="container">
          <a href="#infinite" class="navbar-brand">Infinite IT</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon" aria-hidden="true"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link tm-nav-link" href="#infinite">Home</a></li>
              <li class="nav-item"><a class="nav-link tm-nav-link" href="#whatwedo">Services</a></li>
              <li class="nav-item"><a class="nav-link tm-nav-link" href="#testimonials">About</a></li>
              <li class="nav-item"><a class="nav-link tm-nav-link" href="#gallery">Pricing</a></li>
              <li class="nav-item"><a class="nav-link tm-nav-link" href="#contact">Contact</a></li>
              <li class="nav-item tm-dropdown">
                <span class="nav-link tm-nav-link" tabindex="0">Coursework</span>
                <ul class="tm-dropdown-menu">
                  <li><a class="external" href="loop_assignment.php">Assignment 1: Loops</a></li>
                  <li><a class="external" href="index.php#contact">Assignment 2: Contact Form</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="text-center tm-hero-text-container">
        <div class="tm-hero-text-container-inner">
            <h2 class="tm-hero-title">Infinite IT Consulting</h2>
            <p class="tm-hero-subtitle">
              Streamline and secure your business operations
              <br>Offering a range of services for your business needs
            </p>
        </div>        
      </div>

      <div class="tm-next tm-intro-next">
        <a href="#whatwedo" class="text-center tm-down-arrow-link">
          <i class="fas fa-2x fa-arrow-down tm-down-arrow"></i>
        </a>
      </div>      
    </section>

    <section id="whatwedo" class="tm-section-pad-top">
      
      <div class="container">

            <div class="row tm-content-box"><!-- first row -->
                <div class="col-lg-12 col-xl-12">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4 tm-section-title">What We Do</h2>
                        <p class="mb-4 tm-intro-text">
                          We provide a comprehensive range of IT consulting services designed to help your business thrive in the digital landscape.</p>
                    </div>
                </div>

            </div><!-- first row -->
            
            <div class="row tm-content-box"><!-- second row -->
        		<div class="col-lg-1">
                    <i class="far fa-3x fa-chart-bar text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Full IT Management</h2>
                        <p class="mb-4 tm-intro-text">
                          We ensure that your IT infrastructure is fully managed, allowing you to focus on your core business activities.</p>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <i class="far fa-3x fa-comment-alt text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Remote Support</h2>
                        <p class="mb-4 tm-intro-text">
                          We provide remote support services to ensure that your IT systems are always accessible and operational, no matter where you are.</p>
                    </div>
                </div>

            </div><!-- second row -->
            
            <div class="row tm-content-box"><!-- third row -->
        		<div class="col-lg-1">
                    <i class="fas fa-3x fa-fingerprint text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Cybersecurity</h2>
                        <p class="mb-4 tm-intro-text">
                      We provide comprehensive cybersecurity solutions to protect your business from potential threats and ensure the safety of your data.</p>
                          
                          <div class="tm-continue">
                            <a href="#testimonials" class="tm-intro-text tm-btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <i class="fas fa-3x fa-users text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                      <h2 class="tm-text-primary mb-4">Network Support</h2>
                        <p class="mb-4 tm-intro-text">
                       We provide reliable network support services to keep your business connected and operational, ensuring minimal downtime and maximum efficiency.</p>
                          
                          <div class="tm-continue">
                            <a href="#testimonials" class="tm-intro-text tm-btn-primary">Details</a>
                        </div>
                    </div>
                </div>

            </div><!-- third row -->

        </div>
      
    </section>
    
    <section id="testimonials" class="tm-section-pad-top tm-parallax-2">      
      <div class="container tm-testimonials-content">
        <div class="row">
          <div class="col-lg-12 tm-content-box">
            <h2 class="text-white text-center mb-4 tm-section-title">Testimonials</h2>
            <p class="mx-auto tm-section-desc text-center">
                Nulla dictum sem non eros euismod, eu placerat tortor lobortis. Suspendisse id velit eu libero pellentesque interdum. Etiam quis congue eros.
              </p>
            <div class="mx-auto tm-gallery-container tm-gallery-container-2">
              <div class="tm-testimonials-carousel">
                <figure class="tm-testimonial-item">
                  <img src="img/testimonial-img-01.jpg" alt="Image" class="img-fluid mx-auto">
                  <blockquote>This background image includes a semi-transparent overlay layer. This section also has a parallax image effect.</blockquote>
                  <figcaption>Catherine Win (Designer)</figcaption>
                </figure>

                <figure class="tm-testimonial-item">
                  <img src="img/testimonial-img-02.jpg" alt="Image" class="img-fluid mx-auto">
                  <blockquote>Testimonial section comes with carousel items. You can use Infinite Loop HTML CSS template for your websites.</blockquote>
                  <figcaption>Dual Rocker (CEO)</figcaption>
                </figure>

                <figure class="tm-testimonial-item">
                  <img src="img/testimonial-img-03.jpg" alt="Image" class="img-fluid mx-auto">
                  <blockquote>Nulla finibus ligula nec tortor convallis tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus.</blockquote>
                  <figcaption>Sandar Soft (Marketing)</figcaption>
                </figure>

                <figure class="tm-testimonial-item">
                  <img src="img/testimonial-img-04.jpg" alt="Image" class="img-fluid mx-auto">
                  <blockquote>Curabitur rutrum pharetra lobortis. Pellentesque vehicula, velit quis eleifend fermentum, erat arcu aliquet neque.</blockquote>
                  <figcaption>Oliva Htoo (Designer)</figcaption>
                </figure>

                <figure class="tm-testimonial-item">
                  <img src="img/testimonial-img-02.jpg" alt="Image" class="img-fluid mx-auto">
                  <blockquote>Integer sit amet risus et erat imperdiet finibus. Nam lacus nunc, vulputate id ex eget, euismod auctor augue.</blockquote>
                  <figcaption>Jacob Joker (CTO)</figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tm-bg-overlay"></div>
    </section>
    
    <section id="gallery" class="tm-section-pad-top">
      <div class="container tm-container-gallery">
        <div class="row">
          <div class="text-center col-12">
              <h2 class="tm-text-primary tm-section-title mb-4">Gallery</h2>
              <p class="mx-auto tm-section-desc">
                Praesent sed pharetra lorem, blandit convallis mi. Aenean ornare elit ac metus lacinia, sed iaculis nibh semper. Pellentesque est urna, lobortis eu arcu a, aliquet tristique urna.
              </p>
          </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mx-auto tm-gallery-container">
                    <div class="grid tm-gallery">
                      <a href="img/gallery-img-01.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-01.jpg" alt="Image 1" class="img-fluid">
                          <figcaption>
                            <h2><i>Physical Health <span>Exercise!</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-02.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-02.jpg" alt="Image 2" class="img-fluid">
                          <figcaption>
                            <h2><i>Rain on Glass <span>Second Image</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-03.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-03.jpg" alt="Image 3" class="img-fluid">
                          <figcaption>
                            <h2><i><span>Sea View</span> Mega City</i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-04.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-04.jpg" alt="Image 4" class="img-fluid">
                          <figcaption>
                            <h2><i>Dream Girl <span>Thoughts</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-05.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-05.jpg" alt="Image 5" class="img-fluid">
                          <figcaption>
                            <h2><i><span>Workstation</span> Offices</i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-06.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-06.jpg" alt="Image 6" class="img-fluid">
                          <figcaption>
                            <h2><i>Just Above <span>The City</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-01.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-01.jpg" alt="Image 7" class="img-fluid">
                          <figcaption>
                            <h2><i>Another <span>Exercise Time</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="img/gallery-img-02.jpg">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="img/gallery-tn-02.jpg" alt="Image 8" class="img-fluid">
                          <figcaption>
                            <h2><i>Repeated <span>Image Spot</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                    </div>
                </div>                
            </div>        
          </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="tm-section-pad-top tm-parallax-2">
    
      <div class="container tm-container-contact">
        
        <div class="row">
            
            <div class="text-center col-12">
                <h2 class="tm-section-title mb-4">Contact Us</h2>
                <p class="mb-5">
                  Proin enim orci, tincidunt quis suscipit in, placerat nec est. Vestibulum posuere faucibus posuere. Quisque aliquam velit eget leo blandit egestas. Nulla id posuere felis, quis tristique nulla.
                </p><br>
            </div>
            
            <div class="col-sm-12 col-md-6">
              <!-- =========================================================
                   ALL-IN-ONE CONTACT FORM
                   The form is rendered here, and it submits back to this same
                   page (index.php). The processing logic that reads the $_POST
                   autoglobal is in contact_handler.php, loaded on line 1.
                   ========================================================= -->

              <!-- Confirmation after a successful submission -->
              <?php if ($success): ?>
                <div class="tm-form-msg tm-form-ok">
                  <strong><?= htmlspecialchars($success) ?></strong><br>
                  <?= htmlspecialchars($mailNote) ?>
                </div>
              <?php endif; ?>

              <!-- Validation errors, if any -->
              <?php if (!empty($errors)): ?>
                <ul class="tm-form-msg tm-form-err">
                  <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <!-- action = this same page (the textbook's self-submitting pattern) -->
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#contact">
                <input id="name" name="name" type="text" placeholder="Your Name" class="tm-input" maxlength="100" required
                       value="<?= htmlspecialchars($name) ?>" />
                <input id="email" name="email" type="email" placeholder="Your Email" class="tm-input" maxlength="255" required
                       value="<?= htmlspecialchars($email) ?>" />
                <input id="subject" name="subject" type="text" placeholder="Subject" class="tm-input" maxlength="150" required
                       value="<?= htmlspecialchars($subject) ?>" />
                <textarea id="message" name="message" rows="8" placeholder="Message" class="tm-input" maxlength="2000" required><?= htmlspecialchars($message) ?></textarea>
                <button type="submit" class="btn tm-btn-submit">Submit</button>
              </form>
            </div>
            
            <div class="col-sm-12 col-md-6">

                <div class="contact-item">
                  <a rel="nofollow" href="https://www.tooplate.com/contact" class="item-link">
                      <i class="far fa-2x fa-comment mr-4"></i>
                      <span class="mb-0">Chat Online</span>
                  </a>              
                </div>
                
                <div class="contact-item">
                  <a rel="nofollow" href="mailto:mail@company.com" class="item-link">
                      <i class="far fa-2x fa-envelope mr-4"></i>
                      <span class="mb-0">mail@company.com</span>
                  </a>              
                </div>
                
                <div class="contact-item">
                  <a rel="nofollow" href="https://www.google.com/maps" class="item-link">
                      <i class="fas fa-2x fa-map-marker-alt mr-4"></i>
                      <span class="mb-0">Our Location</span>
                  </a>              
                </div>
                
                <div class="contact-item">
                  <a rel="nofollow" href="tel:0100200340" class="item-link">
                      <i class="fas fa-2x fa-phone-square mr-4"></i>
                      <span class="mb-0">255-662-5566</span>
                  </a>              
                </div>
                
                <div class="contact-item">&nbsp;</div>
            
            </div>
            
            
        </div><!-- row ending -->
        
      </div>

      	<footer class="text-center small tm-footer">
          <p class="mb-0">
          Copyright &copy; 2020 Company Name 
          
          . <a rel="nofollow" href="https://www.tooplate.com" title="HTML templates">Designed by TOOPLATE</a></p>
        </footer>

    </section>
    
    <script src="js/jquery-1.9.1.min.js"></script>     
    <script src="slick/slick.min.js"></script>
    <script src="magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>     
    <script src="js/bootstrap.min.js"></script> 
    <script>

      function getOffSet(){
        var _offset = 450;
        var windowHeight = window.innerHeight;

        if(windowHeight > 500) {
          _offset = 400;
        } 
        if(windowHeight > 680) {
          _offset = 300
        }
        if(windowHeight > 830) {
          _offset = 210;
        }

        return _offset;
      }

      function setParallaxPosition($doc, multiplier, $object){
        var offset = getOffSet();
        var from_top = $doc.scrollTop(),
          bg_css = 'center ' +(multiplier * from_top - offset) + 'px';
        $object.css({"background-position" : bg_css });
      }

      // Parallax function
      // Adapted based on https://codepen.io/roborich/pen/wpAsm        
      var background_image_parallax = function($object, multiplier, forceSet){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        // $object.css({"background-attatchment" : "fixed"});

        if(forceSet) {
          setParallaxPosition($doc, multiplier, $object);
        } else {
          $(window).scroll(function(){          
            setParallaxPosition($doc, multiplier, $object);
          });
        }
      };

      var background_image_parallax_2 = function($object, multiplier){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({"background-attachment" : "fixed"});
        
        $(window).scroll(function(){
          if($(window).width() > 768) {
            var firstTop = $object.offset().top,
                pos = $(window).scrollTop(),
                yPos = Math.round((multiplier * (firstTop - pos)) - 186);              

            var bg_css = 'center ' + yPos + 'px';

            $object.css({"background-position" : bg_css });
          } else {
            $object.css({"background-position" : "center" });
          }
        });
      };
      
      $(function(){
        // Hero Section - Background Parallax
        background_image_parallax($(".tm-parallax"), 0.30, false);
        background_image_parallax_2($("#contact"), 0.80);   
        background_image_parallax_2($("#testimonials"), 0.80);   
        
        // Handle window resize
        window.addEventListener('resize', function(){
          background_image_parallax($(".tm-parallax"), 0.30, true);
        }, true);

        // Detect window scroll and update navbar
        $(window).scroll(function(e){          
          if($(document).scrollTop() > 120) {
            $('.tm-navbar').addClass("scroll");
          } else {
            $('.tm-navbar').removeClass("scroll");
          }
        });
        
        // Close mobile menu after click 
        $('#tmNav a').on('click', function(){
          $('.navbar-collapse').removeClass('show'); 
          $('.navbar-toggler').attr('aria-expanded', 'false'); 
        })

        // Scroll to corresponding section with animation
        $('#tmNav').singlePageNav({
          'easing': 'easeInOutExpo',
          'speed': 600,
          'filter': ':not(.external)'
        });        
        
        // Add smooth scrolling to all links
        // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 600, 'easeInOutExpo', function(){
              window.location.hash = hash;
            });
          } // End if
        });

        // Pop up
        $('.tm-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          gallery: { enabled: true }
        });

        $('.tm-testimonials-carousel').slick({
          dots: true,
          prevArrow: false,
          nextArrow: false,
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2
              }
            }, 
            {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1
              }                 
            }
          ]
        });

        // Gallery
        $('.tm-gallery').slick({
          dots: true,
          infinite: false,
          slidesToShow: 5,
          slidesToScroll: 2,
          responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
        });
      });
    </script>
  </body>
</html>