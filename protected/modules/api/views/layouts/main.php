<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles-app/main.css">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="yota-app">
	<?php echo $content; ?>
</body>
</html>
