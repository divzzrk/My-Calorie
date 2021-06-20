<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/hero_image.css">
        <script src="scripts/hero_image.js"></script>
        <title>MyCalorie</title>
        <script> 
            $(function(){
              $("#includedContent").load("styles/header.html"); 
            });
        </script> 
        <style>
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <nav id="navigation vertical-center">
                    <a href="#" class="page-title">My Calorie</a>
                    <a aria-label="mobile menu" class="nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <ul class="menu-left">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#events">Events</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">Login/Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="home" class="home">
          <div class="appWrapper">    
            <section class="headerIntro bg">
              <div class="header__overlay"></div>
                <div class="header__title">
                    <div class="header__title__img__wrapper">
                    </div>
                    <h1 class="header__title__h1 text-center">
                        St. Aloysius College Alumni Association <br/> S.A.A.C.A
                    </h1>
                    <p class="header__title__paragraph text-center">
                        Welcome to Alumni Page of AIMIT
                    </p>
                </div>
                <div class="js-to-Scroll">
                    <a href="#events" class="scroll__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551.14 295.1">
                            <path d="M545.4,5.6a19.47,19.47,0,0,0-27.53,0L275.74,248.43,33.13,5.6A19.48,19.48,0,0,0,5.6,33.17L261.49,289.3a19,19,0,0,0,13.77,5.7A19.82,19.82,0,0,0,289,289.3L544.93,33.17A19.11,19.11,0,0,0,545.4,5.6Z" transform="translate(0.1 0.1)"/>
                        </svg>
                    </a>
                </div>
            </section>
          </div>  
        </div>

        <div id="events">
          <div class="container">
            <h1 class="text-headings">Upcoming Events</h1>
            <ul class="timeline">
              <li class="timeline-item" data-aos="fade-before-up" data-aos-duration="1000">
                <h2 class="timeline-year">22nd October, 2020</h2> 
                <p class="timeline-text">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.</p>
                <p class="timeline-text">A small river named Duden flows by their place.</p>
              </li>
              <li class="timeline-item" data-aos="fade-before-up" data-aos-duration="1000">
                <h2 class="timeline-year">23rd November, 2020 </h2> 
                <p class="timeline-text">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <p class="timeline-text">Operation.</p>
                <p class="timeline-text">I am alone, and feel the charm of existence in this spot.</p>
                <p class="timeline-text">Prevision: 2017.</p>
              </li>
              <li class="timeline-item" data-aos="fade-before-up" data-aos-duration="1000">
                <h2 class="timeline-year">31st December, 2020</h2> 
                <p class="timeline-text">It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer.</p>
              </li>
            </ul>
          </div>
        </div>

        <div id="about">
          <div class="container">
            <h1 class="text-headings">About Us</h1>
            <p>
              The Alumni Association of St Aloysius College has been very active and has been organizing regular meetings and get-togethers of the alumni of the Institution. 
              We would like to make a list of all the alumni of our college and the Staff. Kindly fill-in the form. 
              We would also appreciate your comments and suggestions. Please request other Aloysians to visit this site and register.
            </p>
          </div>
        </div>
        

        <footer class="footer" id="contact">
          <div class="footer__addr">
            <h1 class="footer__logo">
              <img src="images/logo.png" alt="Dispute Bills" height = "50px">
              St Aloysius College
            </h1>
                
            <h2>Contact</h2>
            
            <address>
            St Aloysius Institute of Management & 
            <br/>Information Technology<br/>
            Beeri, Kotekar, Mangaluru – 575 022<br>  
            <a class="footer__btn" href="mailto:admissions@staloysius.ac.in">Email Us</a>
            <a class="footer__btn" href="tel:+919141201851">Call Us: +91 914 120 1851</a>
            </address>
          </div>
          
          <ul class="footer__nav">
            <li class="nav__item">
              <h2 class="nav__title">Quick Links</h2>
        
              <ul class="nav__ul">
                <li>
                  <a href="#home">Home</a>
                </li>
        
                <li>
                  <a href="#events">Events</a>
                </li>
                    
                <li>
                  <a href="#about">About</a>
                </li>
              </ul>
            </li>
            
            <li class="nav__item nav__item--extra">
              <h2 class="nav__title">Our Institutions</h2>
              
              <ul class="nav__ul nav__ul--extra">
                <li>
                  <a href="#">AIMIT</a>
                </li>
                <li>
                  <a href="#">St Aloysius Degree College</a>
                </li>
                
                <li>
                  <a href="#">St Aloysius PU College</a>
                </li>
                
                <li>
                  <a href="#">St Aloysius High School</a>
                </li>
                
                <li>
                  <a href="#">St Aloysius Evening College</a>
                </li>
              </ul>
            </li>
            
            <li class="nav__item">
              <h2 class="nav__title">Legal</h2>
              <ul class="nav__ul">
                <li>
                  <a href="#">Privacy Policy</a>
                </li>
                <li>
                  <a href="#">Terms of Use</a>
                </li>
                <li>
                  <a href="#">Sitemap</a>
                </li>
              </ul>
            </li>
          </ul>
          
          <div class="legal">
            <p>&copy; 2020 AIMIT. All rights reserved.</p>
            
            <div class="legal__links">
              <span>Made with <span class="heart">♥</span> by Divya and Nijeesha</span>
            </div>
          </div>
        </footer>


        <script src="scripts/script.js"></script>
        <script>
          AOS.init();
        </script>
    </body>
</html>