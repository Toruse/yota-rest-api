<table class="flexible" width="620" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding: 0 10px;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="aligncenter" style="padding: 20px 0;"><a href="#" target="_blank"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/tablet/logo-01.png" style="vertical-align:top; width: 41px;" width="41" alt="YOTA" /></a></td>
                </tr>
                <tr>
                    <td class="plr-15 pb-20 pt-20" bgcolor="#ffffff" style="padding: 35px 45px; border-radius: 10px 10px 0 0;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="font:25px/35px Arial, Helvetica, sans-serif; color:#383838; padding: 0 0 20px;">
                                    Yota для планшета
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
                                                        <td align="center"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/tablet/ico-01.png" style="vertical-align:top; width: 98px;" width="98" alt="" /></td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="10" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="370" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="font:16px/20px Arial, Helvetica, sans-serif; color:#303030; padding: 0 0 20px;">
                                                            Безлимитный интернет <br class="hide" />
                                                            для планшета
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font:bold 27px/32px Arial, Helvetica, sans-serif; color:#303030;">
                                                            <?php
                                                            if (isset($params['type'])) {
                                                                switch ($params['type']){
                                                                    case 'day':
                                                                        echo 'за '.$models['day'].'&nbsp;р./день';
                                                                        break;
                                                                    case 'month':
                                                                        echo 'за '.$models['month'].'&nbsp;р./30 дней';
                                                                        break;
                                                                    case 'year':
                                                                        echo 'за '.$models['year'].'&nbsp;р./год';
                                                                        break;
                                                                }
                                                            } else {
                                                                echo 'за '.$models['month'].' р./30 дней';
                                                            }
                                                            ?>
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
                                                        <td width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/tablet/ico-02.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Выбор периода доступа к&nbsp;интернету
                                                        </td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="flex" width="10" height="20" align="left" style="vertical-align:top; padding:0;"></th>
                                            <th class="flex" width="332" align="left" style="vertical-align:top; padding:0;">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="50"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/imgs_mail/sender/tablet/ico-03.png" style="vertical-align:top; width: 40px;" width="40" alt="" /></td>
                                                        <td style="font:11px/15px Arial, Helvetica, sans-serif; color:#919190;">
                                                            Цена не&nbsp;меняется <br class="hide" />
                                                            в&nbsp;поездках по&nbsp;России
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