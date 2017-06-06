<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detailPelamar extends CI_Model {

    public function getData(){
      $id=$this->uri->segment(3);
      $qry = "
      SELECT
      users.nama,
      users.email,
      users.no_ktp,
      users.tgl_insert,
      users.tgl_update,
      users.`status`,
      profil_pelamar.nama_panggil,
      profil_pelamar.tgl_lahir,
      profil_pelamar.tempat_lahir,
      profil_pelamar.jenis_kelamin,
      profil_pelamar.no_hp,
      profil_pelamar.agama,
      profil_pelamar.status_pernikahan,
      profil_pelamar.alamat_ktp,
      profil_pelamar.kode_pos,
      profil_pelamar.alamat_domisili,
      profil_pelamar.bidang_pendidikan,
      profil_pelamar.jenjang_pendidikan,
      profil_pelamar.universitas_sekolah,
      profil_pelamar.program_studi_jurusan,
      profil_pelamar.ipk,
      profil_pelamar.nama_perusahaan,
      profil_pelamar.jabatan,
      profil_pelamar.tahun_masuk,
      profil_pelamar.tahun_keluar,
      profil_pelamar.foto_profil,
      data_pendukung.tgl_insert,
      data_pendukung.tgl_update,
      data_pendukung.penghargaan_kepemiluan,
      data_pendukung.karyatulis_kepemiluan,
      data_pendukung.dok_pendukung_1,
      data_pendukung.dok_pendukung_2,
      data_pendukung.dok_pendukung_3,
      data_pendukung.dok_pendukung_4,
      data_pendukung.dok_pendukung_5,
      data_pendukung.dok_pendukung_6,
      data_pendukung.dok_pendukung_7,
      data_pendukung.dok_pendukung_8,
      data_pendukung.dok_pendukung_9,
      data_pendukung.dok_pendukung_10,
      data_pendukung.keterangan_pengadilan,
      data_pendukung.keterangan_kesehatan,
      data_pendukung.ktp,
      data_pendukung.ijazah,
      data_pendukung.skck,
      data_pendukung.kk,
      profil_pelamar.no_registrasi
      FROM
      users
      INNER JOIN profil_pelamar ON users.id_user = profil_pelamar.id_user
      INNER JOIN data_pendukung ON data_pendukung.id_user = users.id_user
      WHERE users.id_user = $id
      ";

      $result = $this->db->query($qry);
      return $result->result();
    }

}
