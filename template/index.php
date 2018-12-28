<?php
/**
 * @var \Crudch\View\View $this
 * @var string $username
 */
?>

<?php $this->extend('layout/layout'); ?>

<?php $this->start('title'); ?>Здесь такой титле<?php $this->stop(); ?>
<?php $this->start('description'); ?>Здесь такое описание<?php $this->stop(); ?>

<?php $this->start('style'); ?><?php $this->stop(); ?>

<?php $this->start('content'); ?>
    <h1>Привет <?php echo e($username); ?></h1>
<?php $this->stop(); ?>

<?php $this->start('script'); ?><?php $this->stop(); ?>