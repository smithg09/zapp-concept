<?php
    session_start();
    $msg = "DONE";
    
?>
<html lang="en">

<head>

        <!-- 
            Author: @Smith_Gajjar
            Title: qZapp. Concept Webpage.
            Date: 12 September 2019 
        -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="Scripts\main.js"></script>
    <script src="Scripts\jq.js"></script>
    <title>zzap.</title>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css?version2">
    <link rel="stylesheet" type="text/css" href="preloader.css">
    
</head>
<!-- Invoke toggle function on scroll to compress navigation bar -->
<body onscroll="toggle()" id="body">
<div class="preloader" id="preloader">
    <div class="loader">
        <svg viewBox="0 0 80 80">
            <circle id="test" cx="40" cy="40" r="32"></circle>
        </svg>
    </div>

    <div class="loader triangle">
        <svg viewBox="0 0 86 80">
            <polygon points="43 8 79 72 7 72"></polygon>
        </svg>
    </div>

    <div class="loader">
        <svg viewBox="0 0 80 80">
            <rect x="8" y="8" width="64" height="64"></rect>
        </svg>
    </div>
</div>

    <!-- 
        Display Upsupported message on screen size < 800 pixels
     -->
    <div class="unsupported">
        <h1>Not supported on mobile devices yet.</h1>
    </div>
    <main style="background:white">
    
    <!-- Navigation bar section -->
    <header class="col-12 angular-header">
         <span class="brand greetings greetings-scrolled " style="display: flex;justify-content: center;align-items: center;"> 
             <!-- Brand name -->
            <img src="images/slack.png" alt="new" style="position: relative;margin: 0;top: 4px;width: 70px;  height: 50px;">
             <span>z</span><span>z</span><span>a</span><span>p</span>.    
            <?php 
            if(isset($_SESSION["username"]))
            { 
                echo '<span class="welome" style="padding-left:14px;font-size:29px;color: #606060;font-weight: lighter;">' . $_SESSION["username"] . '</span>.<a  class="logout" style="font-size:20px;color: #606060;font-weight: lighter;">Logout</a>' ;
            }   
            ?>
        </span>
       
    <!-- Navigate -->
     <nav class="nav-1"> 
            <!-- Home route -->
            <a href="#" class="toggle" onclick="setHome()" style="font-weight: bold;text-decoration: none;margin: 0px 20px">Home</a>
            <!-- contact-us route -->
            <a href="#contact-us" style="scroll-behavior: smooth;font-weight: bold;text-decoration: none;color: #454545cb;margin:0px 20px" onmouseout="this.style.color='#454545cb'" onmouseover="this.style.color='#33415d'">Contact Us</a>
            <!-- Toggle Sign In route 
                Remove Illustration => Start animation => Display Sign In     
            -->
            <a href="#"
                style="scroll-behavior: smooth;font-weight: bold;text-decoration: none;color: #454545cb;margin:0px 20px"
                onmouseout="this.style.color='#454545cb'" onmouseover="this.style.color='#33415d'" onclick="toggle_login()">Sign In</a>
            
            <!--Registeration route  -->
            <a href="Registernew.php" style="text-decoration: none" class="Register">Sign Up</a>
        </nav>
    </header>

    <section style="padding-top:100px">
        <div class="heading" id="About">
            <!-- Brand Info -->
            <div class="sec1">
                <div class=" subheading" style="width:auto;height: auto;color: #363636; padding:60px 10px 40px 20px;font-weight: 600">
                    <span class="superscript">WE PROMISE THAT</span>
                    <div class="mainscript">
                        We work  with you to <br>solve your most critical<br>business priorities.
                    </div>
                    <div class="subscript">
                        We're a team of makers, thinkers, explorers and theatre singers, <br>play with  curiosity and experimentation, using what we learn to create<br>
                        meaningful digital products that connect with people.
                    </div>
                    <div class="link-buttons">
                         <button class="btn-learn" onClick="parent.open('https://dribbble.com/Saikatkumar')" style="outline: none">Learn more</button>
                        <button class="btn-gs" onclick="toggle_login()" style="outline: none">Get Started</button>
                    </div>
                </div>
            </div>
            <!-- Brand Illustration -->
            <div class="img-content" style="width:50%">
                <img id="myDIV" class=" illus" src="images/work.png" alt="new" style="display: block;width:90%; height:90%" >
            <!--  Sign In route-->
            
                <div class="main-login" style="display:none">
                    <span class="dummy">Sign in</span>
                    <span class="dummyUP"><a style="text-decoration: none" href="Registernew.php">Sign Up</a></span>
                    
                    <div class="Login" style="display: block">
                        <div class="animate">
                            <span class="h1">Welcome to <span class="subh1">zzap.</span></span>
                            <form name="contactForm" method="POST" action="login.php">
                                <!-- <input class="rg-input" name="name" type="text" placeholder="Name" /> -->
                                <!-- Error message  -->
                                <!-- <div class="error" id="nameErr"></div> -->
                                <input class="rg-input" name="login-email" id="login-email" placeholder="Email" onfocus="setstyle('login-email')" onblur="clearstyle('login-email')" />
                                <span class="err">Your Email Address</span>
                                <div class="error" id="emailErr"></div>
                                <input class="rg-input rg-input-anim" name="password" id="password" type="password" placeholder="Password"  onfocus="setstyle('password')" onblur="clearstyle('password')" />
                                <div class="error" id="mobileErr"></div>
                                 <br>
                                <button type="submit" id="submit"  class="btn-submit" placeholder="Sign In">Sign In</button>
                                <span class="forgot" style="font-weight: bold;letter-spacing: 1px;font-size: 13px;color:#585858;padding:20px 0px">Forget your password?</span>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand tag -->
        <div class="pg-2" style="width: 100%;display: flex;padding: 50px 30px 0px 40px; justify-content: center">
            <div class="pg-2-sub">
                WE DISCOVER
            </div>
            <div class="pg-2-main">
                We are committed to creating<br>positive change through<br>human-centred work
            </div>
            <img class="pg-2-img" src="images/2730921.jpg" alt="demo">
        </div>
        <!-- Brand commitment -->
        <div class="pg-3" style="width: 100%;display: flex;padding: 0px 50px 0px 40px; justify-content: center">
            <div class="main-content">
                <div class="main-sub">
                    We believe in what <br>people make possible
                </div>
                <div class="main-head-pg-3">
                    Our mission is to empower every person and every organization on the planet to achieve more.We help them grow at a higher rate compared to other oragnizations.
                    Our mission is to empower every person and every organization on the planet to achieve more.We help them grow at a
                    higher rate compared to other oragnizations.
                    Our mission is to empower every person and every organization on the planet to achieve more.We help them grow at a
                    higher rate compared to other oragnizations.
                    
                </div>
            </div>
                <img src="images/2598578.jpg" alt="demo2" style="width: 45%; height: 100%">
                
        </div>
    </section>
    <!-- Contact US  -->
    <div class="contact-us" id="contact-us">
        <div class="contact-head">
            Contact Us
        </div>
        <div class="form">
            <input type="text" class="name" name="name"  id="name" placeholder="Name" onfocus="setstyle('name')" onblur="clearstyle('name')">
            <input type="email" class="email" name="email" id="email" placeholder="Email" onfocus="setstyle('email')" onblur="clearstyle('email')">
            <textarea name="description" class="description" id="description" cols="30" rows="10" placeholder="Description" onfocus="setstyle('description')" onblur="clearstyle('description')"></textarea>
        </div>
        <button class="btn-gs contact-btn" id="contact" type="submit" style="outline: none">Send</button>
    </div>

    <!-- Customer Support element 
        Onclick -> Start Animation (To center) => Expand modal => Display message 
    -->

    <div class="info-collapsed">
        <img class="img" src="images/465293-PGDOIV-851.jpg"/>
        <div class="info-contact-us" id="contact-us" style="transition : all 0.6s;">
            <h1 style="width:700px">What is Lorem Ipsum?</h1>
            <span style="width: 985px;text-align: justify;padding-top: 29px;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
            dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
            book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span>
        </div>
    </div>

    <!-- Scroll to top of the page  -->
    <div class="scroll-top">
        <img class="img" src="images/scroll_top.svg" />
    </div>
    <!-- Webpage Footer Section  -->
    <footer class="angular-footer" >
        <div class="info">
                Made with  <img src="images/love.svg" style="margin: 10px 5px;width:25px;height: 45px"> </img>by Smith  
       </div>
       <!-- Social Accounts  -->
       <div class="social">
        <a href="https://www.linkedin.com/in/smith-gajjar-5a27716b/">
            <img class="social-block" src="images/linkedin.svg" style="width:30px; height:35px;" />
        </a> 
        <a href="https://www.facebook.com/smithgajjar">
            <img class="social-block" src="images/facebook (1).svg" style="width:30px; height:35px;" />
        </a> 
        <a href="https://twitter.com/smithgajjar3">
            <img class="social-block" src="images/twitter.svg" style="width:30px; height:35px;" />
        </a> 
        <a href="https://www.instagram.com/smith.gajjar09/?hl=en">
            <div class="instagram">
                <img class="insta" src="images/instagram.svg"  />
            </div>
        </a>
       </div>
    </footer>
    </main>
           
</body>

</html>