<?php
session_start();

//checks if already logged in
if (isset($_SESSION['id'])) {
  header("Location: /purenotes/home");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login|PureNotes</title>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <div class="header">

      <div class="img">
        <div class="overlay">
            <div class="content">


              <div class="left-side">
                <div class="white-overlay">
                  <img src="images/LOGO.png" alt="Logo">
                      <div class="heading">
                    <h5><i>"Your notes are safer than a seatbelt"</i></h5>
                    <p>So sit tight and <br>type with <b id="bold">PURENOTES</b></p>
                      </div>
                </div>
                <div class="body">
                  <h3 class="sign-in">Sign in</h3>
                  <h3 class="register">Register</h3>
                </div>

              </div>


<!-- Signin form-->
              <div class="right-side-signin">
                <h3>Enter your information</h3>
                <form id="signin">

                  <div class="btm-border">
                    <label>Username</label>
                    <input class="input" type="text" id="uidin">
                      <span class="border"></span>
                  </div>

                  <div class="btm-border">
                    <label>PASSWORD</label>
                    <input class="input" type="password" id="pwdin">
                      <span class="border"></span>
                  </div>
                  <h4 id="error"></h4>
                  <div class="body">
                    <input type="submit" id="signinBtn" value="Sign in">
                    <input type="button" id="clearBtn" value="Clear Inputs">
                  </div>
                </form>
              </div>
<!-- register form-->
              <div class="right-side-register">
                <h3>fill in the fields</h3>
                
                <form id="register">

                  <div class="btm-border">
                    <label>Full Name</label>
                    <input class="input" type="text" id="fullnamein">
                      <span class="border"></span>
                  </div>

                  <div class="btm-border">
                    <label>Email Address</label>
                    <input class="input" type="text" id="emailin">
                      <span class="border"></span>
                  </div>

                  <div class="btm-border">
                    <label>Username</label>
                    <input class="input" type="text" id="uidin-reg">
                      <span class="border"></span>
                  </div>

                  <div class="btm-border">
                    <label>Password</label>
                    <input class="input" type="password" id="pwdin-reg">
                      <span class="border"></span>
                  </div>

                  <div class="btm-border">
                    <label>Retype Password</label>
                    <input class="input" type="password" id="repwdin-reg">
                      <span class="border"></span>
                  </div>

                  <h4 id="error"></h4>

                  <div class="body form">
                    <input type="submit" id="signinBtn" value="Register">
                    <input type="submit" id="clearBtn" value="Clear Inputs">
                  </div>
                </form>
              </div>

            </div>
        </div>
      </div>

    </div>

    <!--========================================-->

    <div class="section-1">
      <div class="img">

      </div>
      <div class="section-content">

      </div>
    </div>

  </body>
</html>
