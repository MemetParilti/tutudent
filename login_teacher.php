<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uselooper.com/auth-signin-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 15:28:11 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
  <!-- Begin SEO tag -->

  <meta property="og:title" content="Sign In">
  <meta name="author" content="Beni Arisandi">
  <meta property="og:locale" content="en_US">
  <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
  <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
  <link rel="canonical" href="index.html">
  <meta property="og:url" content="index.html">
  <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
  <link rel="shortcut icon" href="assets/favicon.ico">
  <meta name="theme-color" content="#3063A0"><!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
  <!-- BEGIN PLUGINS STYLES -->
  <link rel="stylesheet" href="assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
  <!-- END PLUGINS STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link rel="stylesheet" href="assets/stylesheets/theme.min.css" data-skin="default">
  <link rel="stylesheet" href="assets/stylesheets/theme-dark.min.css" data-skin="dark">
  <link rel="stylesheet" href="assets/stylesheets/custom.css">
  <script>
    var skin = localStorage.getItem('skin') || 'default';
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    // Disable unused skin immediately
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    // add loading class to html immediately
    document.querySelector('html').classList.add('loading');
  </script><!-- END THEME STYLES -->
</head>

<body>
  <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
  <!-- .auth -->
  <main class="auth auth-floated">
    <!-- form -->
    <form class="auth-form" action="">
      <div class="mb-4">
        <div class="mb-3">
          <img class="rounded" src="assets/images/sondeneme.png" onclick="login()" alt="" height="72">
        </div>
        <h1 class="h3">Teacher Sign In </h1>
      </div>
      <!-- <p class="text-left mb-4"> Don't have a account? <a href="auth-signup.html">Create One</a>-->
      </p><!-- .form-group -->
      <p class="text-left mb-4"> student sign in ? <a href="login.php">sign in now</a>
      <div class="form-group mb-4">
        <label class="d-block text-left" for="inputUser">Username</label> <input type="text" id="inputUser"
          class="form-control form-control-lg" required="" autofocus="">
      </div><!-- /.form-group -->
      <!-- .form-group -->
      <div class="form-group mb-4">
        <label class="d-block text-left" for="inputPassword">Password</label> <input type="password" id="inputPassword"
          class="form-control form-control-lg" required="">
      </div><!-- /.form-group -->
      <!-- .form-group -->
      <div class="form-group mb-4">
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login()">Sign In</button>
      </div><!-- /.form-group -->
      <!-- .form-group -->
      <div class="form-group text-center">
        <div class="custom-control custom-control-inline custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label"
            for="remember-me">Keep me sign in</label>
        </div>
      </div><!-- /.form-group -->
      <!-- recovery links -->

      </p><!-- /recovery links -->
      <!-- copyright -->

    </form><!-- /.auth-form -->
    <!-- .auth-announcement -->
    <div id="announcement" class="auth-announcement" style="background-image: url(assets/images/school.jpg);">

    </div>
    </div><!-- /.auth-announcement -->
  </main><!-- /.auth -->
  <!-- BEGIN BASE JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper.js/umd/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
  <!-- BEGIN PLUGINS JS -->
  <script src="assets/vendor/particles.js/particles.js"></script>
  <script>
    /**
     * Keep in mind that your scripts may not always be executed after the theme is completely ready,
     * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
     */
    $(document).on('theme:init', () => {
      /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
      particlesJS.load('announcement', 'assets/javascript/pages/particles.json');
    })
  </script> <!-- END PLUGINS JS -->
  <!-- BEGIN THEME JS -->
  <script src="assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
  <!-- Global site tag (gtag.js) - Google Analytics -->

  <!--my page ajax connections-->
  <script>

    function login() {
      var formData = new FormData();
      var un = document.getElementById("inputUser").value;
      var ps = document.getElementById("inputPassword").value;
      if (un != "" && ps != "") {
        formData.append('op', 'login_teacher');
        formData.append('email', un);
        formData.append('pass', ps);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api.php");
        // What to do when server responds
        xhr.onload = function () {
          var res = JSON.parse(this.response);
          var loginResult = res['r'];
          var data = res['data'];
          if (loginResult == 1) {
            //true login

      
           window.location=('teacherPanel.php?name=' + data['name'] + '&id='+data['id']);



          } else {
            alert("username or password are mistaken please try again");
          }






          console.log(loginResult);
          console.log(data);



        };
        xhr.send(formData);


      }


      // (C) PREVENT HTML FORM SUBMIT
      return false;
    }

  </script>


  <!-- Mirrored from uselooper.com/auth-signin-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 15:28:11 GMT -->

</html>