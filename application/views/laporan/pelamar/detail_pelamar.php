<?php if (!$data){ ?>
<center><h2>YOU DON'T HAVE PERMISSION!</h2></center>
<?php } else { ?>
  <?php foreach ($data as $dt => $x):?>
  <style media="screen">
    .tabs .indicator {
      background-color : #fb8c00 !important;
    }

    .tabs .tab a:hover, .tabs .tab a.active {
      color : #000 !important;
    }

    /*custome tabs*/
    .tabs-icon {
      font-size: 10px;
      overflow: hidden;
    }
    .tabs-icon i {
      display: block;
      margin-top: 5px;
      margin-bottom: -15px;
      font-size: 24px;
    }
    .tabs-icon a.active {
      background-color: #F3F3F3;
    }
    /* OVERWRITE MATERIAL CSS MIN WIDTH FOR MOBILE */
    .tabs .tab {
      min-width: 50px !important
    }
    .tabs .tab-hide {
        display: none;
    }
    .no-pd {
      padding: 0 !important
    }


    /*custome input field*/
    /* label focus color */
      .input-field input[type=text] + label {
        color: grey;
      }
     .input-field input[type=text]:focus + label {
       color: #000;
       /*display: none;*/
     }
     /* label underline focus color */
     .input-field input[type=text]:focus {
       border-bottom: 1px solid #fb8c00;
       box-shadow: 0 1px 0 0 #fb8c00;
     }
  </style>
  <div class="row">
      <div class="col l2 m2 s12">
          <img style="border:5px solid;border-color:#fff;" class="materialboxed responsive-img z-depth-3" data-caption="A picture of a way with a group of trees in a park" src="<?php echo base_url(); ?>assets/apple-wallpaper-19.jpg">
      </div>
      <div class="col l10 m10 s12">

          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col l8 m8 s8">
                    <h5><?php echo $x->username; ?></h4>
                    <small>001/TIMSEL/3207/IV/20017</small>
                </div>
                <div class="col l4 m4 s4">
                    <button class="waves-effect waves-light btn orange darken-1 right" type="button" name="button"><i class="material-icons left">description</i>Unduh CV</button>
                </div>
              </div>
            </div>
            <div class="card-action">
              <table style="">
                <tr>
                  <th class="right" scope="row">No. KTP</th>
                  <td><?php echo $x->no_ktp ?></td>
                  <th class="right" scope="row">Sex</th>
                  <td>Laki - Laki</td>
                  <th class="right" scope="row">Status</th>
                  <td>-</td>
                </tr>
                <tr>
                  <th class="right" scope="row">Date Birth</th>
                  <td>01 Jan 1970</td>
                  <th class="right" scope="row">Email</th>
                  <td><?php echo $x->email ?></td>
                  <th class="right" scope="row">Pernikahan</th>
                  <td>-</td>
                </tr>
                <tr>
                  <th class="right" scope="row">City</th>
                  <td>Bandung</td>
                  <th class="right" scope="row">Contact</th>
                  <td>089543216</td>
                  <th class="right" scope="row">Religion</th>
                  <td>Islam</td>
                </tr>
              </table>
            </div>
          </div>

      </div>

      <div class="col s12">
        <i class="red-text right">*Kelengkapan data Kamu mempengaruhi Penilaian</i>
      </div>
      <div class="col s12 z-depth-1">
        <ul class="tabs tabs-icon">
          <li class="tab col s3"><a class="active" href="#test1"><i class="material-icons">description</i>Data Pribadi</a></li>
        </ul>
        <div id="test1" class="col s12">
            <div class="row">
              <!-- kiri -->
                <div class="col l5 m12 s12">
                    <div class="row">
                      <div class="input-field">
                        <input id="ktp" type="text" class="validate" required>
                        <label for="ktp">KTP <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input id="nama_lengkap" type="text" class="validate" required>
                        <label for="nama_lengkap">Nama Lengkap <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input id="nama_panggilan" type="text" class="validate" required>
                        <label for="nama_panggilan">Nama Panggilan <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input id="email" type="text" class="validate" required>
                        <label for="email">Email <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input id="notlp" type="text" class="validate" required>
                        <label for="notlp">No. Tlp <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input class="with-gap" name="sex" type="radio" id="laki" checked value="l" required/>
                        <label for="laki">Laki Laki</label>
                        <input class="with-gap" name="sex" type="radio" id="perempuan" value="p" required/>
                        <label for="perempuan">Perempuan</label>
                      </div>
                      <br>
                      <div class="input-field">
                        <textarea id="alamat" class="materialize-textarea" required></textarea>
                        <label for="alamat">Alamat <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input id="kodepos" type="text" class="validate" required>
                        <label for="kodepos">Kode POS <span class="red-text">(*)</span></label>
                      </div>
                    </div>
                </div>
              <!-- /kiri -->
              <div class="col l2 m12 s12">

              </div>
              <!-- kanan -->
                <div class="col l5 m12 s12">
                    <div class="row">
                      <div class="input-field">
                        <input id="City" type="text" class="validate" required>
                        <label for="City">City <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field">
                        <input type="date" class="datepicker" id="birth" placeholder="Date Birth">
                        <!-- <label for="birth">Birth <span class="red-text">(*)</span></label> -->
                      </div>
                      <div class="input-field">
                        <select id="agama">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                        </select>
                        <label for="agama">Agama</label>
                      </div>
                      <div class="input-field">
                        <select id="status">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                        </select>
                        <label for="status">Status Pernikahan</label>
                      </div>
                      <div class="input-field">
                        <input id="jabatan" type="text" class="validate" required>
                        <label for="jabatan">Pekerjaan / Jabatan <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field col l8">
                        <textarea id="alamat" class="materialize-textarea" required></textarea>
                        <label for="alamat">Alamat <span class="red-text">(*)</span></label>
                      </div>
                      <div class="input-field col l4">
                        <input type="checkbox" id="dom" />
                        <label for="dom" style="font-size:12px;text-align:justify;">Alamat Sama Dengan KTP</label>
                      </div>
                    </div>
                </div>
              <!-- /kanan -->
            </div>
            <div class="row">
              <div class="col l12 m12 s12">
                <hr>
              </div>
              <!-- kiri -->
              <div class="col l5 m12 s12">
                <br>
                <div class="input-field">
                  <select id="bidpend">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label for="bidpend">Bidang Pendidikan</label>
                </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Jenjang Pendidikan</label>
                </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Universitas / Sekolah</label>
                </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Program Studi / Jurusan</label>
                </div>
                <div class="input-field">
                  <input id="nilaiipk" type="text" class="validate" required width="20%">
                  <label for="nilaiipk">Nilai IPK <span class="red-text">(*)</span></label>
                </div>
              </div>
              <!-- /kiri -->
              <div class="col l2 m12 s12">
                <!-- tengah -->
              </div>
              <!-- kanan -->
              <div class="col l5 m12 s12">
                <div class="input-field">
                  <input id="pengalaman" type="text" class="validate" required>
                  <label for="pengalaman">Pengalaman Kerja Perusahaan <span class="red-text">(*)</span></label>
                </div>
                <div class="input-field">
                  <input id="jabatanpeng" type="text" class="validate" required>
                  <label for="jabatanpeng">Jabatan <span class="red-text">(*)</span></label>
                </div>
                <div class="input-field">
                  <input type="date" class="datepicker" id="thnin" placeholder="Tahun Masuk" value="<?php echo $x->tgl_insert; ?>">
                  <!-- <label for="birth">Birth <span class="red-text">(*)</span></label> -->
                </div>
                <div class="input-field">
                  <input type="date" class="datepicker" id="thnin" placeholder="Tahun Keluar" value="<?php echo $x->tgl_update; ?>">
                  <!-- <label for="birth">Birth <span class="red-text">(*)</span></label> -->
                </div>
              </div>
              <!-- /kanan -->
            </div>

            <div class="row">
                <div class="col l12 m12 s12">
                  <span class="col l4 m12 s12">Penghargaan yang pernah diperoleh terkait kepemiluan</span>
                  <div class="file-field input-field col l8 m12 s12">
                    <div class="btn">
                      <span>File</span>
                      <input type="file" name="penghargaan">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
                </div>
                <div class="col l12 m12 s12">
                  <span class="col l4 m12 s12">Karya Tulis yang terkait dengan kepemiluan</span>
                  <div class="file-field input-field col l8 m12 s12">
                    <div class="btn">
                      <span>File</span>
                      <input type="file" name="karya">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>

  </div>
  <?php endforeach; ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();

      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 70 // Creates a dropdown of 15 years to control year
      });

    });
  </script>

<?php } ?>
