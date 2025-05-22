<?

require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

class Sorgu2{

	private $select;
	
	public function __construct($select = "") {
        $this->select = $select;
    }

	public function sayfalama($toplamVeri, $sayfaBasinaVeri, $request){
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $baseUrl = $protocol . $host . $scriptName;

        $gecerliSayfa = isset($request['page']) ? (int) $request['page'] : 1;
        $request['page'] = null;

        $queryString = http_build_query(array_filter($request, function ($value) {return $value !== null;}));
        $url = $baseUrl . '?' . $queryString;
        return new Sayfalama($toplamVeri, $sayfaBasinaVeri, $gecerliSayfa, $url);
    }

	public function getSporSalonlari($request = array()) {

        $data = array();
        $sql = "SELECT 
                    C.*,
                    CONCAT_WS(' ',K.AD,K.SOYAD) AS KAYIT_YAPAN,
                    IL.IL,
                    ILCE.ILCE,
                    (SELECT GROUP_CONCAT(B.BRANS) FROM BRANS AS B WHERE FIND_IN_SET(B.ID , C.BRANS_IDS)) AS BRANSLAR,
                    CONCAT('cari/', C.ID, '/', YEAR(C.TARIH), '/', CR.RESIM_ADI) AS RESIM_URL,
                    CR.ALT
                FROM CARI AS C
                    LEFT JOIN IL AS IL ON IL.ID = C.IL_ID
                    LEFT JOIN ILCE AS ILCE ON ILCE.ID = C.ILCE_ID
                    LEFT JOIN KULLANICI AS K ON K.ID = C.KAYIT_YAPAN_ID
                    LEFT JOIN CARI_RESIM AS CR ON CR.CARI_ID = C.ID AND CR.VITRIN = 1
                WHERE 1
                ";

        if($request['salon']){
            $sql .= " AND C.CARI LIKE :CARI";
            $data[':CARI'] = "%" . $request['salon'] . "%";
        }

        if($request['il_id'] > 0){
            $sql .= " AND C.IL_ID = :IL_ID";
            $data[':IL_ID'] = $request['il_id'];
        }

        if($request['ilce_id'] > 0){
            $sql .= " AND C.ILCE_ID = :ILCE_ID";
            $data[':ILCE_ID'] = $request['ilce_id'];
        }

        if(count2($request['brans_ids']) > 0){
            $sql .= " AND FIND_IN_SET(:BRANS_IDS, C.BRANS_IDS)";
            $data[':BRANS_IDS'] = FormatYazi::array2str($request['brans_ids']);
        }

        if($request['engelli'] > 0){
            $sql .= " AND C.ENGELLI = :ENGELLI";
            $data[':ENGELLI'] = $request['engelli'];
        }

        $sayfalama = $this->sayfalama(count2(DB::get($sql, $data)), 6, $request);
        $excel_sql = DB::getSQL($sql, $data);

        $sql .= $sayfalama->getLimitOffset();
        $rows = DB::get($sql, $data);

        return [
            'rows' => $rows,
            'sayfalama' => $sayfalama,
            'limit' => $sayfalama->getLimitOffset(),
            'excel_sql' => $excel_sql
        ];
    }

    public function getTalepler($request = array()) {

        $data = array();
        $sql = "SELECT 
                    T.*,
                    K.AD,
                    K.SOYAD,
                    K.TELEFON,
                    A.AVATAR,
                    A.CLASS,
                    A.ALT,
                    C.CARI,
                    IL.IL,
                    ILCE.ILCE,
                    B.BRANS
                FROM TALEP AS T
                    LEFT JOIN KULLANICI AS K ON K.ID = T.KAYIT_YAPAN_ID
                    LEFT JOIN AVATAR AS A ON A.ID = K.AVATAR_ID
                    LEFT JOIN CARI AS C ON C.ID = T.CARI_ID
                    LEFT JOIN IL AS IL ON IL.ID = C.IL_ID
                    LEFT JOIN ILCE AS ILCE ON ILCE.ID = C.ILCE_ID
                    LEFT JOIN BRANS AS B ON B.ID = T.BRANS_ID
                WHERE 1
                LIMIT 4
                ";
        $rows = DB::get($sql, $data);
        return  $rows;
    }

