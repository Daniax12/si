
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
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">Designation</th>
                                                <th class="border-0">Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nom de la societe</td>
                                                <td><?php echo $company -> nom_company  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Capital</td>
                                                <td> Ar <?php echo $company -> capital  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Activite</td>
                                                <td><?php echo $company -> activite ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIF</td>
                                                <td><?php echo $company -> nif ?></td>
                                            </tr>
                                            <tr>
                                                <td>STAT</td>
                                                <td><?php echo $company -> stat ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date de creation</td>
                                                <td><?php echo $company -> date_creation ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telephone</td>
                                                <td><?php echo $company -> tel ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $company -> email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Adresse</td>
                                                <td><?php echo $company -> adresse ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end recent orders  -->
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">Listes de produits</h5>
                    <div class="card-body p-0">
                        <ul class="country-sales list-group list-group-flush">
                            <?php foreach($products as $product){ ?>
                                <li class="country-sales-content list-group-item"></i> </span>
                                    <?php echo $product -> nom_product; ?>
                                </li>
                            <?php } ?>           
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddProduct">
                            <button class="btn btn-primary">
                                + Ajouter
                            </button>                              
                        </a>
                    </div>
                </div>
            
                <div class="card">
                    <h5 class="card-header">Liste des centres</h5>
                    <div class="card-body p-0">
                        <ul class="country-sales list-group list-group-flush">
                            <?php foreach($centers as $center){ ?>
                                <li class="country-sales-content list-group-item"></i> </span>
                                    <?php echo $center -> nom_centre; ?>
                                </li>
                            <?php } ?>   
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddCentre">
                            <button class="btn btn-primary">
                                + Ajouter
                            </button>                              
                        </a>
                    </div>
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
                        Ajout produit  
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                </div>

                <div class="modal-body text-center">
                    <form action = "Generalite_ctrl/inserer_product" method="POST">
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label for="inputText1" class="col-form-label"> Nom produit:  </label>
                            <input id="inputText1" type="text" name="product_name" class="form-control" required>
                        </div>
                        <input type="submit" value = "Ajouter" class="btn btn-primary">
                    </form>
                </div>

                <div class="modal-footer justify-content-center">
                
                </div>
            </div>
        </div>
    </div>

     <!-- INSERTION NOUVEAU CENTRE // MODAL -->
     <div class="modal fade" id="staticBackdropAddCentre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="staticBackdropLabel">
                        Ajout centre  
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                </div>

                <div class="modal-body text-center">
                    <form action = "Generalite_ctrl/inserer_centre" method="POST">
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label for="inputText1" class="col-form-label"> Nom centre:  </label>
                            <input id="inputText1" type="text" name="centre_name" class="form-control" required>
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
    