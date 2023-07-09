
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
                <div class="row " style="padding:1% 1% 1% 1%">
                    <div class="d-flex flex-row justify-content-between">
                        <div style="margin-right: 5%">
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddProduct">
                                <button class="btn btn-primary">
                                    + Ajouter
                                </button>                              
                            </a>
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropSearch" style="margin-right: 5%">
                            <button class="btn btn-primary" >
                                Rechercher 
                            </button>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropSearchBetween" style="margin-right: 5%">
                                <button class="btn btn-primary"> Recherche intervalle </button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0" style="width:15%">Id facture</th>
                                                <th class="border-0"style="width:15%"> Date  </th>
                                                <th class="border-0" style="width:15%"> Client </th>
                                                <th class="border-0"> Object   </th>
                                                <th class="border-0"> Montant TTC  </th>
                                                <th class="border-0"> Etat </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($factures){ 
                                                foreach($factures as $facture){ ?>
                                                    <tr>
                                                        <td><?php echo $facture['id_facture'] ?></td>
                                                        <td><?php echo $facture['date_insertion'] ?></td>
                                                        <td><?php echo $facture['nom_entreprise'] ?></td>
                                                        <td><?php echo $facture['object_facture'] ?></td>
                                                        <td class="text-right"> Ar <?php echo number_format($facture['total_ttc'], 2, ',', ' ') ?></td>
                                                        <td> <i class="<?php echo $facture['valide_letter'] ?>"></i>  </td>
                                                        <td>
                                                            <a href="<?php echo site_url("index.php/Facture_ctrl/detailing_facture/") ?>/<?php echo $facture['id_facture'] ?>">
                                                                <button class="btn btn-sm shadow-none">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } 
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="col-md-3">
                        <div class="card">
                            <h5 class="card-header">Nos clients phares (TTC) </h5>
                            <div class="card-body p-0">
                                <ul class="country-sales list-group list-group-flush">
                                    <?php 
                                    if($clients){
                                    foreach($clients as $client){ ?>
                                        <li class="list-group-item country-sales-content">
                                            <span class="mr-2"></span><?php echo $client['nom_entreprise'] ?>
                                            <span class="float-right text-dark">
                                                Ar <?php echo number_format($client['ttc_price'], 2, ',', ' ') ?>
                                            </span>
                                        </li>
                                    <?php } }?>           
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- RECHERCHE FACTURE BETWEEN  -->
                 <div class="modal fade" id="staticBackdropSearchBetween" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="staticBackdropLabel">
                                    Recherche facture entre :
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                            </div>
                                <div class="modal-body d-flex flex-column">
                                    <!-- Numero facture  -->
                                    <form action = "<?php echo base_url() ?>index.php/Facture_ctrl/searching_between_amount" method="GET">
                                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                            <div class="d-flex flex-row align-items-center ">
                                                <label for="inputText1" class="col-form-label" style="width: 25%"> Montant:  </label>
                                                <input id="inputText1" type="number" name="montant1" class="form-control" required>
                                                    <span style="margin-left:2%; margin-right:2%"> et </span>
                                                <input id="inputText1" type="number" name="montant2" class="form-control" style="margin-right:2%" required>
                                                <input type="submit" value = "Search" class="btn btn-sm btn-primary">
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Client facture  -->
                                    <form action = "<?php echo base_url() ?>index.php/Facture_ctrl/searching_between_date" method="GET">
                                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                            <div class="d-flex flex-row align-items-center">
                                                <label for="inputText1" class="col-form-label" style="width: 25%"> Date:  </label>
                                                <input id="inputText1" type="date" name="date1" class="form-control" required>
                                                    <span style="margin-left:2%; margin-right:2%"> et </span>
                                                <input id="inputText1" type="date" name="date2" class="form-control" style="margin-right:2%" required>
                                                <input type="submit" value = "Search" class="btn btn-sm btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <div class="modal-footer justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>




                 <!-- RECHERCHE FACTURE SINGLETON  -->
                 <div class="modal fade" id="staticBackdropSearch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="staticBackdropLabel">
                                    Recherche facture par :
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                            </div>
                                <div class="modal-body d-flex flex-column">
                                    <!-- Numero facture  -->
                                    <form action = "<?php echo base_url() ?>index.php/Facture_ctrl/searching_by_numero" method="GET">
                                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                            <div class="d-flex flex-row">
                                                <label for="inputText1" class="col-form-label" style="width: 30%"> Numero:  </label>
                                                <input id="inputText1" type="text" name="numero" class="form-control" required>
                                                <input type="submit" value = "Search" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Client facture  -->
                                    <form action = "<?php echo base_url() ?>index.php/Facture_ctrl/searching_by_client" method="GET">
                                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                            <div class="d-flex flex-row">
                                                <label for="inputText1" class="col-form-label" style="width: 30%"> Client:  </label>
                                                <input id="inputText1" type="text" name="client" class="form-control" required>
                                                <input type="submit" value = "Search" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Object facture  -->
                                    <form action = "<?php echo base_url() ?>index.php/Facture_ctrl/searching_by_object" method="GET">
                                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                            <div class="d-flex flex-row">
                                                <label for="inputText1" class="col-form-label" style="width: 30%"> Object:  </label>
                                                <input id="inputText1" type="text" name="object" class="form-control" required>
                                                <input type="submit" value = "Search" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <div class="modal-footer justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- INSERTION NOUVEAU PRODUIT // MODAL -->
                <div class="modal fade" id="staticBackdropAddProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center" id="staticBackdropLabel">
                                    Nouvelle facture  
                                </h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                            </div>

                            <div class="modal-body text-center ">
                                <form action = "<?php echo base_url() ?>index.php/Facture_ctrl/creating_facture" method="POST" class="align-items-center">
                                    <!-- DATE FACTURE -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Date:  </label>
                                            <input id="inputText1" type="date" name="date_facture" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- REFERECENE BON DE COMMANDE -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Ref/BC:  </label>
                                            <input id="inputText1" type="text" name="bc" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- OBJECT DE LA FACTURE -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Object:  </label>
                                            <input id="inputText1" type="text" name="object_facture" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- CLIENTS -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="input-select" class="col-form-label" style="width: 30%">  Nos clients : </label>
                                            <select class="form-control" id="input-select_racine" name="tiers_id">
                                                <option value=""></option>
                                                <?php  
                                                if($customers){ 
                                                    foreach($customers as $customer){ ?>
                                                        <option value="<?php echo $customer['id_tiers'] ?>">
                                                            <?php echo $customer['nom_entreprise'] ?>
                                                        </option>
                                                    <?php } 
                                                } ?>     
                                            </select>
                                        </div>
                                    </div>
                                     <!-- ACCOMPTE -->
                                     <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Accompte:  </label>
                                            <input id="inputText1" type="number" name="accompte" class="form-control" required>
                                        </div>
                                    </div>
                                    <input type="submit" value = "Ajouter" class="btn btn-primary">
                                </form>
                            </div>

                            <div class="modal-footer justify-content-center">
                            
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    