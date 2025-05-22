<?

class Sayfalama {
    private $gecerliSayfa;
    private $toplamVeri;
    private $sayfaBasinaVeri;
    private $url;

    public function __construct($toplamVeri, $sayfaBasinaVeri, $gecerliSayfa, $url) {
        $this->toplamVeri = $toplamVeri;
        $this->sayfaBasinaVeri = $sayfaBasinaVeri;
        $this->gecerliSayfa = max(1, $gecerliSayfa);
        $this->url = $url;
    }

    public function getLimitOffset() {
        $offset = ($this->gecerliSayfa - 1) * $this->sayfaBasinaVeri;
        return " LIMIT $offset, $this->sayfaBasinaVeri";
    }

    public function sayfalamaOlustur() {
        $toplamSayfa = ceil($this->toplamVeri / $this->sayfaBasinaVeri);
        if ($toplamSayfa <= 1) return '';

        $sayfalama = '
        <div class="row" data-aos-offset="50" data-aos="fade-up" data-aos-duration="400">
            <div class="col-12 m-auto">
                <div class="theme-pagination text-center">
                    <ul>';

        $sayfalama .= $this->oncekiSayfa();
        $sayfalama .= $this->sayfaLinkleri($toplamSayfa);
        $sayfalama .= $this->sonrakiSayfa($toplamSayfa);

        $sayfalama .= '
                    </ul>
                </div>
            </div>
        </div>';

        return $sayfalama;
    }

    private function oncekiSayfa() {
        $onceki = max(1, $this->gecerliSayfa - 1);
        $disabled = $this->gecerliSayfa == 1 ? 'style="pointer-events: none; opacity: 0.5;"' : '';

        return '<li>
                    <a href="' . ($this->gecerliSayfa > 1 ? $this->sayfaUrl($onceki) : '#') . '" ' . $disabled . '>
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </li>';
    }

    private function sonrakiSayfa($toplamSayfa) {
        $sonraki = min($toplamSayfa, $this->gecerliSayfa + 1);
        $disabled = $this->gecerliSayfa == $toplamSayfa ? 'style="pointer-events: none; opacity: 0.5;"' : '';

        return '<li>
                    <a href="' . ($this->gecerliSayfa < $toplamSayfa ? $this->sayfaUrl($sonraki) : '#') . '" ' . $disabled . '>
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </li>';
    }

    private function sayfaLinkleri($toplamSayfa) {
        $linkler = '';
        $aralik = 2;
        $baslangic = max(1, $this->gecerliSayfa - $aralik);
        $bitis = min($toplamSayfa, $this->gecerliSayfa + $aralik);

        if ($baslangic > 1) {
            $linkler .= '<li><a href="' . $this->sayfaUrl(1) . '">1</a></li>';
            if ($baslangic > 2) {
                $linkler .= '<li>...</li>';
            }
        }

        for ($sayfa = $baslangic; $sayfa <= $bitis; $sayfa++) {
            $aktif = $this->gecerliSayfa == $sayfa ? 'class="active"' : '';
            $linkler .= '<li><a ' . $aktif . ' href="' . $this->sayfaUrl($sayfa) . '">' . sprintf('%02d', $sayfa) . '</a></li>';
        }

        if ($bitis < $toplamSayfa) {
            if ($bitis < $toplamSayfa - 1) {
                $linkler .= '<li>...</li>';
            }
            $linkler .= '<li><a href="' . $this->sayfaUrl($toplamSayfa) . '">' . sprintf('%02d', $toplamSayfa) . '</a></li>';
        }

        return $linkler;
    }

    private function sayfaUrl($sayfa) {
        $parsedUrl = parse_url($this->url);
        parse_str($parsedUrl['query'] ?? '', $queryParams);
        $queryParams['page'] = $sayfa;
        return '?' . http_build_query($queryParams);
    }
}

