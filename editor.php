<?php
    require('db.php');
    session_start();
    $temp_id = $_SESSION["template_id"];
    echo $temp_id;
    $query = "SELECT temp.temp_id, temp.temp_name as tempname, temp_images.img, temp_text.text_msg FROM templates as temp INNER JOIN temp_images ON temp_images.temp_id = temp.temp_id INNER JOIN temp_text ON temp_text.temp_id = temp.temp_id WHERE temp.temp_id='$temp_id'";
    $tempresult = mysqli_query($con,$query);
    // $row  = mysqli_fetch_array($tempresult);
    $emparray = array();
    while($row = mysqli_fetch_assoc($tempresult))
    {
        $emparray[] = $row;
    }
    
    $temp_name = $row['temp.tempname'];
    $_SESSION["template_name"] = $temp_name;
    
    
    // while
    ?>
    <script>
         var cur_template = <?php   echo json_encode($emparray); ?>;
        console.log(cur_template);
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
                echo '<span><script>document.write(cur_template[0].tempname)</script></span>' ;
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
                        <span style="font-size: 13px;color: #33415d;letter-spacing: 1.2px;font-weight: bolder;padding-top: 7px;"> <?php  echo $_SESSION["acc_type"] ?> account </span>
                    </div>
                    <div class="dropdown-divider"> </div>   
                    <a class="dropdown-item" href="accounts.php">Account Settings</a>
                    <a href="#" class="dropdown-item logout"
                            >Log out</a>
                </div>
        </div>
            
            <!--Registeration route  -->
            <!-- <a href="Registernew.html" style="text-decoration: none" class="Register">Sign Up</a> -->
        </nav>
    </header>

    
    <!-- Main Editor -->
    <div class="editorwrapper">
        <div class="sidebar" style="padding:16px;padding-top:81px">
            <span style="font-size: 25px; letter-spacing: 1px;font-weight: bolder;color: white;font-family: 'Varela Round', sans-serif;">Text properties</span>
            <input type="text" style="height:38px" class="rg-input" id="addtext" value='' placeholder="Enter Text to add" required>
            <input type="color" style="height:38px" class="rg-input" id="addcolor" value='#FFFFFF' placeholder="Enter color to add" required>
            <select name="size" style="height:38px;width: calc(100% - 30px)" class="rg-input-select" id="addsize">
                <option value="0.1">1</option>
                <option value="0.15">2</option>
                <option value="0.2">3</option>
                <option value="0.25">4</option> 
                <option value="0.3">5</option>
                <option value="0.35">6</option>
                <option value="0.4">7</option>
                <option value="0.45">8</option>
                <option value="0.5">9</option>
                <option value="0.55">10</option> 
                <option value="0.6">11</option>
                <option value="0.65">12</option>
            </select>
            <!-- <input type="size" id="addsize" value='' type='number' placeholder="Enter size to add"> -->
            <button class="editor-btn"   onclick="add_media('title')">Add Title</button><br>
            
            <span style="font-size: 25px; letter-spacing: 1px;font-weight: bolder;color: white;font-family: 'Varela Round', sans-serif;">Images </span><br>
            <!-- <input type="text" style="height:38px" class="rg-input" id="addimage" value='' placeholder="Enter Text to add" required> -->
            <div class="addimg">
                <button style="outline:none" class="btn-image" id="Birthday" onclick="add_media('Birthday')" value="birthday.jpg">Birthday</button>
                <button style="outline:none" class="btn-image" id="NoteBook" onclick="add_media('NoteBook')" value="build.jpg">NoteBook</button>
                <button style="outline:none" class="btn-image" id="Frog" onclick="add_media('Frog')" value="frog.jpg">Frog</button>
                <button style="outline:none" class="btn-image" id="Working" onclick="add_media('Working')" value="cor.jpg">Working Employees</button>
                <button style="outline:none" class="btn-image" id="Dentist" onclick="add_media('Dentist')" value="dental.jpg">Dentist</button> 
                <button style="outline:none" class="btn-image" id="Dussehra" onclick="add_media('Dussehra')" value="duss.jpg">Dussehra</button>
                <button style="outline:none" class="btn-image" id="Gandhi"onclick="add_media('Gandhi')" value="gandhi.jpg">Gandhi</button>
                <!-- <button style="outline:none" class="btn-image" id="Birthday" onclick="add_media('Dentist')" value="dental.jpg">Dentist</button>  -->
                <button style="outline:none" class="btn-image" id="Online" onclick="add_media('Online')" value="oncourse.jpg">Online Course ad</button> 
                <button style="outline:none" class="btn-image" id="Globe" onclick="add_media('Globe')" value="globe.jpg">Globe</button>
                <button style="outline:none" class="btn-image" id="Instagram" onclick="add_media('Instagram')" value="instagram.svg">Instagram</button>
                <button style="outline:none" class="btn-image" id="New" onclick="add_media('New')" value="newyear.jpg">New Year</button>
                <button style="outline:none" class="btn-image" id="Air" onclick="add_media('Air')" value="photo-1504596217249-cef2ad2d6b53.jpg">Air Ballons</button>
                <button style="outline:none" class="btn-image" id="Robot" onclick="add_media('Robot')" value="robo.jpg">Robot</button>
                <button style="outline:none" class="btn-image" id="School" onclick="add_media('School')" value="school.jpg">Back To School</button>
                <button style="outline:none" class="btn-image" id="Gif" onclick="add_media('Gif')" value="cas.gif">Gif</button>

            </div>
            <!-- <button class="editor-btn" onclick="add_media('frog')">Add Images</button>
            <button class="editor-btn" onclick="add_media('custom')">Add Images</button> -->
        </div>
        <div class="maineditorsec">
            <div class="videowrapper" style="border: none;border-radius: 8px;overflow: hidden;">
                <canvas id='mm-canvas'></canvas>
                <textarea style="display:none" id='mm-textarea'></textarea>
            </div>
            <div style="display:flex;flex-direction:column;align-items:center">
                <input type="range" style="padding:0" step="0.001" value="0" min="0" max="1" oninput="mm_player.position=this.value" />
                <button class="editor-btn" onclick="mm_player.paused = !mm_player.paused">Play/Pause</button>
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
<script> 
        $(document).ready(() => {
            setTimeout(() => {
                add_media('title',cur_template[0].text_msg);
                add_media('cable',cur_template[0].img); 
            }, 600);
        })
    </script>
    <!-- Scroll to top of the page  -->
    <div class="scroll-top">
        <img class="img" src="images/scroll_top.svg" />
    </div>
</main>
    
</body>

</html>