<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_dashboard extends CI_Model {

  public function getDataKotaKab(){

		$sqlkab = "SELECT kabupaten.ibukota as name, count(*) data
                  FROM
                  profil_pelamar
                  LEFT JOIN kabupaten ON kabupaten.kabid = profil_pelamar.id_kode_daerah
                  WHERE kabupaten.kabid = profil_pelamar.id_kode_daerah and kabupaten.propid = '3200'
                  GROUP BY profil_pelamar.id_kode_daerah
                  ";
		$r_sqlkab = $this->db->query($sqlkab);
    $hasil = json_decode(json_encode($r_sqlkab->result()), True);

		$numeric = json_encode($hasil,JSON_NUMERIC_CHECK);

		echo $numeric;
  }

  public function getDataPendidikan(){

		$sqlkab = "SELECT
              (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'S1') as s1,
              (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'S2') as s2,
              (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'D3') as d3,
              (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'SMA') as sma
              from profil_pelamar
              GROUP BY s1
                  ";

    $result = array();
		$sqls1 = "SELECT (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'S1') as s1
							 from profil_pelamar p GROUP BY s1";
		$row = array();
		$row['name'] = 's1';
		$r_sql_s1 = $this->db->query($sqls1);
    $hasil1 = json_decode(json_encode($r_sql_s1->result()), True);
		foreach($hasil1 as $r) {
				$row['data'] = $r['s1'];
		}

    var_dump($row);die;

    $sqls2 = "SELECT (SELECT count(*) from profil_pelamar p where p.jenjang_pendidikan = 'S2') as s2
							 from profil_pelamar p GROUP BY s2";
		$row1 = array();
		$row1['name'] = 's1';
		$r_sql_s2 = $this->db->query($sqls2);
    $hasil2 = json_decode(json_encode($r_sql_s2->result()), True);
		foreach($hasil1 as $r) {
				$row1['data'] = $r['s1'];
		}

		$sqlu = "SELECT (SELECT count(*) from ".$this->conn->databaseName."_hcm.presence p where p.id_state <> '1' and id_state <> '2' and p.date_insert='".$now."') as other
							from ".$this->conn->databaseName."_hcm.presence p GROUP BY other";
		$row2 = array();
		$row2['name'] = 'Other';
		$ru_sql = $this->conn->execute($sqlu) or die (mysql_error());
		foreach ($ru_sql as $r) {
			$row2['data'] = $r['other'];
		}


		array_push($result,$row);
		array_push($result,$row1);
		array_push($result,$row2);


		$numeric = json_encode($result,JSON_NUMERIC_CHECK);

		echo $numeric;
  }

}
