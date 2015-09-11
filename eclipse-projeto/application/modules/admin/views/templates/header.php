<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/stylesheets/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url() ?>assets/stylesheets/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>

</head>
<body>
<div id="header-wrapper">
    <h3>Área do Administrador</h3>
    <div id="menu">
            <ul>
            <?php
                echo "<li><a href='".base_url()."admin/post' accesskey='3' title=''>Postar</a></li>";
                echo "<li><a href='".base_url()."admin' accesskey='3' title=''>Logout</a></li>";
            ?>
            </ul>
    </div>
</div>