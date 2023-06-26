<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url() ?>/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="<?php// echo base_url() ?>/assets/vendor/charts/chartist-bundle/chartist.css"> -->
    <!-- <link rel="stylesheet" href="<?php// echo base_url() ?>/assets/vendor/charts/morris-bundle/morris.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar bg-white fixed-top">
            	
                <a class="navbar-brand" href="index.html">DIMPEX</a>
                <a style="margin-right:50px" > Log out </a>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo site_url("index.php/Generalite_ctrl/kpi") ?>" ><i class="fa fa-fw fa-user-circle"></i>
                                    KPI
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>
                                    Mon entreprise
                                </a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Generalite_ctrl/") ?>">Generalites</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Compte_ctrl/") ?>"> Plan de compte general</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Tiers_ctrl/") ?>"> Tiers </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Comptabilite
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>
                                    Ecriture journal
                                </a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <?php 
                                            foreach($code_journaux as $cj){ ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?php echo site_url("index.php/Journal_ctrl/ecritures/") ?>/<?php echo $cj -> id_code_journal ?>"> <?php echo $cj -> intitule_code_journal ?>  </a>
                                                </li>
                                            <?php } ?>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>
                                    General
                                </a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Compte_ctrl/grand_livre_page/") ?>"> 
                                                Grand livre des comptes
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Compte_ctrl/balance_page/") ?>"> 
                                                Balance
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>
                                    Analytique
                                </a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Product_ctrl/repartition_charge_product/") ?>"> 
                                                Par produit
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Product_ctrl/repartition_charge_product_centre/") ?>"> 
                                                Par centre
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-45" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>
                                    Facturation
                                </a>
                                <div id="submenu-45" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"> 
                                                Fabriquer une facture
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("index.php/Facture_ctrl/") ?>"> 
                                                Liste des factures
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->