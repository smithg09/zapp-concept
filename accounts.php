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

    $teamquery = "SELECT * FROM `teams` WHERE acc_id ='$acc_id'";
    $teamresult = mysqli_query($con,$teamquery);
    $team    = mysqli_fetch_array($teamresult);
    $teamarray = array();
    while($row = mysqli_fetch_assoc($teamresult))
    {   
        $teamarray[] = $row;
        // $_SESSION['teamname'] = $row['team_name'];
        // $_SESSION['teamid'] = $row['team_id'];
        // $teamidnewget = $row['team_id'];
                
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
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="border:none;box-shadow:0px 0px 10px rgba(200,200,200,0.8);left:-10px !important">
                    <div classhttps://github.com/smithg09/zapp-website="dropdown-item" style="margin:0px 19px;display: flex;flex-direction:column;font-size: 15px;align-items: center;justify-content:center;letter-spacing: 1px;font-weight: lighter;">
                        <a class="account-in account" href="#"> </a>
                        <span style=""> <?php  echo $_SESSION["username"] ?> </span>
                        <span style="font-size: 13px;color: #33415d;letter-spacing: 1.2px;font-weight: bolder;padding-top: 7px;"> <?php  echo $_SESSION["acc_type"] ?> account </span>
                    </div>
                    <div class="dropdown-divider"> </div>   
                    <!-- <a class="dropdown-item" href="accounts.php">Account Settings</a> -->
                    <a href="#" class="dropdown-item logout"
                            >Log out</a>
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
                            <!-- <span style="margin-left: 20px;color: #969696;cursor: pointer;font-size: 15px;" onclick="updatedetails('emailchangeinput')">Change</span> -->
                            <!-- <span class="usernamechange" style="margin-left: 20px;color: #969696;cursor: pointer;padding:5px;font-size: 15px;border-radius: 4px;border: 1.2px solid lightgrey;">Submit</span> -->
                        </div>
                    </div>
                    <form action="updatepass.php" method="POST" style="margin: 0px;;padding: 0px;flex-direction: none;align-items: end;justify-content: none;">
                    <div class="username">
                        <span class="userheader"> PASSWORD </span>
                        <div class="inputwrapper">
                            
                            <input type="password" value="" name="re_password" class="password userinput" id="passchangeinput" value="<?php echo user_detail[0].password ?>"  disabled>
                            <span id="passchangespan" style="margin-left: 20px;color: #969696;cursor: pointer;font-size: 15px;" onclick="updatedetails('passchangeinput','passchangespan')">Change</span>
                            <input  type="submit" class="usernamechange" style="height: 34px;line-height: 1;width: 70px;margin-left: 20px;color: #969696;cursor: pointer;padding:5px;font-size: 15px;border-radius: 4px;border: 1.2px solid lightgrey;">
                        </div> 
                    </div>
                    </form>
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
                                                    </div> 
                    </div>
                </div>
                    <div class="teamdetails" style="margin-top:20px;margin-bottom:20px">
                        <h1 class="temp" style="margin-bottom: 21px;font-size:40px;display:flex; align-items:baseline" >Team</h1>
                        <?php
                         
                            
                            if($team) {
                                ?>
                                <script> 
                                    var team_detail = <?php   echo json_encode($team); ?>;
                                    console.log(team_detail);
                                </script>
                                <div class="username">
                                    <span class="userheader"> TEAM NAME </span>
                                    <div class="inputwrapper">
                                        <input type="text" class="teamnameinput userinput usernamechangeinput"  disabled>
                                    
                                    </div>
                                </div>
                                <div class="username">
                                    <span class="userheader"> TEAM ID </span>
                                    <div class="inputwrapper">
                                        <input type="text" class="teamidinput userinput"  disabled>
                                        </div>
                                </div>
                                <?php 
                                $teamidnew = $_SESSION['teamid'];
                                // echo $teamidnewget;
                                    $userteam = "SELECT t.team_name,t.team_id,u.email FROM teams as t INNER JOIN users as u ON t.acc_id = u.acc_id WHERE t.team_id='$teamidnew'";
                                    $userteamresult = mysqli_query($con,$userteam);
                                    $userteamfetch    = mysqli_fetch_array($userteamresult);
                                    $userteamarray = array();
                                    while($row = mysqli_fetch_assoc($userteamresult))
                                    {   
                                        $userteamarray[] = $row;
                                        // $_SESSION['teamname'] = $row['team_name'];
                                        // $_SESSION['teamid'] = $row['team_id'];
                                        // echo $row[0];
                                    }
                                ?>
                                <script>
                                    var userteam_detail = <?php   echo json_encode($userteamarray); ?>;
                                    console.log(userteam_detail);
                                </script>
                                <div class="username">
                                    <span class="userheader" id="userheader" > TEAM MEMBERS </span>
                                        <script>
                                           $(document).ready(() => {
                                               userteam_detail.forEach( element => {
                                                     var teamspan = document.createElement("div");
                                                    teamspan.classList.add("teammember");
                                                    teamspan.innerText = element.email;
                                                    var userheader = document.getElementById("userheader");
                                                    userheader.appendChild(teamspan);
                                                 })   
                                            })
                                        </script>
                                    <button type="button" style="outline:none" class="create-team-btn">Add member</button>
                                        <form class="teamForm" style="overflow:hidden;display:none" action="addmember.php" method="POST">
                                            <!-- <input class="rg-input" name="team-id" id="login-email" placeholder="Team Id" onfocus="setstyle('login-email')" onblur="clearstyle('login-email')" />  -->
                                            <input class="rg-input rg-input-anim" name="username-team" id="password" type="text" placeholder="Username"  onfocus="setstyle('password')" onblur="clearstyle('password')" />
                                            <button style="margin:10px 0px" type="submit" id="submit"  name="btn-team" class="btn-submit"  placeholder="Sign In">Create</button>
                                            
                                        </form>
                                </div>
                        <?php
                            }
                            else { 
                        ?>
                        <div class="team-btn" style="display: flex;flex-direction:column;justify-content: center;align-items:center">
                            <p style="color: #878787;font-size: 16px;margin: 10px;">
                            No associated team found &#128533;. Please create one !  
                            </p>
                            <button type="button" style="outline:none" class="create-team-btn">Create Team</button>
                            <form class="teamForm" style="overflow:hidden;display:none" action="createTeam.php" method="POST">
                                <input class="rg-input" name="team-id" id="login-email" placeholder="Team Id" onfocus="setstyle('login-email')" onblur="clearstyle('login-email')" /> 
                                <input class="rg-input rg-input-anim" name="team-name" id="password" type="text" placeholder="Team name"  onfocus="setstyle('password')" onblur="clearstyle('password')" />
                                <button style="margin:10px 0px" type="submit" id="submit"  name="btn-team" class="btn-submit"  placeholder="Sign In">Create</button>
                                
                            </form>
                        </div>
                        <?php 
                            }
                        ?>
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
                $('.teamnameinput').val(team_detail.team_name);
                $('.teamidinput').val(team_detail.team_id);
            })

        </script>
    </body>
</html>