<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="<?php echo base_url('front/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- <link href="<?php echo base_url('front/css/idangerous.swiper.css'); ?>" rel="stylesheet" type="text/css" /> -->
  <link href="<?php echo base_url('front/css/style.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('front/css/animate.css'); ?>" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="<?php echo base_url('front/img/favicon.ico'); ?>" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Sistem Prediksi</title>
</head>


<!-- HEADER -->
<header>
  <div class="container">
    <div id="logo-wrapper">
      <div class="cell-view"><a id="logo" href="index.html"><img src="<?php echo base_url('front/img/logo.png'); ?>" alt="" /></a></div>
    </div>
    <div class="open-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="header-container">
      <div class="scrollable-container">
        <div class="header-left">
          <nav>
            <div class="menu-entry active">
              <a href="index.html">Home</a>
            </div>
            <div class="menu-entry">
              <a href="about.html">Prediksi</a>
            </div>
            <div class="menu-entry">
              <a href="about.html">About</a>
            </div>
          </nav>
        </div>
        <div class="header-right">
          <div class="header-inline-entry">
            <a class="button" href="<?= base_url('/login') ?>">login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>