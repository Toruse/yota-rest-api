<table class="flexible" width="620" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding: 0 10px;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="aligncenter" style="padding: 20px 0;"><a href="#" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/desktop/logo-01.png" style="vertical-align:top; width: 41px;" width="41" alt="YOTA" /></a></td>
                </tr>
                <tr>
                    <td class="plr-15 pb-20 pt-20" bgcolor="#ffffff" style="padding: 35px 45px; border-radius: 10px 10px 0 0;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="font:25px/35px Arial, Helvetica, sans-serif; color:#383838; padding: 0 0 20px;">
                                    Yota для компьютера
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
                    <td class="plr-15 pb-20 pt-20" bgcolor="#f2fafe" style="padding: 45px;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th class="flex" width="130" align="left" style="vertical-align:middle; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/desktop/ico-01.png" style="vertical-align:top; width: 116px;" width="116" alt="" /></td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="10" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="370" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <?php foreach ($models as $model) :?>
                                                        <?php if ($model->period!='minimum'):?>
                                                            <tr>
                                                                <td style="font:16px/20px Arial, Helvetica, sans-serif; color:#303030; padding: 0 0 20px;">
                                                                    <?php if ($model->speed=='maximum'): ?>
                                                                        Безлимитный интернет на <br class="hide" />
                                                                        на максимальной скорости
                                                                    <?php else: ?>
                                                                        Безлимитный интернет на скорости<br class="hide" />
                                                                        до&nbsp;<?php
                                                                        $speed=$model->speed/1000;
                                                                        if ($speed>=1)
                                                                            echo $speed.'&nbsp;мбит/с';
                                                                        else
                                                                            echo $model->speed.'&nbsp;кбит/с';
                                                                        ?>.
                                                                    <?php endif;?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font:bold 27px/32px Arial, Helvetica, sans-serif; color:#303030;">
                                                                    за <?= $model->price ?>&nbsp;р./<?php
                                                                    switch ($model->period) {
                                                                        case 'year':
                                                                            echo 'год';
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
                                                                </td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td style="font:16px/20px Arial, Helvetica, sans-serif; color:#303030; padding: 0 0 20px;">
                                                                    Безлимитный интернет <span style="color:#00aeef; font-weight: bold;">на <?= $model->time ?> часа</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font:bold 27px/32px Arial, Helvetica, sans-serif; color:#303030;">
                                                                    за <?= $model->price ?>&nbsp;р.
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach;?>
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
                                                                        <a target="_blank" style="text-decoration:none; color:#fff; display:block; padding:10px 15px;" href="#">Выбрать устройство</a>
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
                                <td >
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th class="flex" width="180" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="active-i" width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/desktop/ico-02.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Тест-драйв без дополнительной платы
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="8" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="153" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="active-i" width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/desktop/ico-03.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Работает даже при нулевом балансе
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="8" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="161" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="active-i" width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/desktop/ico-04.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Изменение условий в&nbsp;любой момент
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