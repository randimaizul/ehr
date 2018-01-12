<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Indoclass {

	function tgl_indo_inverse($tgl)
	{
		$tanggal = substr($tgl,0,2);
		$bulan = $this->get_bulan(substr($tgl,3,2));
		$tahun = substr($tgl,6,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}

	function tgl_indo_inverse2($tgl)
	{
		$tanggal = substr($tgl,0,2);
		$bulan = $this->get_bulan2(substr($tgl,3,2));
		$tahun = substr($tgl,6,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}

	function tgl_indo_inverse3($tgl)
	{
		$tanggal = substr($tgl,0,2);
		$bulan = $this->get_bulan2(substr($tgl,3,2));
		$tahun = substr($tgl,8,2);
		return $tanggal.' '.$bulan.' '.$tahun;
	}

	function tgl_indo_inverse4($tgl)
	{
		$tanggal = substr($tgl,0,2);
		$bulan = substr($tgl,3,2);
		$tahun = substr($tgl,8,4);
		return $tanggal.'/'.$bulan.'/'.$tahun;
	}


	function tgl_indo($tgl)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = $this->get_bulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
	function tgl_indo2($tgl)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = $this->get_bulan2(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
	function tgl_indo3($tgl)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = $this->get_bulan2(substr($tgl,5,2));
		$tahun = substr($tgl,2,2);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
	function tgl_indo4($tgl)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = substr($tgl,5,2);
		$tahun = substr($tgl,2,2);
		return $tanggal.'/'.$bulan.'/'.$tahun;
	}		
	function get_bulan($bln)
	{
		switch ($bln) {
				case 1 :
				return "Januari";
				break;
				case 2 :
				return "Februari";
				break;
				case 3 :
				return "Maret";
				break;
				case 4 :
				return "April";
				break;
				case 5 :
				return "Mei";
				break;
				case 6 :
				return "Juni";
				break;
				case 7 :
				return "Juli";
				break;
				case 8 :
				return "Agustus";
				break;
				case 9 :
				return "September";
				break;
				case 10 :
				return "Oktober";
				break;
				case 11 :
				return "November";
				break;
				case 12 :
				return "Desember";
				break;
			}
	}
	function get_bulan2($bln)
	{
		switch ($bln) {
				case 1 :
				return "Jan";
				break;
				case 2 :
				return "Feb";
				break;
				case 3 :
				return "Mar";
				break;
				case 4 :
				return "Apr";
				break;
				case 5 :
				return "Mei";
				break;
				case 6 :
				return "Jun";
				break;
				case 7 :
				return "Jul";
				break;
				case 8 :
				return "Agus";
				break;
				case 9 :
				return "Sept";
				break;
				case 10 :
				return "Okt";
				break;
				case 11 :
				return "Nov";
				break;
				case 12 :
				return "Des";
				break;
			}
	}

	function nameday($tgl)
	{
		$tgls=explode("-", $tgl);
		$namahari= date("l", mktime(0, 0, 0, $tgls[1], $tgls[2], $tgls[0]));
		switch ($namahari) 
				{
				case "Monday" :
				return "Senin";
				break;
				case "Tuesday" :
				return "Selasa";
				break;
				case "Wednesday" :
				return "Rabu";
				break;
				case "Thursday" :
				return "Kamis";
				break;
				case "Friday" :
				return "Jumat";
				break;
				case "Saturday" :
				return "Sabtu";
				break;
				case "Sunday" :
				return "Minggu";
				break;
				}
	}
	function Romawi($bulan)
	{
		switch ($bulan) 
				{
				case 01 :
				return "I";
				break;
				case 02 :
				return "II";
				break;
				case 03 :
				return "III";
				break;
				case 04 :
				return "IV";
				break;
				case 05 :
				return "V";
				break;
				case 06 :
				return "VI";
				break;
				case 07 :
				return "VII";
				break;
				case 08 :
				return "VIII";
				break;
				case 09 :
				return "IX";
				break;
				case 10 :
				return "X";
				break;
				case 11 :
				return "XII";
				break;
				case 12 :
				return "XII";
				break;
				}
	}
	function weekofmont($tgl)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = substr($tgl,5,2);
		$tahun = substr($tgl,0,4);
		//echo $bulan."-".$tanggal."-".$tahun."<br />";;
		$no= date("j", mktime(0, 0, 0, $bulan, $tanggal, $tahun));
		if($no<=7)
		{
			return "pertama";
		}
		if($no<=14 and $no >= 8)
		{
			return "kedua";
		}
		if($no<=21 and $no >= 15)
		{
			return "ketiga";
		}
		if($no>=22)
		{
			return "keempat";
		}
	}
	function sisahari_fail($tgl)
	{
		$hariini=date('Y-m-d');
		return round($jumlahhari = (strtotime($tgl) - strtotime($hariini)) / (60 * 60 * 240));
	}
	function jumlah_bulan($awal, $selesai)
	{
		$df=explode('-',$awal);
		$awalnya=$df[0].'-'.$df[1].'-01';
		return round((strtotime($selesai) - strtotime($awalnya)) / (60 * 60 * 24 * 30));
	}
	function bulan_tahun($tgl)
	{
		$oje=explode("-", $tgl);
		$bulan=$this->get_bulan($oje[1]);
		$tahun=$oje[0];
		$a=$bulan." ".$tahun;
		return $a;
		
	}
	
	function bulan_tahun2($tgl)
	{
		$oje=explode("-", $tgl);
		$bulan=$this->get_bulan2($oje[1]);
		$tahun=$oje[0];
		$a=$bulan." ".$tahun;
		return $a;
		
	}
	function bulan_tahun3($tgl)
	{
		$oje=explode("-", $tgl);
		$bulan=$oje[1];
		$tahun=$oje[0];
		$a=$bulan."/".$tahun;
		return $a;
		
	}
	function bulan_tahun4($tgl)
	{
		$oje=explode("-", $tgl);
		$bulan=$oje[1];
		$tahun=$oje[0];
		$a=$bulan." ".substr($tahun, 2, 2);
		return $a;
		
	}
	function bulan_tahun5($tgl)
	{
		$oje=explode("-", $tgl);
		$bulan=$bulan=$this->get_bulan2($oje[1]);
		$tahun=$oje[0];
		$a=$bulan." ".substr($tahun, 2, 2);
		return $a;
		
	}
	
	function bulan_tahunAngka($tgl)
	{
		$oje=explode("-", $tgl);
		$bulan=$oje[1];
		$tahun=$oje[0];
		$a=$bulan." ".$tahun;
		return $a;
		
	}
/*function terbilang($bilangan){
		 $bilangan = abs($bilangan);
		$angka = array("Nol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
		 $temp = "";
		if($bilangan < 12){
		 $temp = " ".$angka[$bilangan];
		 }else if($bilangan < 20){
		 $temp = $this->terbilang($bilangan - 10)." belas";
		 }else if($bilangan < 100){
		 $temp = $this->terbilang($bilangan/10)." puluh".$this->terbilang($bilangan%10);
		 }else if ($bilangan < 200) {
		 $temp = " seratus".$this->terbilang($bilangan - 100);
		 }else if ($bilangan < 1000) {
		 $temp = $this->terbilang($bilangan/100). " ratus". $this->terbilang($bilangan % 100);
		 }else if ($bilangan < 2000) {
		 $temp = " seribu". $this->terbilang($bilangan - 1000);
		 }else if ($bilangan < 1000000) {
		 $temp = $this->terbilang($bilangan/1000)." ribu". $this->terbilang($bilangan % 1000);
		 }else if ($bilangan < 1000000000) {
		 $temp = $this->terbilang($bilangan/1000000)." juta". $this->terbilang($bilangan % 1000000);
		 }
		 
		return $temp;
	}*/
	function terbilang($angka) {
	    // pastikan kita hanya berususan dengan tipe data numeric
	    $angka = (float)$angka;
	     
	    // array bilangan 
	    // sepuluh dan sebelas merupakan special karena awalan 'se'
	    $bilangan = array(
	            '',
	            'satu',
	            'dua',
	            'tiga',
	            'empat',
	            'lima',
	            'enam',
	            'tujuh',
	            'delapan',
	            'sembilan',
	            'sepuluh',
	            'sebelas'
	    );
	     
	    // pencocokan dimulai dari satuan angka terkecil
	    if ($angka < 12) {
	        // mapping angka ke index array $bilangan
	        return $bilangan[$angka];
	    } else if ($angka < 20) {
	        // bilangan 'belasan'
	        // misal 18 maka 18 - 10 = 8
	        return $bilangan[$angka - 10] . ' belas';
	    } else if ($angka < 100) {
	        // bilangan 'puluhan'
	        // misal 27 maka 27 / 10 = 2.7 (integer => 2) 'dua'
	        // untuk mendapatkan sisa bagi gunakan modulus
	        // 27 mod 10 = 7 'tujuh'
	        $hasil_bagi = (int)($angka / 10);
	        $hasil_mod = $angka % 10;
	        return trim(sprintf('%s puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
	    } else if ($angka < 200) {
	        // bilangan 'seratusan' (itulah indonesia knp tidak satu ratus saja? :))
	        // misal 151 maka 151 = 100 = 51 (hasil berupa 'puluhan')
	        // daripada menulis ulang rutin kode puluhan maka gunakan
	        // saja fungsi rekursif dengan memanggil fungsi $this->terbilang(51)
	        return sprintf('seratus %s', $this->terbilang($angka - 100));
	    } else if ($angka < 1000) {
	        // bilangan 'ratusan'
	        // misal 467 maka 467 / 100 = 4,67 (integer => 4) 'empat'
	        // sisanya 467 mod 100 = 67 (berupa puluhan jadi gunakan rekursif $this->terbilang(67))
	        $hasil_bagi = (int)($angka / 100);
	        $hasil_mod = $angka % 100;
	        return trim(sprintf('%s ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod)));
	    } else if ($angka < 2000) {
	        // bilangan 'seribuan'
	        // misal 1250 maka 1250 - 1000 = 250 (ratusan)
	        // gunakan rekursif $this->terbilang(250)
	        return trim(sprintf('seribu %s', $this->terbilang($angka - 1000)));
	    } else if ($angka < 1000000) {
	        // bilangan 'ribuan' (sampai ratusan ribu
	        $hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
	        $hasil_mod = $angka % 1000;
	        return sprintf('%s ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod));
	    } else if ($angka < 1000000000) {
	        // bilangan 'jutaan' (sampai ratusan juta)
	        // 'satu puluh' => SALAH
	        // 'satu ratus' => SALAH
	        // 'satu juta' => BENAR 
	        // @#$%^ WT*
	         
	        // hasil bagi bisa satuan, belasan, ratusan jadi langsung kita gunakan rekursif
	        $hasil_bagi = (int)($angka / 1000000);
	        $hasil_mod = $angka % 1000000;
	        return trim(sprintf('%s juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
	    } else if ($angka < 1000000000000) {
	        // bilangan 'milyaran'
	        $hasil_bagi = (int)($angka / 1000000000);
	        // karena batas maksimum integer untuk 32bit sistem adalah 2147483647
	        // maka kita gunakan fmod agar dapat menghandle angka yang lebih besar
	        $hasil_mod = fmod($angka, 1000000000);
	        return trim(sprintf('%s milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
	    } else if ($angka < 1000000000000000) {
	        // bilangan 'triliun'
	        $hasil_bagi = $angka / 1000000000000;
	        $hasil_mod = fmod($angka, 1000000000000);
	        return trim(sprintf('%s triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
	    } else {
	        return 'Wow...';
	    }
	}
	function tglintahun($next)
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			return $tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan, $hari, $tahun+$next));
	}
	function tglinbulan($next)
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			return $tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan+$next, $hari, $tahun));
	}
	function tgltgl($next)
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			return $tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan, $hari+$next, $tahun));
	}
	function tglintahunmin($next)
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			return $tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan, $hari, $tahun-$next));
	}
	function tglinbulanmin($next)
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			return $tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan-$next, $hari, $tahun));
	}
	function tgltglmin($next)
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			return $tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan, $hari-$next, $tahun));
	}
	function periodefaktur()
	{
		    $bulan=date('m');
			$hari=date('d');
			$tahun=date('Y');
			if($hari > 14)
			{
				
				$tglawal=date("Y-m-d", mktime(0, 0, 0, $bulan, 15, $tahun));
				$tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan+1, 14, $tahun));
				
				
				
			}
			else
			{
				$tglawal=date("Y-m-d", mktime(0, 0, 0, $bulan-1, 15, $tahun));
				$tglakhir=date("Y-m-d", mktime(0, 0, 0, $bulan, 14, $tahun));
				
			}
			
			
			return $sql="'".$tglawal."' and '".$tglakhir."'";
			
			
	}

	function akhirBulan($bulan, $tahun)
	{
		$bulan=$bulan+1;
		return date("Y-m-d", mktime(0, 0, 0, $bulan, 0, $tahun));
	}
	function tglanabulan($tgl, $ana)
	{
		$oje=explode("-", $tgl);
			$bulan=$oje[1];
			$tahun=$oje[0];
			
			if($ana=="awal"){
				return date("Y-m-d", mktime(0, 0, 0, $bulan, 1, $tahun));
			}
			else
			{
				return date("Y-m-d", mktime(0, 0, 0, $bulan+1, 0, $tahun));
			}
	}

	function rp($int)
	{
		return "Rp, ".number_format($int, 0, '', '.');
	}
	function rp_nologo($int)
	{
		return number_format($int, 0, '', '.');
	}
	function bnp($bulan, $tahun, $go)
	{
		if($go=='n')
		{
			return date("Y-m-d", mktime(0, 0, 0, $bulan+1, 1, $tahun));
		}
		if($go=='p')
		{
			return date("Y-m-d", mktime(0, 0, 0, $bulan-1, 1, $tahun));
		}
	}

	function date_diff($tgl){
		$hari_ini = date('Y-m-d H:i:s');
	    $lalu = $tgl ;
	    $date1=date_create($hari_ini);
	    $date2=date_create($lalu);
	    $diff=date_diff($date1,$date2);
	    return $pembandingDateEnd_dengan_ArrayDate = $diff->format("%a");
	}

	function sisahari($tgl){
		$b1=date('Y-m-d', NOW());
		
		$kalimat=$tgl;
		$tahun=substr($kalimat,0,4);
		$bulan=substr($kalimat,5,2);
		$tanggal=substr($kalimat,8,2);
		$date1 = new DateTime($b1);
		$date2 = new DateTime($tahun."-".$bulan."-".$tanggal);
		$interval = $date1->diff($date2);

		return $interval->format('%R%a');
	}

}
?>
