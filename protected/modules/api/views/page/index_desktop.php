<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.01.2017
 * Time: 16:05
 */?>
<div class="b-yota-app">
    <div class="b-yota-app__b_1">
        <div class="inner-wrapper">
            <div class="b-yota-app__b_1_title">
                <div class="row-1">Yota для компьютера</div>
                <div class="row-2">Мы сохранили предложение,<br>которое вам понравилось:</div>
            </div>
        </div>
    </div>
    <div class="b-yota-app__b_2">
        <div class="inner-wrapper">
            <div class="b-yota-app__b_2_left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/styles-app/icon-desktop-1.png" alt="">
            </div>
            <div class="b-yota-app__b_2_content">
                <?php foreach ($models as $model) :?>
                    <?php if ($model->period!='minimum'):?>
                        <div class="b-yota-app__b_2_text">
                            <div class="row-1">
                                <?php if ($model->speed=='maximum'): ?>
                                    Безлимитный интернет на <br>
                                    на максимальной скорости
                                <?php else: ?>
                                    Безлимитный интернет на скорости<br>
                                    до <?php
                                    $speed=$model->speed/1000;
                                    if ($speed>=1)
                                        echo $speed.' Мбит/с';
                                    else
                                        echo $model->speed.' кбит/с';
                                    ?>.
                                <?php endif;?>
                            </div>
                            <div class="row-2"><?= $model->price ?> р. <span>на <?php
                                switch ($model->period) {
                                    case 'year':
                                        echo '12 месяцев';
                                        break;
                                    case 'month':
                                        echo '30 дней';
                                        break;
                                    case 'half':
                                        echo '6 месяцев';
                                        break;
                                    default:
                                        echo (($model->time==24)?'1 день':$model->time.' часа');
                                }
                                ?>
                                </span></div>
                        </div>
                    <?php else: ?>
                        <div class="b-yota-app__b_2_text">
                            <div class="row-1">
                                <p>Безлимитный интернет</p>
                                <p>на <?= $model->time ?> часа</p>
                            </div>
                            <div class="row-2"><?= $model->price ?> р.</div>
                        </div>
                    <?php endif; ?>
                <?php endforeach;?>

            </div>
        </div>
    </div>
    <div class="b-yota-app__b_3">
        <div class="inner-wrapper">
            <div class="b-yota-app__b_3_buttons">
                <a href="#" class="button-1">Заказать SIM-карту</a>
                <a href="#" class="button-2">Посмотреть другие условия</a>
            </div>
        </div>
    </div>
    <div class="b-yota-app__b_4">
        <div class="inner-wrapper">
            <div class="b-yota-app__b_4_top">
                <div class="b-yota-app__b_4_top div-info">
                    <ul class="info">
                        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/styles-app/icon-advantages-1.png" alt=""></li>
                        <li class="info-text">Бесплатное общение внутри сети</li>
                    </ul>
                    <ul class="info">
                        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/styles-app/icon-advantages-2.png" alt=""></li>
                        <li class="info-text">По России &mdash; без доплат</li>
                    </ul>
                    <ul class="info">
                        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/styles-app/icon-advantages-3.png" alt=""></li>
                        <li class="info-text">Междугородние звонки по цене местных</li>
                    </ul>
                </div>
            </div>
            <div class="b-yota-app__b_4_bottom">Ограничения по территориям и условиям на <a href="#" target="_blank">yota.ru</a></div>
        </div>
    </div>
</div>
