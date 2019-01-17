<?php
/**
 * @var \Crudch\View\View $this
 * @var string            $username
 * @var string            $asset
 */
?>

<?php $this->extend('layout/layout'); ?>

<?php $this->start('title'); ?>Title<?php $this->stop(); ?>
<?php $this->start('description'); ?>Description<?php $this->stop(); ?>

<?php $this->start('style'); ?>
    <link rel="stylesheet" href="<?php echo url("/css/{$asset}/app.css"); ?>">
<?php $this->stop(); ?>

<?php $this->start('content'); ?>
    <div id="app"></div>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
    <script src="<?php echo url("/js/{$asset}/app.js"); ?>"></script>
<?php $this->stop(); ?>