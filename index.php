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
        <link rel="icon" href="images/mycal.png" type="image/x-icon">
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
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="loginadmin.php">Login</a></li>
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
                        Welcome to <br/> My Calorie
                    </h1>
                    <p class="header__title__paragraph text-center">
                        Stay fit by tracking your calories
                    </p>
                </div>
                <div class="js-to-Scroll">
                    <a href="#about" class="scroll__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551.14 295.1">
                            <path d="M545.4,5.6a19.47,19.47,0,0,0-27.53,0L275.74,248.43,33.13,5.6A19.48,19.48,0,0,0,5.6,33.17L261.49,289.3a19,19,0,0,0,13.77,5.7A19.82,19.82,0,0,0,289,289.3L544.93,33.17A19.11,19.11,0,0,0,545.4,5.6Z" transform="translate(0.1 0.1)"/>
                        </svg>
                    </a>
                </div>
            </section>
          </div>  
        </div>

        <div id="about">
          <div class="container">
            <h1 class="text-headings">About MyCalorie</h1>
            <p>
                Are you worried about your daily calorie intake ?? Don't worry. We are here to help you track your daily calorie intake details. You can also keep track of your daily food intake details using this application. This app helps you gain useful insights based on your food consumption details. So what are you waiting for?? Stay healthy with MyCalorie. MyCalorie is free and easy to use calorie tracking application.
            </p>
          </div>
        </div>
        

        <footer class="footer" id="contact">
          <div class="footer__addr">
            <h1 class="footer__logo">
              <img src="images/mycal.png" alt="MyCalorie Logo" height = "50px">
              MyCalorie
            </h1>
                
            <h2>Contact</h2>
            
            <address>
            Father Mullers Research Center, <br/>
            Father Muller's Rd, <br/>
            Kankanady, Mangalore, Karnataka 575002<br/>
            <a class="footer__btn" href="mailto:mycalorie@gmail.com">Email Us</a>
            <a class="footer__btn" href="tel:+919141201851">Call Us: +91 914 120 1851</a>
            </address>
          </div>
          
          <ul class="footer__nav">
            <li class="nav__item nav__item--extra">
              <h2 class="nav__title">Quick Links</h2>
        
              <ul class="nav__ul">
                <li>
                  <a href="#home">Home</a>
                </li>
                    
                <li>
                  <a href="#about">About</a>
                </li>

                <li>
                  <a href="loginadmin.php">Login</a>
                </li>
              </ul>
            </li>
          </ul>
          
          <div class="legal">
            <p>&copy; 2021 MyCalorie. All rights reserved.</p>
            
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