<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $items=[];
    if(Yii::$app->user->isGuest){
        $items[] = ['label' => 'Registration', 'url' => ['/user/create']];
        $items[] =['label' => 'Auntitifaction', 'url' => ['/site/login']];
    }else{
        if(Yii::$app->user->identity->admin == 1) {
            $items[] =$items[] = ['label' => 'Panel Administration', 'url' => ['/admin']];
        }else{
            $items[] = ['label' => 'My Panel', 'url' => ['/lk']];

        }
      $items[]= '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
             . Html::submitButton(
                   'Logout (' . Yii::$app->user->identity->login . ')',
                 ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
             . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
            'items'=>$items,
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],]
//            ['label' => 'Registration', 'url' => ['/user/create']],
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->login . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
    ]);
    NavBar::end();
    
    ?>
   
</header>
<div class = 'contents'>

</div>
<main role="main" class="flex-shrink-0">
  
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
   
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<style>
    .bg-dark {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-dark-rgb),var(--bs-bg-opacity))!important;
   max-height: 100px;
   margin-bottom:100px ;
}
.contents{
    width:200px; 

    padding-bottom: 100px;
}
</style>