    public function getBranslar($request = array()) {

        $data = array();
        $sql = "SELECT 
                    B.*
                FROM BRANS AS B
                WHERE B.DURUM = 1
                ";
        $rows = DB::get($sql, $data);
        return  $rows;
    }

    public function getSporRotalari($request = array()) {

        $data = array();
        $sql = "SELECT 
                    R.*,
                    CONCAT_WS(' ',K.AD,K.SOYAD) AS KAYIT_YAPAN,
                    IL.IL,
                    ILCE.ILCE,
                    CONCAT('rota/', R.ID, '/', YEAR(R.TARIH), '/', RR.RESIM_ADI) AS RESIM_URL,
                    RR.ALT
                FROM ROTA AS R
                    LEFT JOIN IL AS IL ON IL.ID = R.IL_ID
                    LEFT JOIN ILCE AS ILCE ON ILCE.ID = R.ILCE_ID
                    LEFT JOIN KULLANICI AS K ON K.ID = R.KAYIT_YAPAN_ID
                    LEFT JOIN ROTA_RESIM AS RR ON RR.ROTA_ID = R.ID AND RR.VITRIN = 1
                WHERE 1
                ";

       
        if($request['il_id'] > 0){
            $sql .= " AND R.IL_ID = :IL_ID";
            $data[':IL_ID'] = $request['il_id'];
        }

        if($request['ilce_id'] > 0){
            $sql .= " AND R.ILCE_ID = :ILCE_ID";
            $data[':ILCE_ID'] = $request['ilce_id'];
        }

        $sayfalama = $this->sayfalama(count2(DB::get($sql, $data)), 6, $request);
        $excel_sql = DB::getSQL($sql, $data);

        $sql .= $sayfalama->getLimitOffset();
        $rows = DB::get($sql, $data);

        return [
            'rows' => $rows,
            'sayfalama' => $sayfalama,
            'limit' => $sayfalama->getLimitOffset(),
            'excel_sql' => $excel_sql
        ];
    }

    public function getSporTalepleri($request = array()) {

        $data = array();
        $sql = "SELECT 
                    T.*,
                    K.AD,
                    K.SOYAD,
                    K.TELEFON,
                    A.AVATAR,
                    A.CLASS,
                    A.ALT,
                    C.CARI,
                    IL.IL,
                    ILCE.ILCE,
                    B.BRANS,
                    CONCAT_WS(' ',K.AD,K.SOYAD) AS KAYIT_YAPAN
                FROM TALEP AS T
                    LEFT JOIN KULLANICI AS K ON K.ID = T.KAYIT_YAPAN_ID
                    LEFT JOIN AVATAR AS A ON A.ID = K.AVATAR_ID
                    LEFT JOIN CARI AS C ON C.ID = T.CARI_ID
                    LEFT JOIN IL AS IL ON IL.ID = C.IL_ID
                    LEFT JOIN ILCE AS ILCE ON ILCE.ID = C.ILCE_ID
                    LEFT JOIN BRANS AS B ON B.ID = T.BRANS_ID
                WHERE 1
                ";

        if($request['salon']){
            $sql .= " AND C.CARI LIKE :CARI";
            $data[':CARI'] = "%" . $request['salon'] . "%";
        }

        if($request['il_id'] > 0){
            $sql .= " AND C.IL_ID = :IL_ID";
            $data[':IL_ID'] = $request['il_id'];
        }

        if($request['ilce_id'] > 0){
            $sql .= " AND C.ILCE_ID = :ILCE_ID";
            $data[':ILCE_ID'] = $request['ilce_id'];
        }

        if(count2($request['brans_ids']) > 0){
            $sql .= " AND FIND_IN_SET(:BRANS_IDS, C.BRANS_IDS)";
            $data[':BRANS_IDS'] = FormatYazi::array2str($request['brans_ids']);
        }

        $sql .= " ORDER BY T.ID DESC";

        $sayfalama = $this->sayfalama(count2(DB::get($sql, $data)), 6, $request);
        $excel_sql = DB::getSQL($sql, $data);

        $sql .= $sayfalama->getLimitOffset();
        $rows = DB::get($sql, $data);

        return [
            'rows' => $rows,
            'sayfalama' => $sayfalama,
            'limit' => $sayfalama->getLimitOffset(),
            'excel_sql' => $excel_sql
        ];
    }

