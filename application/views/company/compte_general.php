
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"> <?php echo $title_page ?> </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $title_page ?> </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $title_section ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
                <div class="row" style="padding:1% 1% 1% 1%">
                    <div class="d-flex flex-row">
                        <a href="<?php echo site_url("index.php/Compte_ctrl/insert_compte_page") ?>" style="margin-right:20px">
                            <button class="btn btn-primary">
                                + Ajouter compte
                            </button>                              
                        </a>
                    
                        <button class="btn btn-primary"> Importer fichier </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0 text-center">
                                                <th class="border-0">Numero</th>
                                                <th class="border-0">Racine compte</th>
                                                <th class="border-0">Intitule</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($comptes as $compte){ ?>
                                                <tr>
                                                    <td><?php echo $compte -> numero_compte ?></td>
                                                    <td><?php echo $compte -> id_racine_compte ?></td>
                                                    <td><?php echo $compte -> intitule ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="col-md-3">
                        <div class="card">
                            <h5 class="card-header">Racine des comptes</h5>
                            <div class="card-body p-0">
                                <ul class="country-sales list-group list-group-flush">
                                    <?php foreach($racines as $racine){ ?>
                                        <li class="list-group-item country-sales-content">
                                            <span class="mr-2"></span><?php echo $racine -> nom_racine  ?>
                                            <span class="float-right text-dark">
                                            <?php echo $racine -> numero_compte  ?>
                                            </span>
                                        </li>
                                    <?php } ?>           
                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <h5 class="card-header">Code journaux</h5>
                            <div class="card-body p-0">
                                <ul class="country-sales list-group list-group-flush">
                                    <?php foreach($code_journaux as $code_journal){ ?>
                                        <li class="list-group-item country-sales-content">
                                            <span class="mr-2"></span><?php echo $code_journal -> intitule_code_journal  ?>
                                            <span class="float-right text-dark">
                                            <?php echo $code_journal -> code  ?>
                                            </span>
                                        </li>
                                    <?php } ?>           
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    