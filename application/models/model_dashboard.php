<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_dashboard extends CI_Model {

  public function getDataKotaKab(){

		$sqlkab = "
    SELECT C.kabupaten as name, COUNT(C.kabid) as data FROM
          profil_pelamar P LEFT OUTER JOIN kabupaten C
          ON P.id_kode_daerah = C.kabid
          GROUP BY P.id_kode_daerah, C.kabupaten
              ";
		$r_sqlkab = $this->db->query($sqlkab);
    $hasil = json_decode(json_encode($r_sqlkab->result()), True);

		$numeric = json_encode($hasil,JSON_NUMERIC_CHECK);

		echo $numeric;
  }

  public function getDataPendidikan(){

    $result = array();
		$sqls1 = "SELECT (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'S1') as s1
							 from profil_pelamar p GROUP BY s1";
		$row1 = array();
		$row1['name'] = 'S1';
		$r_sql_s1 = $this->db->query($sqls1);
    $hasil1 = json_decode(json_encode($r_sql_s1->result()), True);
		foreach($hasil1 as $r) {
				$row1['data'] = $r['s1'];
		}

    // var_dump($row);die;

    $sqls2 = "SELECT (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'S2') as s2
							 from profil_pelamar p GROUP BY s2";
		$row2 = array();
		$row2['name'] = 'S2';
		$r_sql_s2 = $this->db->query($sqls2);
    $hasil2 = json_decode(json_encode($r_sql_s2->result()), True);
		foreach($hasil2 as $r) {
				$row2['data'] = $r['s2'];
		}

    // var_dump($row1);die;

		$sqlu3 = "SELECT (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'D3') as d3
							 from profil_pelamar p GROUP BY d3";
		$row3 = array();
		$row3['name'] = 'D3';
    $r_sql_s3 = $this->db->query($sqlu3);
		$hasil3 = json_decode(json_encode($r_sql_s3->result()), True);
		foreach ($hasil3 as $r) {
			$row3['data'] = $r['d3'];
		}

    $sqlu4 = "SELECT (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'SMA') as sma
							 from profil_pelamar p GROUP BY sma";
		$row4 = array();
		$row4['name'] = 'SMA';
    $r_sql_s4 = $this->db->query($sqlu4);
		$hasil4 = json_decode(json_encode($r_sql_s4->result()), True);
		foreach ($hasil4 as $r) {
			$row4['data'] = $r['sma'];
		}

		array_push($result,$row1);
		array_push($result,$row2);
    array_push($result,$row3);
    array_push($result,$row4);


		$numeric = json_encode($result,JSON_NUMERIC_CHECK);

		echo $numeric;
  }

  public function getDataUsia(){
    $sql = "select CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS name,
            count(*) data
            from profil_pelamar
            GROUP BY name";
    $r_sqlkab = $this->db->query($sql);
    $hasil = json_decode(json_encode($r_sqlkab->result()), True);

		$numeric = json_encode($hasil,JSON_NUMERIC_CHECK);

		echo $numeric;
  }

  public function getDataJenkel(){
    $result = array();
    $sql = "select
    (SELECT COUNT(*) FROM profil_pelamar WHERE jenis_kelamin = 'Laki-laki') as ll,
    (SELECT COUNT(*) FROM profil_pelamar WHERE jenis_kelamin = 'Perempuan') as pp
    FROM profil_pelamar
    ";
    $row1 = array();
    $row2 = array();
    $row1['name'] = 'Laki - Laki';
    $row2['name'] = 'Perempuan';
    $r_sqlkab = $this->db->query($sql);
    $hasil = json_decode(json_encode($r_sqlkab->result()), True);
    foreach ($hasil as $r) {
			$row1['data'] = $r['ll'];
      $row2['data'] = $r['pp'];
		}

    array_push($result,$row1);
		array_push($result,$row2);
    // var_dump($result);die;
		$numeric = json_encode($result,JSON_NUMERIC_CHECK);

		echo $numeric;
  }

}
