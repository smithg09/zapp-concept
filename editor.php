<?php
    require('db.php');
    session_start();
    $temp_id = $_SESSION["template_id"];
    $query = "SELECT * FROM `templates` WHERE temp_id='$temp_id'";
    $tempresult = mysqli_query($con,$query);
    $row  = mysqli_fetch_array($tempresult);
    $temp_name = $row['temp_name'];
    $_SESSION["template_name"] = $temp_name;
    // while
    ?>
    <script> 
     var template_name = "<?php echo $temp_name?>";
     console.log(template_name);
    </script>
<html lang="en">

<head>

        <!-- 
            Author: @Smith_Gajjar
            Title: qZapp. Concept Webpage.
            Date: 12 September 2019 
        -->
    <script src="moviemasher/node_modules/opentype.js/dist/opentype.min.js"></script>
    <script src="moviemasher/node_modules/scriptjs/dist/script.min.js"></script>
    <script src="moviemasher/node_modules/tiny-inflate/index.js"></script>
    <script src="moviemasher/dist/moviemasher.min.js"></script>
    <script src="app.js"></script>
    <style>canvas, textarea { width: 320px; height: 240px; }</style>
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
<link rel="stylesheet" type="text/css" href="editorstyle.css">
    
</head>
<!-- Invoke toggle function on scroll to compress navigation bar -->
<body id="body" style="display:block" onload='mm_load()'>
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
    
<main style="height:100vh;overflow:hidden">
    
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
        <span class="welome" style="padding-left: 8px;font-size: 21px;transition: all 200ms;text-rendering: optimizeLegibility;color: #33415d;font-family: 'Varela Round', sans-serif;font-style: normal;padding: 0px 10px;font-weight: 600;" >
            Template : 
            <?php 
            if(isset($_SESSION["template_id"]))
            { 
                echo '<span >' . $_SESSION["template_name"] . '</span>' ;
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
                
                <a class=" dropdown-toggle account" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="border:none;box-shadow:0px 0px 10px rgba(200,200,200,0.8);left:-10px !important">
                    <div classhttps://github.com/smithg09/zapp-website="dropdown-item" style="margin:0px 19px;display: flex;flex-direction:column;font-size: 15px;align-items: center;justify-content:center;letter-spacing: 1px;font-weight: lighter;">
                        <a class="account-in account" href="#"> </a>
                        <span style=""> <?php  echo $_SESSION["username"] ?> </span>
                    </div>
                    <div class="dropdown-divider"> </div>   
                    <a href="#" class="dropdown-item logout"
                            >Log out</a>
                    <a class="dropdown-item" href="accounts.php">Account Settings</a>
                </div>
        </div>
            
            <!--Registeration route  -->
            <!-- <a href="Registernew.html" style="text-decoration: none" class="Register">Sign Up</a> -->
        </nav>
    </header>

    
    <!-- Main Editor -->
    <div class="editorwrapper">
        <div class="sidebar" style="padding-top:81px">
            <span style="font-size:15px;color:white"> Add text</span>
            <input type="text" id="addtext" value='' placeholder="Enter Text to add">
            <button onclick="add_media('title')">Add Title</button>
            <button onclick="add_media('cable')">Add Cable</button>
            <button onclick="add_media('frog')">Add Frog</button>
            <button onclick="add_media('globe')">Add Globe</button>
        </div>
        <div class="maineditorsec">
            <div class="videowrapper">
                <canvas id='mm-canvas'></canvas>
                <textarea style="display:none" id='mm-textarea'></textarea>
            </div>
            <div style="display:flex;flex-direction:column">
                <input type="range" step="0.001" value="0" min="0" max="1" oninput="mm_player.position=this.value" />
                <button onclick="mm_player.paused = !mm_player.paused">Play/Pause</button>
            </div>
        </div>
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
</main>
    
</body>

</html>