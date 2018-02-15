<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('vendor/components/font-awesome/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/layout.css');?>">

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js');?>"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <!--script src="js/plugins.js"></script-->
        <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">TROCA DE FIGURINHAS NA INDRA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if($this->session->userdata("logged")): ?>
                    <ul class="navbar-nav mr-auto">
                        <!--li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url('figurinhas/trocadores'); ?>">INÍCIO <span class="sr-only">(current)</span></a>
                        </li-->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('figurinhas/trocadores'); ?>">QUEM QUER TROCAR?</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="img-profile-wrapper">
                                    <img class="img-profile" width="40" src="<?php echo base_url('assets/users/') . str_replace(array('@indracompany.com'),"", $this->session->userdata('email')) . "_MThumb.jpg"?>">
                                </span>
                                <?php echo $this->session->userdata("nome") ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url("figurinhas/repetidas")?>">FIGURINHAS REPETIDAS</a>
                                <a class="dropdown-item" href="<?php echo base_url("figurinhas/procurando")?>">FIGURINHAS QUE PRECISO</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('login/logout')?>">LOGOUT</a>
                            </div>
                        </li>
                    </ul>
                    <?php endif;?>
                </div>
            </nav>
        </div>
        <div class="container spacer-20">
