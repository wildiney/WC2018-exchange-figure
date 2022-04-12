<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" href="<?php echo base_url("favicon.ico"); ?>">
        <link rel="apple-touch-icon" href="apple-icon-180x180.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/layout.css'); ?>">

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <!--script src="js/plugins.js"></script-->
        <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="container-fluid">
            <div class="header"></div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/img/logo.png') ?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if ($this->session->logged == true): ?>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <!--li class="nav-item active">
                                <a class="nav-link" href="<?php echo site_url('figurinhas/trocadores'); ?>">INÍCIO <span class="sr-only">(current)</span></a>
                            </li-->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('figurinhas/trocadores'); ?>">QUEM QUER TROCAR?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('figurinhas/repetidas'); ?>">MINHAS REPETIDAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url("figurinhas/procurando") ?>">FIGURINHAS QUE PRECISO</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('login/logout') ?>">
                                    <span class="img-profile-wrapper">
                                        <img  class="img-profile" width="40" src="<?php echo site_url('assets/users/') . str_replace(array('@indracompany.com'), "", $this->session->userdata('email')) . "_MThumb.jpg" ?>" onError="this.onerror=null;this.src='/assets/users/user.jpg';">
                                    </span> 
                                    <?php echo substr($this->session->userdata("nome"), 0, 10) ?>... | LOGOUT</a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
        <div class="container-fluid spacer-20">
