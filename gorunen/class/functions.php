<?
	function count2($array) {
	    return is_array($array) ? count($array) : 0;
	}

	function fncStdClass(&$obj){
		if (!isset($obj)) {
			$obj = new stdClass();
		}
	}

	function implode2($ayrac,$array) {
		return implode($ayrac, (is_array($array) ? $array : array()));
	}

	function var_dump2($str) {
		echo "<pre>";
		var_dump($str);
		echo "</pre>";
		
	}

	function session_kontrol() {
	    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http');
	    $host = $_SERVER['HTTP_HOST'];
	    $url = $protocol . '://' . $host . '/views/giris.php';

	    if (basename($_SERVER['PHP_SELF']) == 'giris.php') {
	        return;
	    }

	    if (empty($_SESSION["kullanici_id"])) {
	        header("Location: $url");
	        exit;
	    }
	}


	function routeActive($route){
		if(empty($_REQUEST['route'])) return "";
		
		$hedef 	= explode("/", $route);
		$kaynak	= explode("/", $_REQUEST['route']);
		if($hedef[0] == $kaynak[0] AND count($hedef) == 1 ){
			return "active";
		} 
		
		if($hedef[1] == $kaynak[1]){
			return "active";
		}
		
	}

	function fncSecilen($secilen, $deger) {
	    if (is_array($deger)) {
	        if (in_array($secilen, $deger)) {
	            return 'selected';
	        }
	    } else {
	        if ($secilen == $deger) {
	            return 'selected';
	        }
	    }
	    return '';
	}

	function fncSifreUret($ad = "", $soyad = "") {
	    $chars = array(
	        'Ç' => 'C', 'Ş' => 'S', 'İ' => 'I', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
	        'ç' => 'c', 'ş' => 's', 'ı' => 'i', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g'
	    );
	   
	    $ad 	= strtr($ad, $chars);
	    $soyad  = strtr($soyad, $chars);
	    
	    $kad = strtoupper(substr($ad, 0, 2) . substr($soyad, 0, 2));
	    $chars = "0123456789";
	    $sifre = $kad . substr(str_shuffle($chars), 0, 4);
	    return $sifre;
	}

	function fncTckGizle($tck) {
		if(is_null($tck) OR empty($tck)) return "";	

		$first = substr($tck, 0, 2);
    	$last  = substr($tck, -2);
    	$tck = $first."*******".$last;

		return $tck;
	}

	function fncTalepSql(&$sql, &$data){
		
		//Öğretmen
		if($_SESSION['yetki_id'] == 3){
			$sql.=" AND T.SUREC_ID = :SUREC_ID AND T.DERS_ID = :DERS_ID";
			$data[":SUREC_ID"] 	= 3;
			$data[":DERS_ID"] 	= $_SESSION['ders_id'];
		}
		//Öğrenci
		if($_SESSION['yetki_id'] == 4){
			$sql.=" AND T.KAYIT_YAPAN_ID = :KAYIT_YAPAN_ID";
			$data[":KAYIT_YAPAN_ID"] = $_SESSION['kullanici_id'];
		}
	}

	function fncDurumRenk($durum){
		if(in_array($durum,array("0","Pasif"))){
			$html = '<span class="badge badge-danger">Pasif</span>';
		} else if(in_array($durum,array("1","Aktif"))){
			$html = '<span class="badge badge-success">Aktif</span>';
		}
		
		return $html;
	}

	function fncImgPath($img){
		$path = "/img/" . $img;
		return $path;
	}

	function fncImgPathSite($img){
		//$path = "https://sporbul.ozgurh.tr/img/" . $img;
		$path = "http://admin.sporbul.org/img/" . $img;
		return $path;
	}

	function fncImgPathSite2($img){
		//$path = "http://sporbul.ozgurh.tr/" . $img;
		$path = "http://admin.sporbul.org/" . $img;
		return $path;
	}
	/*
	function fncImgPathSite($img){
		$path = "https://" .  $_SERVER['SERVER_NAME'] . "/img/" . $img;
		return $path;
	}
	*/
	function fnctelTemizle($tel){

		$tel = trim(str_replace(' ', '', $tel));
		$tel = trim(str_replace('(', '', $tel));
		$tel = trim(str_replace(')', '', $tel));
		$tel = trim(str_replace('-', '', $tel));
		$tel = "90" . $tel;
		
		return $tel;
	}

	function fncImgPathFolder($img){
		return $_SERVER['DOCUMENT_ROOT'] . "/img/" . "/". $img ."/";
	}

	function fncImgPathFolder2($img){
		return $_SERVER['DOCUMENT_ROOT'] . "/img/" . "/". $img;
	}

	function is_pdf($file){
		$arr = explode('.', $file);
		if(strtoupper($arr[count($arr)-1]) == "PDF"){
			return true;
		}
		return false;
	}

	function fncDurumSpan($durum){
		if(in_array($durum,array("0","Pasif"))){
			$html = '<span class="badge bg-label-danger rounded-pill">Pasif</span>';
		} else if(in_array($durum,array("1","Aktif"))){
			$html = '<span class="badge bg-label-success rounded-pill">Aktif</span>';
		}
		
		return $html;
	}

	function fncPopulerSpan($durum){
		if(in_array($durum,array("0","Pasif"))){
			$html = '<span class="badge bg-danger rounded-pill">Popüler Değil</span>';
		} else if(in_array($durum,array("1","Aktif"))){
			$html = '<span class="badge bg-success rounded-pill">Popüler</span>';
		}
		
		return $html;
	}

	function fncSurecSpan($durum){
		if(in_array($durum,array("1"))){
			$html = '<span class="badge bg-label-warning rounded-pill">Onay Bekliyor</span>';
		} else if(in_array($durum,array("3","Aktif"))){
			$html = '<span class="badge bg-label-success rounded-pill">Onaylandı</span>';
		}
		
		return $html;
	}

	function fncTokenKontrol($row){
		if($row->TOKEN != $_REQUEST['token']){
			header("refresh:0; url='/views/token_hata.php'");
		}
	}

	function fncCurl($url, $data = array()) {

	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

	    $response = curl_exec($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	    if (curl_errno($ch)) {
	        $error = curl_error($ch);
	        curl_close($ch);
	        return ['error' => $error];
	    }

	    curl_close($ch);
	    
	    return [
	        'httpCode' => $httpCode,
	        'response' => $response
	    ];
	}

	function mungXML($xml) {
	  	$obj = SimpleXML_Load_String($xml);
	    if ($obj === FALSE) return $xml;

	    // GET NAMESPACES, IF ANY
	    $nss = $obj->getNamespaces(TRUE);
	    if (empty($nss)) return $xml;

	    // CHANGE ns: INTO ns_
	    $nsm = array_keys($nss);
	    foreach ($nsm as $key)
	    {
	        // A REGULAR EXPRESSION TO MUNG THE XML
	        $rgx
	        = '#'               // REGEX DELIMITER
	        . '('               // GROUP PATTERN 1
	        . '\<'              // LOCATE A LEFT WICKET
	        . '/?'              // MAYBE FOLLOWED BY A SLASH
	        . preg_quote($key)  // THE NAMESPACE
	        . ')'               // END GROUP PATTERN
	        . '('               // GROUP PATTERN 2
	        . ':{1}'            // A COLON (EXACTLY ONE)
	        . ')'               // END GROUP PATTERN
	        . '#'               // REGEX DELIMITER
	        ;
	        // INSERT THE UNDERSCORE INTO THE TAG NAME
	        $rep
	        = '$1'          // BACKREFERENCE TO GROUP 1
	        . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
	        ;
	        // PERFORM THE REPLACEMENT
	        $xml =  preg_replace($rgx, $rep, $xml);
	    }
	    return $xml;
    	
	}

	function arrayIndex($rows){
		$rows_yeni = array();
		
		foreach($rows as $key => $row){
			$rows_yeni[$row->ID]	= $row;
		}
		
		return $rows_yeni;
	}

	function fncTre($value){
		if (in_array($value,array(NULL,'0'))) {
			return '-';
		}else{
			return $value;
		}
	}

	function fncBackend($path){
		return '/back' . $path;
	}

	function fncFrontend($path){
		return '/front' . $path;
	}

	function fncIndirimHesapla($fiyat, $oran){
		$oran = (100 - $oran) / 100;
		$fiyat = $fiyat * $oran;
		return FormatSayi::sayi($fiyat);
	}

	function fncIndirimHesaplaDB($fiyat, $oran){
		$oran = (100 - $oran) / 100;
		$fiyat = $fiyat * $oran;
		return $fiyat;
	}
