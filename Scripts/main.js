/*
    Author: @Smith_Gajjar
    Title: Zapp.Concept (Javascript min).
    Date: 12 September 2019
*/


function doLoginnow(){
    setTimeout(function () {
        $("#myForm").submit();
    }, 5000);

}


//Accounts Updation scripts.
var chcan = false;
function updatedetails(inputid) {
    
            if (!chcan) {
                chcan = true;
                document.getElementById(inputid).disabled = false;
                document.getElementById(inputid).innerText = "Cancel";
            }
            else {
                chcan = false;
                document.getElementById(inputid).disabled = true;
                document.getElementById(inputid).innerHTML = "Change";

            }
}
// Check login credentials on submit
function doLogin() {
    var email = document.getElementById("login-email").value;
    var password = document.getElementById("password").value;

    if(email == "smith.gajjar@gmail.com") {
        if(password == "5mnfvco49090"){
            alert("Login Successfull");
        }
        else {
            alert("Incorrect Password");
        }
    }
    else if (email == "sakshipatel@gmail.com") {
        if (password == "sakshidulari") {
            alert("Login Successfull");
        }
        else {
            alert("Incorrect Password");
        }
    }
    else {
        alert("Login Failed");
    }
}

// Change to default Home after firing home btn  
var toggleLogin = true;
function setHome() {
    document.querySelector('.main-login').style.display = 'none';
        document.getElementById('myDIV').style.display = 'block';
        document.querySelector('.img-content').style.justifyContent = 'none';
        document.querySelector('.img-content').style.marginTop = '0';
        // document.querySelector('.img-content').style.Bottom = '0';
        toggleLogin = true;
}
// Toggle login element on firing sign in btn 
function toggle_login() {
    if(toggleLogin == true){
        document.querySelector('.main-login').style.display = 'block';
        document.querySelector('.img-content').style.justifyContent = 'center';
        document.querySelector('.img-content').style.marginTop = '50px';
        // document.querySelector('.img-content').style.Bottom = "-50px";
        document.getElementById('myDIV').style.display = 'none';
        toggleLogin = false;
    }
    else {
        document.querySelector('.main-login').style.display = 'none';
        document.getElementById('myDIV').style.display = 'block';
        document.querySelector('.img-content').style.justifyContent = 'none';
        document.querySelector('.img-content').style.marginTop = '0';
        // document.querySelector('.img-content').style.Bottom = '0';
        toggleLogin = true;
    }

}

//Set Form style on focus
function setstyle(styleid) {
    document.getElementById(styleid).style.borderWidth= '1px';
    document.getElementById(styleid).style.borderColor = '#33415d';
    document.getElementById(styleid).style.borderStyle = 'solid';
    // document.getElementById(styleid).classList.toggle("input-border");
}

//Clear Form style on blur
function clearstyle(styleid) {
    document.getElementById(styleid).style.borderWidth = '1px';
    document.getElementById(styleid).style.borderColor = 'transparent';
    document.getElementById(styleid).style.borderStyle = 'solid';
}

//Change Navigation bar style on scroll : Add box-shadow and adjust elements
function toggle() {

    var body = document.querySelector("body");
    var scrollTop = body.scrollTop;
        /*
            When Scrolled
        */
    if (scrollTop >= 100) {
        var header = document.querySelector('.angular-header');
        document.querySelector('.angular-header').classList.add('scrolled');
        header.style.justifyContent = "left";
        header.style.height = '65px';
        header.style.padding = '0px';
        document.querySelector('.greetings-scrolled').classList.remove('greetings');
        document.querySelector('.toggle').classList.add('active');
        document.querySelector('.scroll-top').style.opacity = "1";
    } else if (scrollTop < 100) {
        /*
            Default View 
        */
        var header = document.querySelector('.angular-header');
        document.querySelector('.angular-header').classList.remove('scrolled');
        header.style.justifyContent = "space-between";
        header.style.height = '95px';
        header.style.padding = '20px';
        document.querySelector('.greetings-scrolled').classList.add('greetings');
        document.querySelector('.toggle').classList.remove('active');
        document.querySelector('.scroll-top').style.opacity = "0";
        
    }

}    
    
//Expand Customer Support button on click 
// var expanded = false;
// function expand() {
//     if (expanded) {
//     document.querySelector(".info-collapsed").classList.remove('animate-info');
//         var info = document.querySelector(".img");
//         setTimeout(() => {
//         info.style.display = 'block';
            
//         }, 800);
//     //     var span = document.querySelector(".span-1");
//     //         span.innerHTML = "Inline Css";
//         expanded = false;
//         return
//     }   
//     expandedTO();
    
// }

// function expandedTO() {
//     document.querySelector(".info-collapsed").classList.add('animate-info');
//     var info = document.querySelector(".img");
//     info.style.display= 'none';
//     // var span = document.querySelector(".span-1");
//     // info.classList.add('info-expanded');
//     // setTimeout(() => {
//     //     // span.innerHTML = "An inline style may be used to apply a unique style for a single element.";
//     // }, 800);
//     this.expanded = true;
// }