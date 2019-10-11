<?php
    require('db.php');
    session_start();
    $acc_id = $_SESSION['acc_id'];
    // echo $acc_id;
    $userquery = "SELECT * FROM `users` WHERE acc_id ='$acc_id'";
    $userresult = mysqli_query($con,$userquery);
    $userrow    = mysqli_fetch_array($userresult);
    $emparray = array();
    while($row = mysqli_fetch_assoc($userresult))
    {   
        $emparray[] = $row;
        // echo $row[0];
    }
?>
<script> 
    var user_detail = <?php   echo json_encode($userrow); ?>;
    console.log(user_detail);
</script>
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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
</head>
<!-- Invoke toggle function on scroll to compress navigation bar -->
<body >
    <!-- 
        Display Upsupported message on screen size < 800 pixels
     -->
    <div class="unsupported">
        <h1>Not supported on mobile devices yet.</h1>
    </div>
    <main>
    
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
                
                <a class=" dropdown-toggle account" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <div classhttps://github.com/smithg09/zapp-website="dropdown-item">
                        <a class="account" href="#"> </a>
                        <span> <?php  echo $_SESSION["username"] ?> </span>
                    </div>
                    <div class="dropdown-divider"> </div>   
                    <a href="#" class="dropdown-item logout"
                            style="font-size:16px;scroll-behavior: smooth;font-weight: bold;text-decoration: none;color: #454545cb;"
                            onmouseout="this.style.color='#454545cb'" onmouseover="this.style.color='#33415d'">Log out</a>
                    <!-- <a class="dropdown-item" href="accounts.php">Account Settings</a> -->
                </div>
        </div>
        
            
            <!--Registeration route  -->
            <!-- <a href="Registernew.html" style="text-decoration: none" class="Register">Sign Up</a> -->
        </nav>
    </header>
        <section class="temp_sec" style="padding-top:100px">
            <div class="accounts-heading">
                <h1 class="temp" style="font-size:40px;display:flex; align-items:baseline">Account  Settings</h1>
                <h5 style="font-size:17px;color: grey;letter-spacing:1px;padding-bottom:10px">Change your profile and account settings</h3>
            </div>
            <div class="accounts-wrapper" >
                <div class="accdetails">
                <a class="account" href="#"> </a>
                <hr>
                    <div class="username">
                        <span class="userheader"> USERNAME </span>
                        <div class="inputwrapper">
                            <input type="text" class="username userinput usernamechangeinput" id=" usernamechangeinput" value="new"  disabled>
                        </div>
                    </div>
                    <div class="username">
                        <span class="userheader"> EMAIL </span>
                        <div class="inputwrapper">
                            <input type="text" class="email userinput" id=" emailchangeinput" placeholder="smith" value="<?php echo user_detail[0].email ?>" disabled>
                            <span style="margin-left: 20px;color: #969696;cursor: pointer;font-size: 15px;" onclick="updatedetails('emailchangeinput')">Change</span>
                            <span class="usernamechange" style="margin-left: 20px;color: #969696;cursor: pointer;padding:5px;font-size: 15px;border-radius: 4px;border: 1.2px solid lightgrey;">Submit</span>
                        </div>
                    </div>
                    <div class="username">
                        <span class="userheader"> PASSWORD </span>
                        <div class="inputwrapper">
                            <input type="password" value="" class="password userinput" id=" passchangeinput" value="<?php echo user_detail[0].password ?>" disabled>
                            <span style="margin-left: 20px;color: #969696;cursor: pointer;font-size: 15px;" onclick="updatedetails('passchangeinput')">Change</span>
                            <span class="usernamechange" style="margin-left: 20px;color: #969696;cursor: pointer;padding:5px;font-size: 15px;border-radius: 4px;border: 1.2px solid lightgrey;">Submit</span>
                        </div> 
                    </div>
                    <div class="username">
                        <span class="userheader"> ACCOUNT TYPE </span>
                        <div class="inputwrapper" style="display:flex">
                            <input type="text" class="userinput acc_type" id=""  disabled>
                            <span style="margin-left: 20px;color: #969696;font-weight:bold;cursor: pointer;font-size: 15px;"><a href="pricing.php" style="font-weight: bold">Upgrade</a></span>
                        </div> 
                    </div>
                    <div class="username">
                        <span class="userheader"> ACCOUNT ID </span>
                        <div class="inputwrapper">
                            <input type="text" class="userinput acc_id" id="acc_id" disabled>

                        </div> 
                    </div>
                    <div class="username">
                        <span class="userheader"> PHONE NUMBER </span>
                        <div class="inputwrapper">
                            <input type="text" class="userinput phnochangeinput phoneno" id="phoneno" disabled>
                            <span style="margin-left: 20px;color: #969696;cursor: pointer;font-size: 15px;" onclick="updatedetails('phnochangeinput')">Change</span>
                            <span class="usernamechange" style="margin-left: 20px;color: #969696;cursor: pointer;padding:5px;font-size: 15px;border-radius: 4px;border: 1.2px solid lightgrey;">Submit</span>
                        </div> 
                    </div>
                </div>
                <div class="teamdetails" style="margin-top:20px">
                    <h1 class="temp" style="margin-bottom: 21px;font-size:40px;display:flex; align-items:baseline" >Team</h1>
                    <div class="username">
                        <span class="userheader"> TEAM NAME </span>
                        <div class="inputwrapper">
                            <input type="text" class="userinput usernamechangeinput" disabled>
                           
                        </div>
                    </div>
                    <div class="username">
                        <span class="userheader"> TEAM ID </span>
                        <div class="inputwrapper">
                            <input type="text" class="userinput" placeholder="smith" disabled>
                            <span style="margin-left: 20px;color: #969696;cursor: pointer;font-size: 15px;">Change</span>
                            <span class="usernamechange" style="margin-left: 20px;color: #969696;cursor: pointer;padding:5px;font-size: 15px;border-radius: 4px;border: 1.2px solid lightgrey;">Submit</span>
                        </div>
                    </div>
                    <div class="username">
                        <span class="userheader"> TEAM MEMBERS </span>
                        <span style="font-size: 14px;color: grey;letter-spacing: 1px;background: #eeeeee;border-radius: 3px;width: fit-content;padding: 7px 10px 10px 10px;margin:10px 10px">Smith Gajjar </span>
                        <span style="font-size: 14px;color: grey;letter-spacing: 1px;background: #eeeeee;border-radius: 3px;width: fit-content;padding: 7px 10px 10px 10px;margin:10px 10px">Amay Chug </span>
                        <span style="font-size: 14px;color: grey;letter-spacing: 1px;background: #eeeeee;border-radius: 3px;width: fit-content;padding: 7px 10px 10px 10px;margin:10px 10px">Jatin Bhagchandani </span>
                        <span class="addmember" >Add member</span>
                    </div>
                </div>
            </div>
        </section>

        <script>
            $(window).on('load',function () {
                
                $('.username').val(user_detail.username);
                $('.email').val(user_detail.email);
                $('.password').val(user_detail.password);
                $('.acc_type').val(user_detail.acc_type);
                $('.acc_id').val(user_detail.acc_id);
                $('.phoneno').val(user_detail.phone_no);
            })

        </script>
    </body>
</html>