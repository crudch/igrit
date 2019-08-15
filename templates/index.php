<?php
/**
 * @var \Crudch\View\View $this
 * @var string            $username
 * @var string            $asset
 */
?>

<?php $this->extend('layout/layout'); ?>

<?php $this->start('title'); ?>Application<?php $this->stop(); ?>
<?php $this->start('description'); ?>Application<?php $this->stop(); ?>

<?php $this->start('content'); ?>
    <div id="app" v-cloak></div>
<?php $this->stop(); ?>