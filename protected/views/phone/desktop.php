<?php echo '<?xml version="1.0" encoding="utf-8" ?>' ?><request><message type="sms"><sender>Yota</sender><text>Мы сохранили предложение для компьютера, которое вам понравилось. Подробнее по ссылке: <?php echo $link . '/' . $model->link; ?></text><phone cell="<?php echo $sendPhone; ?>" work="<?php echo $sendPhone; ?>" fax="<?php echo $sendPhone; ?>"/><abonent phone="<?php echo $sendPhone; ?>" number_sms="1" /></message><security><login value="<?php echo $login; ?>"/><password value="<?php echo $password; ?>"/></security></request>