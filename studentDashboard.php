<?php
 
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
  <!-- Begin SEO tag -->
  <title> Starter Template | Looper - Bootstrap 4 Admin Theme </title>
  <meta property="og:title" content="Starter Template">
  <meta name="author" content="Beni Arisandi">
  <meta property="og:locale" content="en_US">
  <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
  <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
  <link rel="canonical" href="index.html">
  <meta property="og:url" content="index.html">
  <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
  <script type="application/ld+json">
      {
        "name": "Looper - Bootstrap 4 Admin Theme",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author":
        {
          "@type": "Person",
          "name": "Beni Arisandi"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Starter Template",
        "@context": "http://schema.org"
      }
    </script><!-- End SEO tag -->
  <!-- FAVICONS -->
  <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
  <link rel="shortcut icon" href="assets/favicon.ico">
  <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
  <!-- BEGIN PLUGINS STYLES -->
  <link rel="stylesheet" href="assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css">
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

<body onLoad='loader()'>
  <!-- .app -->
  <div class="app">
    <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
    <!-- .app-header -->
    <header class="app-header app-header-dark">
      <!-- .top-bar -->
      <div class="top-bar">
        <!-- .top-bar-brand -->
        <div class="top-bar-brand">
          <!-- toggle aside menu -->
          <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu"
            aria-label="toggle aside menu"><span class="hamburger-box"><span
                class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
          <img src="assets/images/sondeneme.png" style="height: 50px; width: auto;">
        </div><!-- /.top-bar-brand -->
        <!-- .top-bar-list -->
        <div class="top-bar-list">
          <!-- .top-bar-item -->
          <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
            <!-- toggle menu -->
            <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span
                class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
          </div><!-- /.top-bar-item -->
          <!-- .top-bar-item -->
          <div class="top-bar-item top-bar-item-full">
            <h4>STUDENT PANEL</h4>

          </div><!-- /.top-bar-item -->
          <!-- .top-bar-item -->
          <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
            <!-- .nav -->

            <!-- .btn-account -->
            <div class="dropdown d-none d-md-flex">
              <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><span class="user-avatar user-avatar-md"><img src="assets/images/logo/avatar2.png"
                    alt=""></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span
                    class="account-name" id="head_name">OGUZHAN AYDIN</span>
                  <span class="account-description"><i class="fas fa-user-shield"></i> MEMBER</span>
                  <span class="account-description"><i class="fas fa-wallet"></i> 0$</span>
                </span>
              </button> <!-- .dropdown-menu -->
              <div class="dropdown-menu">
                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6><a class="dropdown-item"
                  href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a
                  class="dropdown-item" href="login.php"><span
                    class="dropdown-icon oi oi-account-logout"></span> Logout</a>

              </div><!-- /.dropdown-menu -->
            </div><!-- /.btn-account -->
          </div><!-- /.top-bar-item -->
        </div><!-- /.top-bar-list -->
      </div><!-- /.top-bar -->
    </header><!-- /.app-header -->
    <!-- .app-aside -->
    <aside class="app-aside app-aside-expand-md app-aside-light">
      <!-- .aside-content -->
      <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
          <!-- .btn-account -->
          <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span
              class="user-avatar user-avatar-lg"><img src="assets/images/dummy/img-8.jpg" alt=""></span> <span
              class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
              class="account-summary"><span class="account-name">OGUZHAN AYDIN</span> <span
                class="account-description"></span></span></button> <!-- /.btn-account -->
          <!-- .dropdown-aside -->
          <div id="dropdown-aside" class="dropdown-aside collapse">
            <!-- dropdown-items -->
            <div class="pb-3">
              <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span>
                Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span
                  class="dropdown-icon oi oi-account-logout"></span> Logout</a>

            </div><!-- /dropdown-items -->
          </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
          <!-- .stacked-menu -->
          <nav id="stacked-menu" class="stacked-menu">
            <!-- .menu -->
            <ul class="menu">
              <!-- .menu-item -->
            
              
              <li class="menu-item mb-3">
                <a href="#" onClick="window.history.go(-1); return false;" class="menu-link"><span
                    class="menu-text"><i class="far fa-id-card"></i> LOG OUT</span></a>
              </li><!-- /.menu-item -->

            </ul><!-- /.menu -->
          </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->
        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
          <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
              class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
      </div><!-- /.aside-content -->
    </aside><!-- /.app-aside -->
    <!-- .app-main -->
    <main class="app-main">
      <!-- .wrapper -->
      <div class="wrapper">
        <div class="page">
          <!-- .page-cover -->
          <header class="page-cover" style="background-image:url(assets/images/backokul.jpg);">
            <div class="text-center">
              <a href="user-profile.html" class="user-avatar user-avatar-xl"><img src="assets/images/dummy/img-8.jpg"
                  alt=""></a>
              <h2 class="h4 mt-2 mb-0"> OĞUZHAN AYDIN</h2>

              <p class="text-muted"> STUDENT</p>



            </div><!-- /.cover-controls -->
          </header><!-- /.page-cover -->
          <!-- Followers Modal -->
          <!-- .modal -->

          <!-- /Following Modal -->
          <!-- .page-navs -->
          <nav class="page-navs">
            <!-- .nav-scroller -->
            <div class="nav-scroller">
              <!-- .nav -->

            </div><!-- /.nav-scroller -->
          </nav><!-- /.page-navs -->
          <!-- .page-inner -->
          <div class="page-inner">
            <!-- .page-section -->
            <div class="page-section">
              <!-- .section-block -->
              <div class="section-block">
                <!-- metric row -->
                <div class="metric-row">
                  <!-- metric column -->
                  <div class="col-12 col-sm-6 col-lg-4">
                    <!-- .metric -->
                    <div class="card-metric">
                      <div class="metric">
                        <p class="metric-value h3">
                        <div class="el-example">

                          <button type="button" class="btn-lg btn-primary" data-toggle="modal"
                            data-target="#followesModal"><i class="fas fa-university"></i></button>
                        </div><!-- /example block -->
                        </p>
                        <h2 class="metric-label"> <a href="#" class="btn btn-light" data-toggle="modal"
                            data-target="#homeworksModal">SEE HOMEWORKS</a> </h2>
                      </div>
                      <!-- .modal -->
                      <div class="modal fade" id="homeworksModal" tabindex="-1" role="dialog"
                        aria-labelledby="followersModalLabel" aria-hidden="true">
                        <!-- .modal-dialog -->
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <!-- .modal-content -->
                          <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                              <h6 id="followersModalLabel" class="modal-title"> HOMEWORKS </h6>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                            <div class="modal-body px-0">
                              <!-- .list-group -->
                              <div class="list-group list-group-flush list-group-divider">
                                <!-- .list-group-item -->
                                <div class="list-group-item">
                                  <!-- .list-group-item-figure -->
                                  <div class="list-group-item-figure">
                                    <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces2.jpg"
                                        alt="Johnny Day"></a>
                                  </div><!-- /.list-group-item-figure -->
                                  <!-- .list-group-item-body -->
                                  <div class="list-group-item-body">
                                    <h4 class="list-group-item-title">
                                      <a href="#">OĞUZHAN KAYA</a>
                                    </h4>
                                    <p class="list-group-item-text">Mathematics Homework </p>
                                  </div><!-- /.list-group-item-body -->
                                  <!-- .list-group-item-figure -->
                                  <div class="list-group-item-figure">
                                    <button type="button" class="btn btn-sm btn-primary">See More</button>
                                  </div><!-- /.list-group-item-figure -->
                                </div><!-- /.list-group-item -->
                                <!-- .list-group-item -->

                              </div><!-- /.list-group -->
                              <!-- .loading -->
                              <div class="text-center p-3">
                                <!-- .spinner -->
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                  <span class="sr-only">Loading...</span>
                                </div><!-- /.spinner -->
                              </div><!-- /.loading -->
                            </div><!-- /.modal-body -->
                            <!-- .modal-footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div><!-- /.modal-footer -->
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                      <!-- /Following Modal -->
                    </div><!-- /.metric -->
                  </div><!-- /metric column -->
                  <!-- metric column -->
                  <div class="col-12 col-sm-6 col-lg-4">
                    <!-- .metric -->
                    <div class="card-metric">
                      <div class="metric">
                        <p class="metric-value h3">
                        <div class="el-example">
                          <button type="button" class="btn btn-lg btn-primary"><i class="fas fa-feather"></i></button>
                        </div><!-- /example block -->
                        </p>
                        <h2 class="metric-label"> <a href="#" class="btn btn-light" data-toggle="modal"
                            data-target="#quizesModal">SEE QUIZES</a> </h2>
                      </div>
                    </div><!-- /.metric -->
                  </div><!-- /metric column -->
                  <!-- .modal -->
                  <div class="modal fade" id="quizesModal" tabindex="-1" role="dialog"
                    aria-labelledby="followersModalLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <!-- .modal-content -->
                      <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                          <h6 id="followersModalLabel" class="modal-title"> QUIZ RESULTS </h6>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body px-0">
                          <!-- .list-group -->
                          <div class="list-group list-group-flush list-group-divider">
                            <!-- .list-group-item -->
                            <div class="list-group-item">
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces2.jpg"
                                    alt="Johnny Day"></a>
                              </div><!-- /.list-group-item-figure -->
                              <!-- .list-group-item-body -->
                              <div class="list-group-item-body">
                                <h4 class="list-group-item-title">
                                  <a href="#">GİZEM ALİBEYOĞLU</a>
                                </h4>
                                <p class="list-group-item-text">ECONOMY </p>

                              </div><!-- /.list-group-item-body -->
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <p class="list-group-item-text">95 </p>
                              </div><!-- /.list-group-item-figure -->
                            </div><!-- /.list-group-item -->
                            <!-- .list-group-item -->

                          </div><!-- /.list-group -->
                          <!-- .loading -->
                          <div class="text-center p-3">
                            <!-- .spinner -->
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                              <span class="sr-only">Loading...</span>
                            </div><!-- /.spinner -->
                          </div><!-- /.loading -->
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div><!-- /.modal-footer -->
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- /Following Modal -->
                  <!-- metric column -->
                  <div class="col-12 col-sm-6 col-lg-4">
                    <!-- .metric -->
                    <div class="card-metric">
                      <div class="metric">
                        <p class="metric-value h3">
                        <div class="el-example">
                          <button type="button" class="btn btn-lg btn-primary"><i class="fas fa-book"></i></button>
                        </div><!-- /example block -->
                        </p>
                        <h2 class="metric-label"> <a href="#" class="btn btn-light" data-toggle="modal"
                            data-target="#courseModal">SEE COURSES</a> </h2>
                      </div>
                    </div><!-- /.metric -->
                  </div><!-- /metric column -->
                  <!-- metric column -->

                  <div class="modal fade" id="courseModal" tabindex="-1" role="dialog"
                    aria-labelledby="followersModalLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <!-- .modal-content -->
                      <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                          <h6 id="followersModalLabel" class="modal-title"> Course Informations </h6>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body px-0">
                          <!-- .list-group -->
                          <div class="list-group list-group-flush list-group-divider">
                            <!-- .list-group-item -->
                            <div class="list-group-item">
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces2.jpg"
                                    alt="Johnny Day"></a>
                              </div><!-- /.list-group-item-figure -->
                              <!-- .list-group-item-body -->
                              <div class="list-group-item-body">
                                <h4 class="list-group-item-title">
                                  <a href="#">Kenan KARAMAN</a>
                                </h4>
                                <p class="list-group-item-text">FORVET 101 </p>

                              </div><!-- /.list-group-item-body -->
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <p class="list-group-item-text">95 </p>
                              </div><!-- /.list-group-item-figure -->
                            </div><!-- /.list-group-item -->
                            <!-- .list-group-item -->

                          </div><!-- /.list-group -->
                          <!-- .loading -->
                          <div class="text-center p-3">
                            <!-- .spinner -->
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                              <span class="sr-only">Loading...</span>
                            </div><!-- /.spinner -->
                          </div><!-- /.loading -->
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div><!-- /.modal-footer -->
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- /Following Modal -->
                  <!-- metric column -->
                  <div class="col-12 col-md-6 col-lg-6" style="float:none;margin:auto;">
                    <!-- .metric -->
                    <div class="card-metric">
                      <div class="metric">
                        <p class="metric-value h3">
                        <div class="el-example">
                          <button type="button" class="btn btn-lg btn-primary"><i class="fas fa-book"></i></button>
                        </div><!-- /example block -->
                        </p>
                        <h2 class="metric-label"> <a href="#" class="btn btn-light"  onClick='notesShow()'
                            data-target="#noteModal">SEE NOTES</a> </h2>
                      </div>
                    </div><!-- /.metric -->
                  </div><!-- /metric column -->
                  <!-- metric column -->

                  <div class="modal fade" id="noteModal" tabindex="-1" role="dialog"
                    aria-labelledby="followersModalLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <!-- .modal-content -->
                      <div class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                          <h6 id="followersModalLabel" class="modal-title"> LECTURE NOTES </h6>
                        </div><!-- /.modal-header -->
                        <!-- .modal-body -->
                        <div class="modal-body px-0" id="myModelBody">
                          <!-- .list-group -->
                          <div class="list-group list-group-flush list-group-divider">
                            <!-- .list-group-item -->
                            <div class="list-group-item">
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces2.jpg"
                                    alt="Johnny Day"></a>
                              </div><!-- /.list-group-item-figure -->
                              <!-- .list-group-item-body -->
                              <div class="list-group-item-body">
                                <h4 class="list-group-item-title">
                                  <a href="#">Kenan KARAMAN</a>
                                </h4>
                                <p class="list-group-item-text">FORVET 101 </p>

                              </div><!-- /.list-group-item-body -->
                              
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <p class="list-group-item-text">95 </p>
                              </div><!-- /.list-group-item-figure -->
                            </div><!-- /.list-group-item -->
                            <!-- .list-group-item -->

                            <!-- custom item design -->

                              <!-- .list-group -->
                          <div class="list-group list-group-flush list-group-divider" >
                            <!-- .list-group-item -->
                            <div class="list-group-item">
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces2.jpg"
                                    alt="Johnny Day"></a>
                              </div><!-- /.list-group-item-figure -->
                              <!-- .list-group-item-body -->
                              <div class="list-group-item-body">
                                <h5 class="list-group-item-title">
                                  <a href="#" id="noteTxt">important note </a>
                                </h5>
                                <p class="list-group-item-text" id="noteDate">12/10/2020 </p>

                              </div><!-- /.list-group-item-body -->
                              
                              <!-- .list-group-item-figure -->
                              <div class="list-group-item-figure">
                                <p class="list-group-item-text" id="noteTeacher">95 </p>
                              </div><!-- /.list-group-item-figure -->
                            </div><!-- /.list-group-item -->
                            <!-- .list-group-item -->
                            

                          </div>
                          <!-- /.list-group -->
                          <!-- custom item design -->
                          <!-- .loading -->
                          <div class="text-center p-3">
                            <!-- .spinner -->
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                              <span class="sr-only">Loading...</span>
                            </div><!-- /.spinner -->
                          </div><!-- /.loading -->
                        </div><!-- /.modal-body -->
                        <!-- .modal-footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div><!-- /.modal-footer -->
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  <!-- /Following Modal -->

                </div><!-- /.page-inner -->

              </div><!-- /.page -->
            </div><!-- /.wrapper -->
<table class="table" id="myTable">
 
    
  
  </tbody>
</table>
    </main><!-- /.app-main -->
  </div><!-- /.app -->
  <!-- BEGIN BASE JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper.js/umd/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
  <!-- BEGIN PLUGINS JS -->
  <script src="assets/vendor/pace-progress/pace.min.js"></script>
  <script src="assets/vendor/stacked-menu/js/stacked-menu.min.js"></script>
  <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script> <!-- END PLUGINS JS -->
  <!-- BEGIN THEME JS -->
  <script src="assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-116692175-1');
  </script>

  <script>
    function loader()
    {
      console.log('im neew');
      var url = window.location.href;
      let params = (new URL(url)).searchParams;
      var x = params.get('name');
      if(x!="")
      {
        document.getElementsByClassName('account-name')[0].innerText = x;
        document.getElementsByClassName('account-name')[1].innerText = x;
        document.getElementsByClassName('h4 mt-2 mb-0')[0].innerText = x;
      }
    }

    function notesShow()
    {
      var htmlText = "";
      var formData = new FormData();
      formData.append('op' , 'show_notes');
      var xhr = new XMLHttpRequest();
        xhr.open("POST", "api.php");
        // What to do when server responds
        xhr.onload = function () {
          var res = JSON.parse(this.response);

          for(var i in res)
          {
            // htmlText = "<thead> <tr> <th scope="col">Class</th> <th scope="col">Heading</th> <th scope="col">Heading</th> </tr> </thead>"+
            //  "<tbody> <tr class="table-info"> <th scope="row">Info</th> <td>Cell</td> <td>Cell</td> </tr>";
           // htmlText =  "<p>asdas</p>";
           htmlText += res[i]["text"] +'\n' + res[i]["date"] + '\n' + '\n' ;

          }
         // document.getElementById('myTable').innerText = htmlText;

         alert(htmlText);

        };
        xhr.send(formData);
    }

    </script>
    
</body>


</html>