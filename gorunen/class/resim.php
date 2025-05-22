<?

class ResimYukle{

    public function fncResimYukle($yol, $files){

        $result = array();
        if (!is_dir($yol)) {
            mkdir($yol, 0777, true);
        }

        foreach ($files['tmp_name'] as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                $dosyaUzantisi = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
                $resimAdi = $this->fncBase64($dosyaUzantisi);
                $dosyaYolu = $yol . $resimAdi;

                if (move_uploaded_file($tmp_name, $dosyaYolu)) {
                    $result[] = [
                        "HATA"          => FALSE,
                        "RESIM_ADI"     => $resimAdi,
                        "RESIM_ADI_ILK" => $files['name'][$key],
                        "DOSYA_YOLU"    => $dosyaYolu
                    ];
                } else {
                    $result[] = [
                        "HATA"      => TRUE,
                        "DOSYA_AD"  => "Dosya yüklenemedi: " . $files['name'][$key]
                    ];
                }
            }
        }

        return $result;
    }

    private function fncBase64($uzanti){
        list($usec, $sec) = explode(' ', microtime());
        $benzersiz = str_replace('.', '', (((float)$usec + (float)$sec)));
        return str_pad($benzersiz, 14, "0", STR_PAD_RIGHT) . '.' . $uzanti;
    }
}
