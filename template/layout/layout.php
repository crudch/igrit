<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $this->renderBlock('description'); ?>">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?php echo $this->renderBlock('style') ?>
    <title><?php echo $this->renderBlock('title'); ?></title>
</head>
<body>
<?php echo $this->renderBlock('content'); ?>
<footer>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto blanditiis,
        commodi cumque deleniti doloremque doloribus eaque enim ipsa nam nihil nostrum placeat
        praesentium provident quibusdam quisquam repudiandae tenetur, velit!
    </p>
</footer>
<?php echo $this->renderBlock('script'); ?>
</body>
</html>