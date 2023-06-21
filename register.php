<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js?v=2.0" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script src="assets/js/main.js?v=2.0"></script>

    <title>D4D - Register</title>


</head>

<body>

    <!-- Section: Design Block -->
    <section class="signup-page">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: #f5f5f5">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 custom-up">
                        <h1 class="my-5 display-3 fw-bold ls-tight LoginContent custom-signup-text">
                            Start Your Blogging Journey
                            <span class="text-primary LoginContent">With Us</span>
                        </h1>
                        <p style="color: #757f8e">
                            Blogging is a great way to show your talents and interests to prospective employers, while adding an edge to your resume. If you blog consistently it shows your dedication, passions and creativity – all of which are key attributes employers look for in
                            job candidates
                        </p>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <h1 class="login-welcome-back">Create an Account</h1>
                                <p>Join D4Developers Blogging</p>
                                <center>
                                    <hr>
                                </center>
                                <form>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" class="form-control" />
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4" id="Fieldpassword">
                                        <input type="password" id="password" class="form-control" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4" id="Fieldpassword">
                                        <input type="password" id="cpassword" class="form-control" />
                                        <label class="form-label" for="cpassword">Confirm Password</label>
                                    </div>

                                    <div class="form-outline mb-4" id="otpfield" hidden>
                                        <input type="text" id="otpcode" class="form-control" />
                                        <label class="form-label" for="otp">Enter your OTP</label>
                                    </div>

                                    <!-- backend response -->
                                    <p id="signup-resoinse"></p>

                                    <!-- Submit button -->
                                    <button type="button" id="sendOtpbtn" class="btn btn-primary btn-block mb-4 shadow-2">
                                        Send OTP <i class="fas fa-long-arrow-alt-right"></i>
                                    </button>

                                    <button hidden type="button" id="verifyOtp" class="btn btn-primary btn-block mb-4 shadow-2">
                                        Verify OTP <i class="fas fa-long-arrow-alt-right"></i>
                                    </button>

                                    <button hidden type="button" id="create_an_account" class="btn btn-primary btn-block mb-4 shadow-2">
                                        Register <i class="fas fa-long-arrow-alt-right"></i>
                                    </button>


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        Already have account? <a href="login.html" class="text-deco-none"> Login Here</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>