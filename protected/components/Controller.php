<?php

class Controller extends CController
{
    public $header = '';
    public $sub_header = '';
    public $header_button = '';
    public $running_text = '';
    public $reservation = '';
    public $sub_reservation = '';
    public $title_reservation = '';
    public $about_title = '';
    public $about_sub_title = '';
    public $about_value_p1 = '';
    public $about_value_p2 = '';
    public $about_button = '';
    public $event_title = '';
    public $event_sub_title = '';
    public $event_button = '';
    public $social_title = '';
    public $social_sub_title = '';
    public $copyright_title = '';
    public $contact_title = '';
    public $phone_title = '';
    public $hours_title = '';
    public $address_title = '';
    public $address_value = '';
    public $form_title = '';
    public $form_first_name = '';
    public $form_last_name = '';
    public $form_button = '';
    public $menu_title = '';
    public $menu_sub_title = '';
    public $food_name = '';
    public $beverage_name = '';
    public $spirit_name = '';
    public $cigar_name = '';
    public $space_title = '';
    public $space_sub_title = '';
    public $view_menus = '';
    public $sub_view_menus = '';
    public $hero_reservation = '';
    public $sub_hero_reservation = '';
    public $space_view_button = '';
    public $space_reserver_button = '';
    public $news_title = '';
    public $news_sub_title = '';

    public $map;
    public $hero_interval;

    public $instagramToken;
    public $logo;
    public $whatsApp_number;

    public $email;
    public $phone_number;

    public $address;

    public $tiktok_username;
    public  $instagram_username;
    public $facebook_username;
    public $contact_button;
    public $upcoming_event_button;
    public $highlight_button;
    public $reservation_button;
    public $other_event_title;
    public $other_event_sub_title;
    public $other_event_detail_button;

    public $navbar_bg;

    public $navbar_bg_scroll;

    public $about_bg_1;
    public $about_bg_2;

    public $space_bg_1;
    public $space_bg_2;

    public $menu_bg_1;
    public $menu_bg_2;

    public $event_bg_1;
    public $event_bg_2;

    public $news_bg_1;
    public $news_bg_2;
    public $contact_bg_1;
    public $contact_bg_2;

    public $footer_bg_1;
    public $footer_bg_2;


    public $gallery_bg_1 ;
    public $gallery_bg_2 ;
    public $music_bg_1 ;
    public $music_bg_2 ;


    public $menuItems = [];

    public $events = [];

