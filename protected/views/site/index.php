<?php foreach ($sections as $section): ?>

    <?php switch ($section->section_key):

        case 'hero':
            $this->renderPartial('//layouts/_hero');
            break;

        case 'running_text':
            $this->renderPartial('//layouts/_running_text');
            break;

        case 'reservation':
            $this->renderPartial('//layouts/_reservation');
            break;

        case 'about':
            $this->renderPartial('//layouts/_about');
            break;

        case 'space':
            $this->renderPartial('//layouts/_space', [
                'spaces' => $spaces
            ]);
            break;

        case 'menu':
            $this->renderPartial('//layouts/_menu', [
                'menus' => $menus
            ]);
            break;

        case 'event':
            $this->renderPartial('//layouts/_event');
            break;

        case 'news':
            $this->renderPartial('//layouts/_news', [
                'news' => $news
            ]);
            break;

        case 'social':
            $this->renderPartial('//layouts/_social');
            break;

    endswitch; ?>

<?php endforeach; ?>
