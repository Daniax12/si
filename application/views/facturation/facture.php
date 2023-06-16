
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
                        <div style="margin-right:100px">
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddProduct">
                                <button class="btn btn-primary">
                                    + Ajouter
                                </button>                              
                            </a>
                        </div>
                        <button class="btn btn-primary">Rechercher </button>
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
                                                <th class="border-0">Id facture</th>
                                                <th class="border-0"> Client </th>
                                                <th class="border-0"> Object   </th>
                                                <th class="border-0"> Responsable  </th>
                                                <th class="border-0"> Montant total  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($factures as $facture){ ?>
                                                <tr>
                                                    <td><?php echo $facture -> id_facture ?></td>
                                                    <td><?php echo $facture -> nom_entreprise ?></td>
                                                    <td><?php echo $facture ->object_facture ?></td>
                                                    <td><?php echo $facture-> responsable ?></td>
                                                    <td class="text-right">Ar <?php echo ($facture -> totalht + $facture -> tva) ?></td>
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
                            <h5 class="card-header">Nos clients phares <?php var_dump($customers) ?></h5>
                            <div class="card-body p-0">
                                <ul class="country-sales list-group list-group-flush">
                                    <?php foreach($clients as $client){ ?>
                                        <li class="list-group-item country-sales-content">
                                            <span class="mr-2"></span><?php echo $client['nom_entreprise'] ?>
                                            <span class="float-right text-dark">
                                                Ar <?php echo $client['t'] ?>
                                            </span>
                                        </li>
                                    <?php } ?>           
                                </ul>
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

                            <div class="modal-body text-center">
                                <form action = "Generalite_ctrl/inserer_product" method="POST">
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <label for="inputText1" class="col-form-label"> Ref/BC:  </label>
                                        <input id="inputText1" type="text" name="bc" class="form-control" required>
                                    </div>
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <label for="inputText1" class="col-form-label"> Object:  </label>
                                        <input id="inputText1" type="text" name="object_facrure" class="form-control" required>
                                    </div>
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <label for="input-select">  Nos clients : </label>
                                        <select class="form-control" id="input-select_racine">
                                            <?php  foreach($customers as $customer){ ?>
                                                <option value="<?php echo $customer -> id_tiers ?>">
                                                    <?php echo $customer -> nom_entreprise ?>
                                                </option>
                                            <?php } ?>     
                                        </select>
                                    </div>
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <label for="inputText1" class="col-form-label"> Date:  </label>
                                        <input id="inputText1" type="date" name="date_facture" class="form-control" required>
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
    