    public function init()
    {
        parent::init();

        /* ===============================
           LANGUAGE SESSION
        ================================ */
        if (!isset(Yii::app()->session['lang'])) {
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            Yii::app()->session['lang'] = ($browserLang === 'en') ? 'en' : 'id';
        }

        $lang = Yii::app()->session['lang'];
        Yii::app()->language = $lang;

        $field = ($lang === 'en') ? 'content_english' : 'content';

        /* ===============================
           ASSET LOAD
        ================================ */
        $cs = Yii::app()->clientScript;

        $css = [
            '/assets/css/bootstrap.min.css',
            '/assets/css/bootstrap-icons.css',

            '/css/main.css',
            '/css/main-mobile.css',

            '/css/navbar.css',
            '/css/hero.css',
            '/css/running-text.css',
            '/css/reservation.css',
            '/css/about.css',
            '/css/space.css',
            '/css/menu.css',
            '/css/event.css',
            '/css/social.css',
            '/css/contact.css',
            '/css/footer.css',
            '/css/news.css',
            '/css/news_page.css',
            '/css/news_detail_page.css',
            '/css/about_page.css',
            '/css/space_detail_page.css',
            '/css/contact_page.css',
        ];

        foreach ($css as $file) {
            $cs->registerCssFile(Yii::app()->baseUrl . $file);
        }

        $cs->registerCssFile(
            Yii::app()->baseUrl . '/css/main-mobile.css',
            'screen and (max-width: 768px)'
        );

        $cs->registerScriptFile(
            Yii::app()->baseUrl . '/assets/js/bootstrap.bundle.min.js',
            CClientScript::POS_END
        );

        /* ===============================
           MENU
        ================================ */
        $this->menuItems = Navigation::model()
            ->findAll([
                'condition' => 't.is_active = 1',
                'order' => 't.sort_order ASC']);

        /* ===============================
           HEADER CONTENT (CACHED)
        ================================ */
        $contentMap = [
            'header' => 'header',
            'sub_header' => 'sub_header',
            'header_button' => 'header_button',
            'running_text' => 'running_text',

            'reservation' => 'reservation',
            'sub_reservation' => 'sub_reservation',
            'title_reservation' => 'title_reservation',

            'about_title' => 'about_title',
            'about_sub_title' => 'about_sub_title',
            'about_value_p1' => 'about_value_p1',
            'about_value_p2' => 'about_value_p2',
            'about_button' => 'about_button',

            'event_title' => 'event_title',
            'event_sub_title' => 'event_sub_title',
            'event_button' => 'event_button',

            'social_title' => 'social_title',
            'social_sub_title' => 'social_sub_title',

            'copyright_title' => 'copyright_title',

            'contact_title' => 'contact_title',
            'phone_title' => 'phone_title',
            'hours_title' => 'hours_title',
            'address_title' => 'address_title',
            'address_value' => 'address_value',

            'form_title' => 'form_title',
            'form_first_name' => 'form_first_name',
            'form_last_name' => 'form_last_name',
            'form_button' => 'form_button',

            'menu_title' => 'menu_title',
            'menu_sub_title' => 'menu_sub_title',

            'food_name' => 'food_name',
            'beverage_name' => 'beverage_name',
            'spirit_name' => 'spirit_name',
            'cigar_name' => 'cigar_name',

            'space_title' => 'space_title',
            'space_sub_title' => 'space_sub_title',
            'view_menus' => 'view_menus',
            'sub_view_menus' => 'sub_view_menus',

            'hero_reservation' => 'hero_reservation',
            'sub_hero_reservation' => 'sub_hero_reservation',

            'space_view_button' => 'space_view_button',
            'space_reserver_button' => 'space_reserver_button',

            'news_title' => 'news_title',
            'news_sub_title' => 'news_sub_title',
            'contact_button' => 'contact_button',
            'upcoming_event_button'	=>	'upcoming_event_button',
            'highlight_button'	=>	'highlight_button',
            'reservation_button'	=>	'reservation_button',
            'other_event_title'	=>	'other_event_title',
            'other_event_sub_title'	=>	'other_event_sub_title',
            'other_event_detail_button'	=>	'other_event_detail_button'
        ];

        $dataHeader = $this->loadKeyValue(
            HeaderContent::class,
            'type',
            $field
        );

        foreach ($contentMap as $property => $type) {
            $this->$property = $dataHeader[$type] ?? "Default {$type}";
        }

        /* ===============================
           GLOBAL SETTING (CACHED)
        ================================ */
        $dataSetting = $this->loadKeyValue(
            Setting::class,
            'key',
            'value'
        );

        $this->instagramToken = $dataSetting['instagramToken'] ?? '';
        $this->logo = $dataSetting['logo'] ?? '';
        $this->whatsApp_number = $dataSetting['whatsApp_number'] ?? '';
        $this->email = $dataSetting['email'] ?? '';
        $this->phone_number = $dataSetting['phone_number'] ?? '';
        $this->address = $dataSetting['address'] ?? '';
        $this->map = $dataSetting['map'] ?? '';
        $this->hero_interval = isset($dataSetting['hero_interval'])
            ? (int)$dataSetting['hero_interval']
            : 3000;
        $this->tiktok_username = $dataSetting['tiktok_username'] ?? '';
        $this->instagram_username = $dataSetting['instagram_username'] ?? '';
        $this->facebook_username = $dataSetting['facebook_username'] ?? '';
        $this->navbar_bg  = $dataSetting['navbar_bg'] ?? '#0F0F0F';
        $this->navbar_bg_scroll  = $dataSetting['navbar_bg_scroll'] ?? '#0F0F0F';
        $this->about_bg_1  = $dataSetting['about_bg_1'] ?? '#FAFAFA';
        $this->about_bg_2  = $dataSetting['about_bg_2'] ?? '#FAFAFA';
        $this->space_bg_1 = $dataSetting['space_bg_1'] ?? '#efe6dc';
        $this->space_bg_2 = $dataSetting['space_bg_2'] ?? '#5c3a28';
        $this->menu_bg_1 = $dataSetting['menu_bg_1'] ?? '#4b2d1f';
        $this->menu_bg_2 = $dataSetting['menu_bg_2'] ?? '#121212';
        $this->event_bg_1 = $dataSetting['event_bg_1'] ?? '#18110c';
        $this->event_bg_2 = $dataSetting['event_bg_2'] ?? '#101010';
        $this->news_bg_1 = $dataSetting['news_bg_1'] ?? '#1a1a1a';
        $this->news_bg_2 = $dataSetting['news_bg_2'] ?? '#0c0c0c';
        $this->contact_bg_1   = $dataSetting['contact_bg_1'] ?? '#1f1f1f';
        $this->contact_bg_2   = $dataSetting['contact_bg_2'] ?? '#121212';
        $this->footer_bg_1 = $dataSetting['footer_bg_1'] ?? '#111111';
        $this->footer_bg_2 = $dataSetting['footer_bg_2'] ?? '#0b0b0b';
        $this->gallery_bg_1 = $dataSetting['gallery_bg_1'] ?? '#1a0f0a';
        $this->gallery_bg_2 = $dataSetting['gallery_bg_2'] ?? '#120807';
        $this->music_bg_1 = $dataSetting['music_bg_1'] ?? '#1a0f0a';
        $this->music_bg_2 = $dataSetting['music_bg_2'] ?? '#120807';



        /* ===============================
           EVENTS
        ================================ */
        $this->events = Event::model()
            ->active()
            ->findAll([
                'order' => 'event_date DESC'
            ]);
    }

