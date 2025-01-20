<?php
/**
 * @var \PHPFramework\View $this
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '' ?></title>
    <link rel="shortcut icon" href="<?= getBaseUrl('/assets/img/favicon.png') ?>" type="image/x-icon">
</head>

<body>

<?= $this->content; ?>

</body>

</html>