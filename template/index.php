<?php
/**
 * @var \Crudch\View\View $this
 * @var string            $username
 */
?>

<?php $this->extend('layout/layout'); ?>

<?php $this->start('title'); ?>Title<?php $this->stop(); ?>
<?php $this->start('description'); ?>Description<?php $this->stop(); ?>

<?php $this->start('style'); ?><?php $this->stop(); ?>

<?php $this->start('content'); ?>
<div id="app"></div>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>