    public function getHeaderImage()
    {
        $folder = Yii::getPathOfAlias('webroot') . '/images/header/';
        $urlFolder = Yii::app()->baseUrl . '/images/header/';

        // allowed image types
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (is_dir($folder)) {
            foreach (scandir($folder) as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, $allowed)) {
                    return $urlFolder . $file; // return first valid image
                }
            }
        }

        // fallback if no image found
        return $urlFolder . 'main.png';
    }

    public function getHeaderMedia()
    {
        $folder = Yii::getPathOfAlias('webroot') . '/images/header';
        $urlBase = Yii::app()->baseUrl . '/images/header';

        $media = [];

        if (!is_dir($folder)) {
            return $media;
        }

        // scan for common image/video extensions
        $files = glob($folder . '/*.{jpg,jpeg,png,gif,webp,mp4,mov,webm}', GLOB_BRACE);
        // sort by modified time descending so newest first (optional)
        usort($files, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        foreach ($files as $f) {
            $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
            $name = basename($f);
            $url = $urlBase . '/' . $name;

            if (in_array($ext, ['mp4', 'webm', 'mov'])) {
                $media[] = ['type' => 'video', 'url' => $url];
            } else {
                $media[] = ['type' => 'image', 'url' => $url];
            }
        }

        return $media;
    }

    /**
     * Optional helper: get setting value by key stored in settings table (if you have it).
     * If you do not have Settings::model(), comment this or adjust.
     */
    public function getSetting($key, $default = null)
    {
        if (class_exists('Setting')) {
            $s = Setting::model()->findByAttributes(['key' => $key]);
            if ($s) return $s->value;
        }
        return $default;
    }

    public function actionSetLanguage($lang)
    {
        if (!in_array($lang, ['id', 'en'])) {
            $lang = 'id';
        }

        Yii::app()->session['lang'] = $lang;
        Yii::app()->language = $lang;

        $this->redirect(
            Yii::app()->request->urlReferrer
                ?: Yii::app()->createUrl('site/index')
        );
    }

    public function getRealInstagramFeed($limit = 10)
    {
        $cacheKey = "ig_feed_" . $limit;

        // optional: pakai cache Yii
        if (Yii::app()->hasComponent('cache')) {
            $cached = Yii::app()->cache->get($cacheKey);
            if ($cached !== false) {
                return $cached;
            }
        }

        $token = Yii::app()->params['instagramToken'] ?? null;

        if (empty($token) || $token === 'ISI_TOKEN_INSTAGRAM_DI_SINI') {
            return [];
        }

        $url = "https://graph.instagram.com/me/media"
            . "?fields=id,media_type,media_url,thumbnail_url,permalink"
            . "&limit={$limit}"
            . "&access_token={$token}";

        $json = @file_get_contents($url);
        if (!$json) {
            return [];
        }

        $data = json_decode($json, true);

        $posts = $data['data'] ?? [];

        // Cache 1 jam
        if (Yii::app()->hasComponent('cache')) {
            Yii::app()->cache->set($cacheKey, $posts, 3600);
        }

        return $posts;
    }

    public function getDemoInstagramFeed($limit = 10)
    {
        $folder = Yii::getPathOfAlias('webroot') . '/images/demo_ig/';
        $baseUrl = Yii::app()->baseUrl . '/images/demo_ig/';

        if (!is_dir($folder)) {
            return [];
        }

        $files = glob($folder . '*.{jpg,jpeg,png,webp}', GLOB_BRACE);
        if (!$files) {
            return [];
        }

        sort($files);

        $demo = [];
        foreach ($files as $file) {

            if (count($demo) >= $limit) {
                break;
            }

            $demo[] = [
                'media_type' => 'IMAGE',
                'media_url' => $baseUrl . basename($file),
                'permalink' => 'https://instagram.com',
                'caption' => 'Demo Instagram'
            ];
        }

        return $demo;
    }


    public function getMusicImage($limit = 10)
    {
        $folder = Yii::getPathOfAlias('webroot') . '/images/music/';
        $baseUrl = Yii::app()->baseUrl . '/images/music/';

        if (!is_dir($folder)) {
            return [];
        }

        $files = glob($folder . '*.{jpg,jpeg,png,webp}', GLOB_BRACE);
        if (!$files) {
            return [];
        }

        sort($files);

        $demo = [];
        foreach ($files as $file) {

            if (count($demo) >= $limit) {
                break;
            }

            $demo[] = [
                'media_type' => 'IMAGE',
                'media_url' => $baseUrl . basename($file),
                'permalink' => 'link',
                'caption' => 'caption'
            ];
        }

        return $demo;
    }


    public function getInstagramFeed($limit = 10)
    {
        // jika token valid → pakai Instagram API
        if ($this->isInstagramTokenValid()) {

            $real = $this->getRealInstagramFeed($limit);

            // kalau API sukses, pakai hasilnya
            if (!empty($real)) {
                return $real;
            }
        }

        // jika token kosong / placeholder / API gagal → ambil dari folder
        return $this->getDemoInstagramFeed($limit);
    }


    protected function isInstagramTokenValid()
    {
        $token = $this->instagramToken;

        return !empty($token) && $token !== 'ISI_TOKEN_INSTAGRAM_DI_SINI';
    }


    public function slugify($text)
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim($text, '-');
    }

    public function getAboutImages()
    {
        $basePath = Yii::getPathOfAlias('webroot') . '/images/about';
        $baseUrl = Yii::app()->baseUrl . '/images/about';

        if (!is_dir($basePath)) {
            return [];
        }

        $files = glob($basePath . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);

        if (!$files) {
            return [];
        }

        sort($files); // urutkan biar konsisten

        return array_map(function ($f) use ($baseUrl) {
            return $baseUrl . '/' . basename($f);
        }, $files);
    }


    protected function loadKeyValue($modelClass, $keyField, $valueField)
    {
        return CHtml::listData(
            $modelClass::model()->findAll(),
            $keyField,
            $valueField
        );
    }

}

