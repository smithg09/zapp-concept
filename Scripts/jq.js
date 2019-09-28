/*
    Author: @Smith_Gajjar
    Title: Zapp.Concept (Jquery min).
    Date: 12 September 2019
*/
$chcan = false;
$(document).ready(() => {
    $(".usernamechange").click(() => {
        if (!$chcan) {
            $chcan = true;
            $(".usernamechangeinput").removeAttr("disabled");
            $(".usernamechange").html("Cancel");
        }
        else {
            $chcan = false;
            $(".usernamechangeinput").attr("disabled", true);
            $(".usernamechange").html("Change"); 
        }
    })
})

$(window).on('load', function () {
    setTimeout(function () {
        console.log("Windows load event done!");
        $('.preloader').fadeOut('slow');
        $('body').css("overflow", "visible");    
    }, 1000); // set the time here
});



//Expand Customer Support element on click | Add Animation => Display Lorem Ipsum message => Remove Animation
$(document).ready(() => {
    $(".logout").click(function () {
        if (confirm("Do you want to logout")) {
            window.open('logout.php', "_self");
        }
        else {
            return false;
        }
    })
})

$expanded = false;
$(document).ready(function () {
    $(".info-collapsed").click(function () {
            $(".info-collapsed").toggleClass("animate-info");
            setTimeout(() => {
                $(".info-collapsed").toggleClass("expand-info");
                setTimeout(() => {
                    $(".img").toggleClass("img-hidden");
                    $(".info-contact-us").toggleClass("info-contact-us-new");
                }, 300);

            }, 850); 
            return;
    });
});

// ToolTip on Contact us form for input details.

// Name input field
$(document).ready(function () {
    $(".name").hover(function () {
        $(this).css('cursor', 'pointer').attr('title', 'Please enter your name!');
    });
})

// Description input field
$(document).ready(function () {
    $(".description").hover(function () {
        $(this).css('cursor', 'pointer').attr('title', 'Please elaborate reason for contacting us');
    });
})


//Change  Email input field Css on multiple events
$(document).ready(function () {
    $(".email").on({
        mouseenter: function () {
            $(this).css('cursor', 'pointer').attr('title', 'Please enter your email!');
        },
        click: function () {
            $(this).css("box-shadow", "0px 0px 5px rgba(0,0,0,0.4)");
        },
        blur: function () {
            $(this).css("box-shadow", "none");
        } 
    });
})

//Scroll to top of the page.
$(document).ready(() => {
    $(".scroll-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
})
