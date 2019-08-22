<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CI Blog</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url() ?>assets/css/bootstrap.min.css"> -->
  <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">CI Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().'about'; ?>">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().'posts'; ?>">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().'categories'; ?>">Categories</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().'posts/create'; ?>">Create Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().'categories/create'; ?>">Create Category</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">