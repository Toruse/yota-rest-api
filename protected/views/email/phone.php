<table class="flexible" width="620" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding: 0 10px;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="aligncenter" style="padding: 20px 0;"><a href="#" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/logo-01.png" style="vertical-align:top; width: 41px;" width="41" alt="YOTA" /></a></td>
                </tr>
                <tr>
                    <td class="plr-15 pb-20 pt-20" bgcolor="#ffffff" style="padding: 35px 45px; border-radius: 10px 10px 0 0;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="font:25px/35px Arial, Helvetica, sans-serif; color:#383838; padding: 0 0 20px;">
                                    Yota для смартфона
                                </td>
                            </tr>
                            <tr>
                                <td style="font:16px/22px Arial, Helvetica, sans-serif; color:#6c6c6c;">
                                    Мы сохранили предложение, <br />
                                    которое вам понравилось:
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="plr-15 pb-20 pt-20" bgcolor="#f2fafe" style="padding: 45px 20px 45px 45px;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th class="flex" width="130" align="left" style="vertical-align:middle; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/ico-01.png" style="vertical-align:top; width: 53px;" width="53" alt="" /></td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="10" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="395" align="left" style="vertical-align:top; padding:0;">
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
                                            </th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="plr-15 pb-20 pt-20" bgcolor="#ffffff" style="padding: 40px 45px; border-bottom: 1px solid #f7f7f7;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th class="flex" width="220" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td class="active-t" align="center" style="font:16px/20px Arial, Helvetica, sans-serif; color:#fff; mso-padding-alt:10px 15px; border-radius: 20px;" bgcolor="#00aeef">
                                                                        <a target="_blank" style="text-decoration:none; color:#fff; display:block; padding:10px 15px;" href="#">Заказать SIM-карту</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="20" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="270" align="left" style="padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="h-u aligncenter" style="font:16px/20px Arial, Helvetica, sans-serif; color:#00aeef;">
                                                            <a href="#" target="_blank" style="color:#00aeef; text-decoration: none;">Посмотреть другие условия</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="plr-15 pb-20 pt-20" bgcolor="#ffffff" style="padding: 35px 45px; border-radius: 0 0 10px 10px;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th class="flex" width="168" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="active-i" width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/ico-02.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Бесплатное общение внутри сети
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="10" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="130" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="active-i" width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/ico-03.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            По России - без роуминга
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="10" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="192" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="active-i" width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/phone/ico-04.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Междугородние звонки по&nbsp;цене местных
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="aligncenter pb-20 pt-20" style="font:14px/18px Arial, Helvetica, sans-serif; color:#fff; padding: 30px 0;">
                        &copy; Yota, 2008–2017. Все права защищены.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>