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
                <div class="row-1">Yota для смартфона</div>
                <div class="row-2">Мы сохранили предложение,<br>которое вам понравилось:</div>
            </div>
        </div>
    </div>
    <div class="b-yota-app__b_2">
        <div class="inner-wrapper">
            <div class="b-yota-app__b_2_left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/styles-app/icon-mobile-1.png" alt="">
            </div>
            <div class="b-yota-app__b_2_content">

                        <div class="b-yota-app__b_2_text">
                            <div class="row-1">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="font:16px/20px Arial, Helvetica, sans-serif; color:#303030; padding: 0 0 10px;">
                                            <?php if (isset($models->minutes) && is_array($models->minutes)) : ?>
                                                <?php foreach ($models->minutes as $minute) : ?>
                                                    <?= $minute->minutes ?> минут
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            и
                                            <?php if (isset($models->traffic) && is_array($models->traffic)) : ?>
                                                <?php foreach ($models->traffic as $traffic) : ?>
                                                    <?= $traffic->traffic ?> Гб
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php if (isset($params['social_networks']) || isset($params['messengers'])): ?>
                                        <tr>
                                            <td style="font:16px/20px Arial, Helvetica, sans-serif; color:#303030; padding: 0 0 10px;">
                                                Безлимитные приложения:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="img" style="padding: 0 0 10px;" >
                                                <?php if (isset($params['social_networks']) && is_array($params['social_networks'])) : ?>
                                                    <?php foreach ($params['social_networks'] as $social_networks) : ?>
                                                        <a href="#" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/<?php echo $social_networks;?>.png" style="vertical-align:top; width: 29px;" width="29" border="0" alt="<?php echo $social_networks;?>" /></a>
                                                        &nbsp;
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <?php if (isset($params['messengers']) && is_array($params['messengers'])) : ?>
                                                    <?php foreach ($params['messengers'] as $messengers) : ?>
                                                        <a href="#" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/<?php echo $messengers;?>.png" style="vertical-align:top; width: 29px;" width="29" border="0" alt="<?php echo $messengers;?>" /></a>
                                                        &nbsp;
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (isset($models->options) || $models->options->price_unlimited_sms): ?>
                                        <tr>
                                            <td style="font:16px/20px Arial, Helvetica, sans-serif; color:#303030; padding: 0 0 10px;">
                                                Безлимитные SMS
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td style="font:bold 27px/32px Arial, Helvetica, sans-serif; color:#303030;">
                                            <?php echo Phones::getPrice($models); ?>&nbsp;р. <span style="font-size:22px; color:#00aeef;">на&nbsp;30&nbsp;дней</span>
                                        </td>
                                    </tr>
                                </table>
<!--                                --><?php //if ($model->traffic):?>
<!--                                    <p>--><?//= ($model->traffic/1000) ?><!--Гб интернета</p>-->
<!--                                --><?php //else:?>
<!--                                    <p>Безлимитный интернет</p>-->
<!--                                --><?php //endif; ?>
<!--                                --><?php //if (isset($params['sms']) && $params['sms']):?>
<!--                                    <p>Безлимитные SMS</p>-->
<!--                                --><?php //else: ?>
<!--                                    --><?php ////$model->sms  SMS ?>
<!--                                --><?php //endif; ?>
<!--                                --><?php //if (isset($params['unlimited_apps']) && $params['unlimited_apps']):?>
<!--                                    <p>Безлимитные Мобильные приложения</p>-->
<!--                                --><?php //else: ?>
<!--                                    --><?php ////$model->sms  SMS ?>
<!--                                --><?php //endif; ?>
                            </div>
                            <div class="row-2">
<!--                                --><?//= $model->getPrice($params); ?><!-- р.<span> на 30 дней</span>-->
                            </div>
                        </div>

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
<!--            <div class="b-yota-app__b_4_top">-->
<!--                <ul>-->
<!--                    <li><img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/styles-app/icon-advantages-1.png" alt=""></li>-->
<!--                    <li>Бесплатное общение внутри сети</li>-->
<!--                    <li><img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/styles-app/icon-advantages-2.png" alt=""></li>-->
<!--                    <li>По России &mdash; без доплат</li>-->
<!--                    <li><img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/styles-app/icon-advantages-3.png" alt=""></li>-->
<!--                    <li>Междугородние звонки по цене местных</li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="b-yota-app__b_4_bottom">Ограничения по территориям и условиям на <a href="#" target="_blank">yota.ru</a></div>
        </div>
    </div>
</div>