    public function getBloglar($request = array()) {

        $data = array();
        $sql = "SELECT 
                    B.*,
                    CONCAT_WS(' ',K.AD,K.SOYAD) AS KAYIT_YAPAN,
                    CONCAT('blog/', B.ID, '/', YEAR(B.TARIH), '/', BR.RESIM_ADI) AS RESIM_URL,
                    BRA.BRANS,
                    A.AVATAR,
                    A.CLASS,
                    A.ALT
                FROM BLOG AS B
                    LEFT JOIN KULLANICI AS K ON K.ID = B.KAYIT_YAPAN_ID
                    LEFT JOIN BLOG_RESIM AS BR ON BR.BLOG_ID = B.ID AND BR.VITRIN = 1
                    LEFT JOIN BRANS AS BRA ON BRA.ID = B.BRANS_ID
                    LEFT JOIN AVATAR AS A ON A.ID = K.AVATAR_ID
                WHERE 1
                ";

        if(count2($request['brans_ids']) > 0){
            $sql .= " AND FIND_IN_SET(:BRANS_IDS, B.BRANS_ID)";
            $data[':BRANS_IDS'] = FormatYazi::array2str($request['brans_ids']);
        }

        $sayfalama = $this->sayfalama(count2(DB::get($sql, $data)), 6, $request);
        $excel_sql = DB::getSQL($sql, $data);

        $sql .= $sayfalama->getLimitOffset();
        $rows = DB::get($sql, $data);

        return [
            'rows' => $rows,
            'sayfalama' => $sayfalama,
            'limit' => $sayfalama->getLimitOffset(),
            'excel_sql' => $excel_sql
        ];
    }

    public function getSalon($request = array()) {

        $data = array();
        $sql = "SELECT 
                    C.*,
                    CONCAT_WS(' ',K.AD,K.SOYAD) AS KAYIT_YAPAN,
                    IL.IL,
                    ILCE.ILCE,
                    (SELECT GROUP_CONCAT(B.BRANS) FROM BRANS AS B WHERE FIND_IN_SET(B.ID , C.BRANS_IDS)) AS BRANSLAR,
                    CONCAT('cari/', C.ID, '/', YEAR(C.TARIH), '/', CR.RESIM_ADI) AS RESIM_URL,
                    CR.ALT
                FROM CARI AS C
                    LEFT JOIN IL AS IL ON IL.ID = C.IL_ID
                    LEFT JOIN ILCE AS ILCE ON ILCE.ID = C.ILCE_ID
                    LEFT JOIN KULLANICI AS K ON K.ID = C.KAYIT_YAPAN_ID
                    LEFT JOIN CARI_RESIM AS CR ON CR.CARI_ID = C.ID AND CR.VITRIN = 1
                WHERE C.ID = :ID
                ";

        $data[':ID'] = $_REQUEST['id'];
        $row = DB::getRow($sql, $data);

        return $row;
    }

    public function getCariResimler($request = array()) {

        $data = array();
        $sql = "SELECT 
                    CR.*,
                    CONCAT('cari/', C.ID, '/', YEAR(C.TARIH), '/', CR.RESIM_ADI) AS RESIM_URL,
                    CONCAT_WS(' ',KU.AD,KU.SOYAD) AS KAYIT_YAPAN
                FROM CARI_RESIM AS CR
                    LEFT JOIN CARI AS C ON C.ID = CR.CARI_ID
                    LEFT JOIN KULLANICI AS KU ON KU.ID = C.KAYIT_YAPAN_ID
                WHERE C.ID =:ID
                ";

        $data[':ID'] = $request['id'];
        $row = DB::get($sql, $data);
        return $row;
    }
}