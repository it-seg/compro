<?php
class SiteController extends Controller
{
    public function actionIndex()
    {
        $news   = array_slice($this->getNewsData(), 0, 3);
        $spaces = $this->getSpaceData();
        $menus  = $this->getMenuData();
        $sections = $this->getSectionsData();


        $this->render('index', [
            'news'     => $news,
            'spaces'   => $spaces,
            'menus'    => $menus,
            'sections' => $sections
        ]);

    }

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionMenu()
    {
        $menus = $this->getMenuData(); // dari DB
        $active = Yii::app()->request->getParam('section');

        // fallback ke menu pertama
        if (!$active && !empty($menus)) {
            $active = $menus[0]['slug'];
        }

        $menuBg1 = $this->menu_bg_1 ?? '#2c2116';
        $menuBg2 = $this->menu_bg_2 ?? '#0b0805';

        $this->render('menu_page', [
            'menus'        => $menus,
            'activeSection'=> $active,
            'menuBg1'       => $menuBg1,
            'menuBg2'       => $menuBg2,
        ]);
    }

    public function actionEvent()
    {
        $today = date('Y-m-d');
        $lang  = Yii::app()->language;

        $titleCol = ($lang === 'id') ? 'title_ind' : 'title';
        $descCol  = ($lang === 'id') ? 'description_ind' : 'description';

        // ================================
        // UPCOMING EVENT
        // ================================
        $upcoming = Event::model()->find([
            'select' => "
            *,
            COALESCE({$titleCol}, title) AS title,
            COALESCE({$descCol}, description) AS description
        ",
            'condition' => 'is_active = 1 AND event_date >= :today',
            'params'    => [':today' => $today],
            'order'     => 'event_date ASC',
        ]);

        // ================================
        // OTHER EVENTS
        // ================================
        $condition = 'is_active = 1';
        $params    = [];

        if ($upcoming) {
            $condition .= ' AND id != :id';
            $params[':id'] = $upcoming->id;
        }

        $otherEvents = Event::model()->findAll([
            'select' => "
            *,
            COALESCE({$titleCol}, title) AS title,
            COALESCE({$descCol}, description) AS description
        ",
            'condition' => $condition,
            'params'    => $params,
            'order'     => 'event_date DESC',
        ]);

        $eventBg1 = $this->event_bg_1 ?? '#1b120c';
        $eventBg2 = $this->event_bg_2 ?? '#080503';

        $this->render('event_page', [
            'upcoming'    => $upcoming,
            'otherEvents' => $otherEvents,
            'eventBg1'    => $eventBg1,
            'eventBg2'    => $eventBg2,
        ]);
    }

    public function actionEvent_detail($id)
    {
        $lang = Yii::app()->language;

        $titleCol = ($lang === 'id') ? 'title_ind' : 'title';
        $descCol  = ($lang === 'id') ? 'description_ind' : 'description';

        $event = Event::model()->find([
            'select' => "
            *,
            COALESCE({$titleCol}, title) AS title,
            COALESCE({$descCol}, description) AS description
        ",
            'condition' => 'id = :id AND is_active = 1',
            'params'    => [':id' => $id],
        ]);

        if (!$event) {
            throw new CHttpException(404, 'Event not found');
        }

        $eventBg1 = $this->event_bg_1 ?? '#1f1a14';
        $eventBg2 = $this->event_bg_2 ?? '#000000';

        $this->render('event_detail', [
            'event' => $event,
            'eventBg1'  => $eventBg1,
            'eventBg2'  => $eventBg2,
        ]);
    }

    public function actionGallery()
    {
        $galleryBg1 = $this->gallery_bg_1 ?? '#1a0f0a';
        $galleryBg2 = $this->gallery_bg_2 ?? '#120807';

        $this->render('gallery_page', [
            'galleryBg1' => $galleryBg1,
            'galleryBg2' => $galleryBg2,
        ]);
    }

    public function actionSpace()
    {
        $spaces = $this->getSpaceData();

        $this->render('space_page', [
            'spaces' => $spaces
        ]);
    }


    public function actionContact()
    {
        $this->render('contact_page');
    }

    public function actionNews()
    {
        $this->render('news_page', [
            'news' => $this->getNewsData()
        ]);
    }


    public function actionSpaceDetail($slug)
    {
        $lang = Yii::app()->language;

        if ($lang === 'id') {
            $titleCol = 'title_ind';
            $descCol  = 'desc_ind';
        } else {
            $titleCol = 'title';
            $descCol  = 'desc';
        }

        $sql = "
        SELECT
            slug,
            COALESCE({$titleCol}, title) AS title,
            COALESCE(`{$descCol}`, `desc`) AS `desc`,
            slug AS folder
        FROM space
        WHERE slug = :slug
          AND is_active = 1
        LIMIT 1
    ";

        $space = Yii::app()->db
            ->createCommand($sql)
            ->bindValue(':slug', $slug)
            ->queryRow();

        if (!$space) {
            throw new CHttpException(404, 'Space not found');
        }

        $this->render('space_detail_page', [
            'space' => $space
        ]);
    }

