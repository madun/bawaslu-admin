<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_proses extends CI_Model {

  public function getData(){
   //  $WHERE;
   // if (isset($kabid)) {
   //   $WHERE = " AND id_kode_daerah =".$kabid;
   // }
   // else{
   // $WHERE = " ";
   //  }
    // else if (condition) {
   //   # code...
   // }
    $qry = "SELECT a.no_ktp,
            a.email,
            a.nama,
            a.status,
            b.tgl_insert,
            b.tgl_update,
            b.penghargaan_kepemiluan,
            b.karyatulis_kepemiluan,
            b.dok_pendukung_1,
            b.dok_pendukung_2,
            b.dok_pendukung_3,
            b.dok_pendukung_4,
            b.ktp,
            b.ijazah,
            b.skck,
            b.kk,
            -- c.id_pelamar,
            -- c.id_job_vacancy,
            -- c.tgl_update,
            -- c.no_registrasi,
            -- c.syarat_administrasi_1,
            -- c.syarat_administrasi_2,
            -- c.status_akhir,
            d.no_registrasi,
            d.id_user,
            d.id_kode_daerah,
            d.email,
            d.no_ktp,
            d.nama,
            d.nama_panggil,
            d.tgl_lahir,
            d.tempat_lahir,
            d.jenis_kelamin,
            d.no_hp,
            d.agama,
            d.status_pernikahan,
            d.alamat_ktp,
            d.propid,
            d.kabid,
            d.camatid,
            d.kode_pos,
            d.bidang_pendidikan,
            d.jenjang_pendidikan,
            d.program_studi_jurusan,
            d.ipk,
            d.nama_perusahaan,
            d.jabatan,
            d.tahun_masuk,
            d.tahun_keluar,
            d.foto_profil,
            d.status_akhir,
            e.kabid,
            e.kabupaten,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
            FROM users a, data_pendukung b, profil_pelamar d, kabupaten e
            WHERE a.status = 'aktif'
            AND a.id_user = b.id_user
            AND b.id_user = d.id_user
            -- AND c.id_user = d.id_user 
            AND  d.kabid = e.kabid order by id_user
    ";

    $result = $this->db->query($qry);
    return $result->result();
  }

  public function do_upload()
{
    $files = $_FILES;
    $cpt = count($_FILES);

    $_FILES['syarat1']['name'] = $files['syarat1']['name'];
    $_FILES['syarat1']['type'] = $files['syarat1']['type'];
    $_FILES['syarat1']['tmp_name'] = $files['syarat1']['tmp_name'];
    $_FILES['syarat1']['error'] = $files['syarat1']['error'];
    $_FILES['syarat1']['size'] = $files['syarat1']['size'];

    $_FILES['syarat2']['name'] = $files['syarat2']['name'];
    $_FILES['syarat2']['type'] = $files['syarat2']['type'];
    $_FILES['syarat2']['tmp_name'] = $files['syarat2']['tmp_name'];
    $_FILES['syarat2']['error'] = $files['syarat2']['error'];
    $_FILES['syarat2']['size'] = $files['syarat2']['size'];

    $_FILES['docpendukung']['name'] = $files['docpendukung']['name'];
    $_FILES['docpendukung']['type'] = $files['docpendukung']['type'];
    $_FILES['docpendukung']['tmp_name'] = $files['docpendukung']['tmp_name'];
    $_FILES['docpendukung']['error'] = $files['docpendukung']['error'];
    $_FILES['docpendukung']['size'] = $files['docpendukung']['size'];
    //
    $this->upload->initialize($this->set_upload_options());
    $this->upload->do_upload();

    $data1 = array(
    // 'id_job_vacancy' => $this->input->post('selectmenuid'),
    'tgl_insert' => $now,
    'tgl_tayang' => $this->input->post('start'),
    'tgl_expired' => $this->input->post('expired'),
    'judul_vacancy' => $this->input->post('judul'),
    'requirement' => $this->input->post('requirement'),
    'file_upload' => $data['upload_data']['file_name'],
    'status_vacancy' => 'aktif'
    );
    $result = $this->db->insert('daftar_pelamar', $data1);
}

  private function set_upload_options(){
      //upload an image options
      $config = array();
      $config['upload_path'] = 'uploads/data_pelamar';
      $config['allowed_types'] = 'pdf';
      $config['max_size']      = '0';
      $config['overwrite']     = FALSE;

      return $config;
  }

  public function getIdPelamar($id){
    $qry = "SELECT a.no_ktp,
            a.email,
            a.nama,
            a.status,
            b.tgl_insert,
            b.tgl_update,
            b.penghargaan_kepemiluan,
            b.karyatulis_kepemiluan,
            b.dok_pendukung_1,
            b.dok_pendukung_2,
            b.dok_pendukung_3,
            b.dok_pendukung_4,
            b.ktp,
            b.ijazah,
            b.skck,
            b.kk,
            -- c.id_pelamar,
            -- c.id_job_vacancy,
            -- c.tgl_update,
            -- c.no_registrasi,
            -- c.syarat_administrasi_1,
            -- c.syarat_administrasi_2,
            -- c.status_akhir,
            d.no_registrasi,
            d.id_user,
            d.id_kode_daerah,
            d.email,
            d.no_ktp,
            d.nama,
            d.nama_panggil,
            d.tgl_lahir,
            d.tempat_lahir,
            d.jenis_kelamin,
            d.no_hp,
            d.agama,
            d.status_pernikahan,
            d.alamat_ktp,
            d.propid,
            d.kabid,
            d.camatid,
            d.kode_pos,
            d.bidang_pendidikan,
            d.jenjang_pendidikan,
            d.program_studi_jurusan,
            d.ipk,
            d.nama_perusahaan,
            d.jabatan,
            d.tahun_masuk,
            d.tahun_keluar,
            d.foto_profil,
            d.status_akhir,
            e.kabid,
            e.kabupaten,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
            FROM users a, data_pendukung b, profil_pelamar d, kabupaten e
            WHERE a.status = 'aktif'
            AND a.id_user = b.id_user
            AND b.id_user = d.id_user
            -- AND c.id_user = d.id_user 
            AND d.kabid = e.kabid 
            AND d.id_user = $id 
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

  public function lulusData(){
    date_default_timezone_set("Asia/Jakarta");
    $id = $this->input->post('id_user');
    $data = array('status_akhir' => 'Lulus');

    $this->db->where('id_user', $id);
    $cek = $this->db->get('profil_pelamar');
    $cek1 = $cek->row_array();
    // SEND EMAIL KELULUSAN
    if ($cek1['status_akhir'] == NULL) {
        // Ambil data users untuk mengisi data email
        $id_user = $cek1['id_user'];
        $this->db->where('id_user', $id_user);
        $users = $this->db->get('users');
        $user = $users->row_array();
        // DATA UNTUK MENGISI DESKRIPSI EMAIL
        $email = $user['email'];
        $nama = $user['nama'];
        $no_ktp = $user['no_ktp'];

        $this->db->where('id_user', $id);
        $result = $this->db->update('profil_pelamar', array('status_akhir' => 'Lulus'));
        return $result;
        
        // require 'mailer/PHPMailerAutoload.php';
        //     // require 'class.phpmailer.php';
        //     $mail = new PHPMailer;

        //     //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
        //     $mail->isSMTP();                                        // Set mailer to use SMTP
        //     $mail->Host = "mail.bawaslu-jabarprov.go.id";                           // Specify main and backup SMTP servers
        //     $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
        //     $mail->Port = 465;                                      // TCP port to connect to
        //     $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        //     $mail->Username = 'timsel@bawaslu-jabarprov.go.id';             // SMTP username
        //     $mail->Password = 'timseljbr25bawaslu';                 // SMTP password
        //     $mail->Encoding = '7bit';

        //     $mail->setFrom('timsel@bawaslu-jabarprov.go.id', 'BAWASLU RECRUITMENT');
        //     $mail->addAddress($email);                          // Add a recipient

        //     $mail->isHTML(true);                                    // Set email format to HTML

        //     $mail->WordWrap = 50;
        //     $mail->Subject = 'Notifikasi Kelulusan Rekrutmen BAWASLU JABAR';
        //     $mail->Body    = 
        //     'Selamat Anda telah lulus tahapan Administrasi Program E-Recruitment BAWASLU Jawa Barat Tahun 2017.<br><br>
        //     Data Anda dengan rincian sebagai berikut:
        //     <table>
        //     <tbody>
        //         <tr>
        //           <td>Nama Anda </td>
        //           <td>:</td>
        //           <td><b>'.$nama.'</b></td>
        //         </tr>
        //         <tr>
        //           <td>No. KTP</td>
        //           <td>:</td>
        //           <td><b>'.$no_ktp.'</b></td>
        //         </tr>
        //         <tr>
        //           <td>E-mail Anda </td>
        //           <td>:</td>
        //           <td><b>'.$email.'</b></td>
        //         </tr>
        //     </tbody>
        //     </table>
        //     <br>
        //     telah dinyatakan lulus oleh Tim Seleksi kami, dan Anda dapat memasuki tahapan seleksi selanjutnya.<br><br>
        //     Silakan Lanjutkan untuk mencetak Kartu ID Anda pada menu <a href="http://e-rekrutmen.bawaslu-jabarprov.go.id/profil">Profil Bawaslu</a>.<br><br> Atas segala perhatiannya kami ucapkan terima kasih banyak.';

        // $mail->send();

                        
        }
    
    if ($cek1['status_akhir'] === 'Lulus') {
        $this->db->where('id_user', $id);
        $result = $this->db->update('profil_pelamar', array('status_akhir' => 'Tidak Lulus'));
        return $result;
    }
    else{
        $this->db->where('id_user', $id);
        $result = $this->db->update('profil_pelamar', $data);
        return $result;
    }
  }
}
