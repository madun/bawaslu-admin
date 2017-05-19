<html>

<head>
  <meta charset="utf-8">
  <title>BAWASLU</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custome.css">
  <!--Import Google Icon Font-->
  <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link href="<?php echo base_url(); ?>assets/materialize/fonts/fonts.css" rel="stylesheet">
  <!--Let browser know website is optimized for mobile-->
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #1e88e5;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #1e88e5;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <!-- <img class="responsive-img" style="width: 250px;" src="http://i.imgur.com/ax0NCsK.gif" /> -->
      <div class="section"></div>

      <h5 class="blue-text"><i class="large material-icons">assessment</i></h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-4 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="<?php echo base_url(); ?>login/getlogin">
            <div class='row'>
              <div class='col s12'>
                <?php
                  $info = $this->session->flashdata('info');
                  if (!empty($info)) {
                    echo "<div class='red-text'> ".$info."</div>";
                  }
                ?>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
								<a class='red-text' href='#!'><b>Forgot Password?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect blue darken-1'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="#!">V.1.0</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/materialize/js/materialize.min.js"></script>
</body>

</html>
