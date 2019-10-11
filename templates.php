<?php
    require('db.php');
    session_start();
    $type = $_SESSION['acc_type'];
    if($type == 'premium') {
        $query = "SELECT * FROM `templates` ";
    }
    else {
        $query = "SELECT * FROM `templates` WHERE acc_type = '$type' ";
    }

    $tempresult = mysqli_query($con,$query);
    $emparray = array();
    while($row =mysqli_fetch_assoc($tempresult))
    {
        $emparray[] = $row;
    }

    // while
?>

<html lang="en">

<head>

        <!-- 
            Author: @Smith_Gajjar
            Title: qZapp. Concept Webpage.
            Date: 12 September 2019 
        -->

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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="templatestyle.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="preloader.css">
    
</head>
<!-- Invoke toggle function on scroll to compress navigation bar -->
<body id="body" style="display:block">
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
    <main >
    
    <!-- Navigation bar section -->
    <header class="col-12 angular-header2">
         <span class="brand greetings" style="padding: 0px 10px;font-size:29px;display: flex;justify-content: center;align-items: center;"> 
             <!-- Brand name -->
            <!-- <span>z</span><span>z</span><span>a</span><span>p</span>.     -->
            <span>Welcome</span>
            <?php 
            if(isset($_SESSION["username"]))
            { 
                echo '<span class="welome" style="padding-left:8px;font-size:29px">' . $_SESSION["name"] . '</span>' ;
            }   
            ?>
        </span>
       
    <!-- Navigate -->
     <nav class="nav-1"> 
            <!-- Home route -->
            <!-- <a href="#" class="toggle" onclick="setHome()" style="font-weight: bold;text-decoration: none;margin: 0px 20px">Home</a> -->
            <!-- contact-us route -->
            <!-- <a href="#contact-us" style="scroll-behavior: smooth;font-weight: bold;text-decoration: none;color: #454545cb;margin:0px 20px" onmouseout="this.style.color='#454545cb'" onmouseover="this.style.color='#33415d'">Contact Us</a> -->
            <!-- Toggle Sign In route 
                Remove Illustration => Start animation => Display Sign In     
            -->
            <div class="dropdown show">
                
                <a class="dropdown-toggle account" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="border:none;box-shadow:0px 0px 10px rgba(200,200,200,0.8);left:-10px !important">
                    <div classhttps://github.com/smithg09/zapp-website="dropdown-item" style="margin:0px 19px;display: flex;flex-direction:column;font-size: 15px;align-items: center;justify-content:center;letter-spacing: 1px;font-weight: lighter;">
                        <a class="account-in account" href="#"> </a>
                        <span style=""> <?php  echo $_SESSION["username"] ?> </span>
                        <span style="font-size: 13px;color: #33415d;letter-spacing: 1.2px;font-weight: bolder;padding-top: 7px;"> <?php  echo $_SESSION["acc_type"] ?> account </span>
                    </div>
                    <div class="dropdown-divider"> </div>   
                    <a href="#" class="dropdown-item logout">Log out</a>
                    <a class="dropdown-item" href="accounts.php">Account Settings</a>
                </div>
        </div>
            
            <!--Registeration route  -->
            <!-- <a href="Registernew.html" style="text-decoration: none" class="Register">Sign Up</a> -->
        </nav>
    </header>

    <section class="temp_sec" style="padding-top:100px;min-height: 100vh">
            <h1 class="temp">Pick a Template</h1>
            
            <form action="templateroute.php" method="POST" style="margin-top:0"> 
                <div id="main-content" style="min-height:50vh">
                
                </div>
                <button type="submit" class="temp_submit"> Next 🙄 </button>
            </form>

    </section>

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
    <script>
        var list =  <?php   echo json_encode($emparray); ?>;
        console.log(list);
        //    var list = [
        //     {
        //         name: 'SYNC', 
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/IMG-20181109-WA0002_1543151044776.jpg.jpg",
        //     },
        //     {
        //         name: 'DONE',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/robo.jpg",
        //     },
        //     {
        //         name: 'BIRTHDAY',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/cor.jpg",
        //     },
        //     {
        //         name: 'PULLOUTS',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/2730921.jpg",
        //     }, {
        //         name: 'NEWDAY',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/2598578.jpg",
        //     }, {
        //         name: 'ORCS',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/465293-PGDOIV-851.jpg",
        //     }, {
        //         name: 'PYHROA',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/char.png",
        //     }, {
        //         name: 'MOBILE',
        //         content: "This is your workspace, you can create videos from scratch or <br> you can use our predefined templates to build quik Videos or your own story.<br> <h4>World’s most versatile video creator for Quick & Professional videos.</h4>",
        //         imgurl: "images/work.png",
        //     }
        // ];

        // console.log(list);

        function myFunction() {
            
            // var p = document.getElementsByClassName("head");
            // var image = document.getElementsByClassName("image");
            // var container = document.getElementsByClassName("container");

            list.forEach(element => {
                var node = document.getElementById("main-content");
                var maincontainer = document.createElement("div");
                maincontainer.classList.add("maincontainer");

                var container = document.createElement("div");
                container.classList.add("container");

                var input = document.createElement("input");
                input.classList.add("hidden-radio");
                input.setAttribute("name","templates");
                input.setAttribute("type","radio");
                input.setAttribute("value",element.temp_id);
                input.required = true;

                var p = document.createElement("p");
                p.innerHTML = element.temp_name;
                p.classList.add("template_name");

                var img = document.createElement("img");
                img.setAttribute("src",'images/'+ element.dis_img + '.jpg');
                img.classList.add('img-temp');
                if(element.acc_type == 'premium' )   {
                    var premiumelem = document.createElement('p');
                    premiumelem.classList.add('premiumdiv');
                    premiumelem.innerHTML = '&#x2605;';
                    container.appendChild(premiumelem);  
                }
                container.appendChild(p);
                container.appendChild(img);
                maincontainer.appendChild(input);

                maincontainer.appendChild(container);

                node.appendChild(maincontainer);
                
            })

        }

        myFunction();
    </script>
</body>

</html>