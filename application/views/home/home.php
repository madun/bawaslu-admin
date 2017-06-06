<head>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/Highcharts-5.0.11/js/highcharts.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/home/home.js"></script>

  <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="http://highcharts.github.io/export-csv/export-csv.js"></script>

  <!-- <script src="<?php echo base_url(); ?>assets/Highcharts-5.0.11/exportData/exporting.js"></script>
  <script src="<?php echo base_url(); ?>assets/Highcharts-5.0.11/exportData/export-csv.js"></script> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Highcharts-5.0.11/css/highcharts.css">
</head>
<body>
  <div class="row">
      <div class="col l6 m6 s12">
        <select id="filter" class="input-field col l4 m4 s12">
          <option value="" disabled selected>FILTER</option>
          <option value="kotakab">By Kota / Kab</option>
          <option value="pendidikan">By Pendidikan</option>
          <option value="usia">By Usia</option>
          <option value="jeniskelamin">By Jenis Kelamin</option>
        </select>
        <!-- <label></label> -->
      </div>
      <div class="col l6 m6 s12 left">
        <!-- <h4>DASHBOARD</h4> -->
      </div>
      <div class="col l12 m12 s12">
          <div id="kotakab" style="width:100%; height:400px;"></div>
      </div>
      <div class="col l4 m4 s12">
          <div id="pendidikan" style="width:100%; height:400px;"></div>
      </div>
      <div class="col l4 m4 s12">
          <div id="usia" style="width:100%; height:400px;"></div>
      </div>
      <div class="col l4 m4 s12">
          <div id="jenkel" style="width:100%; height:400px;"></div>
      </div>
  </div>

</body>
