$(document).ready(function() {
    $("#create_an_account").click(function() {
        signUp();
    });
    $("#SignIn_button").click(function() {
        signIn();
    });
    $("#sendOtpbtn").click(function() {
        sendOtp();
    });
    $("#verifyOtp").click(function() {
        verifyOtp();
    });
    $("#checkAvability").click(function() {
        searchBlogAvability();
    });
    $("#POST").click(function() {
        ckEditorContent();
    });
});


function signUp() {
    $("#signup-resoinse").html("");

    var email = $("#email").val();
    var password = $("#password").val();

    if (email == "") {
        $("#signup-resoinse").html("Please enter your email");
    } else if (password == "" || cpassword == "") {
        $("#signup-resoinse").html("Please Enter a password");
    } else {
        $("#email").attr("disabled", true);

        //
        $.ajax({
            url: "./functions/signUp.php",
            type: "POST",
            data: "email=" + email + "&password=" + password,

            success: function(result) {
                $("#signup-resoinse").html(result);
                console.log(result);
                $("#create_an_account").html("Create");
                $("#create_an_account").attr("disabled", false);
                sendConfirmatinEmail();
            }
        });
    }


}

function sendConfirmatinEmail() {
    var email = $("#email").val();

    $.ajax({
        url: "./functions/sendEmailFunction.php",
        type: "POST",
        data: "userEmail=" + email,
        success: function(result) {
            if (result == "success") {
                $("#signup_response").html("Login and Welcome email has been send Successfully.");
            }
        }
    });
}


function sendOtp() {
    $("#signup-resoinse").html("");
    var email = $("#email").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();

    if (email == "") {
        $("#signup-resoinse").html("Please enter your email");
    } else if (password == "" || cpassword == "") {
        $("#signup-resoinse").html("Please Enter a password");
    } else if (password !== cpassword) {
        $("#signup-resoinse").html("Both password must be same.");
    }

    //
    else {
        $("#email").attr("disabled", true);
        $("#signup-resoinse").html("Please Wait...");
        $("#sendOtpbtn").attr("disabled", true);

        $.ajax({
            url: "./functions/sendOtp.php",
            type: "POST",
            data: "email=" + email,

            success: function(result) {
                if (result == "success") {
                    $("#signup-resoinse").html("Please check your inbox!");
                    $("#sendOtpbtn").attr("hidden", true);
                    $("#verifyOtp").attr("hidden", false);
                    $("#otpfield").attr("hidden", false);

                } else {
                    $("#email").attr("disabled", false);
                    $("#sendOtpbtn").attr("disabled", false);
                    $("#signup-resoinse").html(result);
                }
            }
        })
    }
}

function verifyOtp() {
    $("#signup-resoinse").html("");

    var otp = $("#otpcode").val();

    if (otp == "") {
        $("#signup-resoinse").html("Please Enter OTP");
    } else if (email == "") {
        $("#signup-resoinse").html("Please enter your email");
    }

    //
    else {
        $("#signup-resoinse").html("please Wait..");
        $("#otpcode").attr("disabled", true);
        $("#verifyOtp").attr("disabled", true);

        $.ajax({
            url: "./functions/verifyOtp.php",
            type: "POST",
            data: "otp=" + otp,

            success: function(result) {
                if (result == "success") {
                    $("#signup-resoinse").html("Verified Successfully!");
                    $("#verifyOtp").attr("hidden", true);
                    $("#create_an_account").attr("hidden", false);
                    $("#otpfield").attr("hidden", true);


                } else {
                    $("#signup-resoinse").html(result);
                }
            }
        });
    }
}

function signIn() {
    $("#signIn_response").html("");
    var email = $("#email").val();
    var password = $("#password").val();

    if (email == "" || password == "") {
        $("#signIn_response").html("Both fields are required!");
    }

    // Else------->
    else {
        $("#SignIn_button").html("Please Wait...");
        $("#SignIn_button").attr("disabled", true);

        $.ajax({
            url: "./functions/signIn.php",
            type: "POST",
            data: "email=" + email + "&password=" + password,

            success: function(result) {
                $("#signIn_response").html(result);
            }
        });
    }
}

function searchBlogAvability() {
    $("#search_response").html("");

    var blogName = $("#blog_name").val();
    var userID = $("#userId").val();

    if (blogName == "") {
        $("#search_response").html("Please Choose a blog Name");
    }

    // 
    else {
        $("#search_response").html("Please wait...");

        $.ajax({
            url: "./functions/blogAvability.php",
            type: "Post",
            data: "blog_name=" + blogName + "&userId=" + userID,

            success: function(result) {
                if (result == "success") {
                    $("#search_response").css("color", "green");
                }

                $("#search_response").html(result).css("color", "red");


            }
        });
    }
}

function ckEditorContent() {
    $("#blog_data").bind("keyup", function() {
        $("#post_response").text($(this).val());
    });

}