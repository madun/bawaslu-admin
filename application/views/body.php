<!DOCTYPE html>
<html>
  <head>
    <title>BAWASLU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custome.css">
    <!--Import Google Icon Font-->
    <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/materialize/fonts/fonts.css" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->

    <!-- datatable -->
    <!-- <link href="<?php echo base_url(); ?>assets/datatable/css/bootstrap4.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
  <ul id="ddlaporan" class="dropdown-content">
    <!-- <li><a href="<?php echo base_url(); ?>pelamar">PELAMAR</a></li>
    <li><a href="<?php echo base_url(); ?>ldashboard">DASHBOARD</a></li> -->
    <!-- <li class="divider"></li>
    <li><a href="#!">three</a></li> -->
  </ul>
  <nav class="blue-grey lighten-1">
    <div class="container nav-wrapper">
      <a href="#!" class="brand-logo"><!--Logo--></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo base_url(); ?>success_login">HOME</a></li>
        <li><a href="<?php echo base_url(); ?>user">USER</a></li>
        <li><a href="<?php echo base_url(); ?>pengumuman">PENGUMUMAN</a></li>
        <li><a href="<?php echo base_url(); ?>jobvacancies">JOB VACANCIES</a></li>
        <li><a href="<?php echo base_url(); ?>pelamar">LAPORAN</a></li>
        <!-- Dropdown Trigger -->
        <!-- <li><a class="dropdown-button" href="#!" data-activates="ddlaporan">LAPORAN<i class="material-icons right">arrow_drop_down</i></a></li> -->
        <li><a href="<?php echo base_url(); ?>Success_login/logout"><i class="material-icons">power_settings_new</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="<?php echo base_url(); ?>success_login">HOME</a></li>
        <li><a href="<?php echo base_url(); ?>user">USER</a></li>
        <li><a href="<?php echo base_url(); ?>pengumuman">PENGUMUMAN</a></li>
        <li><a href="<?php echo base_url(); ?>jobvacancies">JOB VACANCIES</a></li>
        <li><a href="<?php echo base_url(); ?>pelamar">LAPORAN</a></li>
        <!-- Dropdown Trigger -->
        <!-- <li><a class="dropdown-button" href="#!" data-activates="ddlaporan">LAPORAN<i class="material-icons right">arrow_drop_down</i></a></li> -->
        <li><a href="<?php echo base_url(); ?>Success_login/logout"><i class="material-icons">power_settings_new</i></a></li>
      </ul>
    </div>
  </nav>

  <!-- body -->
  <!-- <div class="container"> -->
    <div class="konten">
        <!-- konten di sini -->
        <!-- breadcrumb -->
        <!-- <div class="col s12 pull-right">

        </div> -->
        <!-- /breadcrumb -->
        <?php $this->load->view($content); ?>
    </div>
  <!-- </div> -->
  <!-- /body -->

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/materialize/js/materialize.min.js"></script>
    <!-- datatables -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/js/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/js/dataTables.bootstrap4.min.js"></script>

    <!-- side menu mobile -->
    <script type="text/javascript">
      $(".button-collapse").sideNav();
    </script>
  </body>
</html>
