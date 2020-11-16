<!DOCTYPE html>
<html lang="en">

<style>
  .iconmenu {
    color: #fff !important;
  }
  .iconmenu:hover {
    color: #02acee !important;
  }

</style>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <title>América Servis</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #032066" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
        <div class="sidebar-brand-icon">
          <img height="60px" src="images/logo.png"/>
        </div>
        <div class="sidebar-brand-text mx-3">América Servis</div>
      </a>

      <br>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="font-size: 12.5px; color: #02acee">
        Gerenciar
      </div> 

      <!-- Nav Item - Página de usuários -->
      <li class="nav-item iconmenu">
        <a class="nav-link" href="\usuario">
          <i class="fas fa-user" style="margin-left: 1.25%"></i>
          <span style="font-size: 14.5px; margin-left: 1.25%; color:white">Usuários</span></a>
      </li>
  
      <!-- Nav Item - Página de funcionários -->
      <li class="nav-item iconmenu">
        <a class="nav-link" href="\funcionarios">
          <i class="fas fa-users"></i>
          <span style="font-size: 14.5px; color: white">Funcionários</span></a>
      </li>

      <!-- Nav Item - Página do Ponto -->
      <li class="nav-item iconmenu">
        <a class="nav-link" href="\ponto">
          <i class="fas fa-user-clock"></i>
          <span style="font-size: 14.5px; color: white">Ponto</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" style="margin-bottom: -1%">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt" style="margin-left: 1%"></i>
          <span style="font-size: 14.5px; margin-left: 1%">Logout</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="background-color: #e5e6e7">
      
      @yield('content')
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer" style="background-color: #e5e6e7">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; CONSELT 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <script defer src="js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script defer src="js/sb-admin-2.js"></script>

</body>

</html>