    public function actionNewsDetail($slug)
    {
        $all = $this->getNewsData();
        $current = null;
        $related = [];

        foreach ($all as $n) {
            if ($n['slug'] === $slug) {
                $current = $n;
            } else {
                $related[] = $n;
            }
        }

        if (!$current) {
            throw new CHttpException(404, 'News not found');
        }

        $this->render('news_detail_page', [
            'news'        => $current,
            'relatedNews' => array_slice($related, 0, 2)
        ]);
    }

    protected function getNewsData($limit = null)
    {
        $lang = Yii::app()->language; // 'id' atau 'en'

        if ($lang === 'id') {
            $title   = 'title_ind';
            $slug    = 'slug';
            $short   = 'short_content_ind';
            $content = 'content_ind';
        } else {
            $title   = 'title';
            $slug    = 'slug';
            $short   = 'short_content';
            $content = 'content';
        }

        $sql = "
        SELECT
            {$title}   AS title,
            {$slug}    AS slug,
            {$short}   AS short,
            {$content} AS content,
            image,
            DATE_FORMAT(publish_date, '%d %M %Y') AS date,
            is_main
        FROM news
        WHERE is_active = 1
        ORDER BY publish_date DESC
    ";

        if ($limit !== null) {
            $sql .= " LIMIT :limit";
        }

        $cmd = Yii::app()->db->createCommand($sql);

        if ($limit !== null) {
            $cmd->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        }

        return $cmd->queryAll();
    }

    protected function getSpaceData()
    {
        $lang = Yii::app()->language;

        $titleCol = ($lang === 'id') ? 'title_ind' : 'title';
        $descCol  = ($lang === 'id') ? 'desc_ind'  : 'desc';

        $rows = Yii::app()->db->createCommand("
        SELECT
            slug,
            COALESCE({$titleCol}, title) AS title,
            COALESCE(`{$descCol}`, `desc`) AS `desc`
        FROM space
        WHERE is_active = 1
        ORDER BY sort_order ASC
    ")->queryAll();

        foreach ($rows as &$s) {

            $basePath = Yii::getPathOfAlias('webroot') . '/images/spaces/' . $s['slug'];
            $baseUrl  = Yii::app()->baseUrl . '/images/spaces/' . $s['slug'];

            // PRIORITY: cover image in folder
            $cover = null;
            foreach (['cover.webp','cover.jpg','cover.png','cover.jpeg'] as $c) {
                if (is_file($basePath . '/' . $c)) {
                    $cover = $baseUrl . '/' . $c;
                    break;
                }
            }

            $s['cover'] = $cover;
        }

        return $rows;
    }

    protected function getMenuData()
    {
        $lang = Yii::app()->language;
        $nameCol = ($lang === 'id') ? 'name_ind' : 'name';

        $rows = Yii::app()->db->createCommand("
        SELECT
            slug,
            {$nameCol} AS name
        FROM menu
        WHERE is_active = 1
        ORDER BY sort_order ASC
    ")->queryAll();

        foreach ($rows as &$m) {

            $basePath = Yii::getPathOfAlias('webroot') . '/images/menu/' . $m['slug'];
            $baseUrl  = Yii::app()->baseUrl . '/images/menu/' . $m['slug'];

            // cari cover
            $cover = null;
            foreach (['cover.webp','cover.jpg','cover.png','cover.jpeg'] as $c) {
                if (is_file($basePath . '/' . $c)) {
                    $cover = $baseUrl . '/' . $c;
                    break;
                }
            }

            $m['cover'] = $cover;
        }

        return $rows;
    }

    protected function getMenuImages($slug)
    {
        $basePath = Yii::getPathOfAlias('webroot') . '/images/menu/' . $slug;
        $baseUrl  = Yii::app()->baseUrl . '/images/menu/' . $slug;

        if (!is_dir($basePath)) {
            return [];
        }

        $files = glob($basePath . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);

        // exclude cover
        $files = array_filter($files, function ($f) {
            return !preg_match('/cover\.(jpg|jpeg|png|webp)$/i', $f);
        });

        sort($files);

        return array_map(function ($f) use ($baseUrl) {
            return $baseUrl . '/' . basename($f);
        }, $files);
    }

    protected function getSectionsData()
    {
        return HomepageSection::model()->findAll([
            'condition' => 'is_active = 1',
            'order'    => 'sort_order ASC'
        ]);
    }

    public function actionMusic()
    {
        $musicBg1 = $this->music_bg_1 ?? '#1a0f0a';
        $musicBg2 = $this->music_bg_2 ?? '#120807';

        $this->render('music_page', [
            'musicBg1' => $musicBg1,
            'musicBg2' => $musicBg2,
        ]);
    }


}
