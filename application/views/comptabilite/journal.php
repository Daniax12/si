

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
                        <h2 class="pageheader-title"> <?php echo $title_page ?></h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $title_page ?> </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $main_code_journal['intitule_code_journal'] ?></li>
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
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddEcriture">
                            <button class="btn btn-primary">
                                + Nouvelle ecriture
                            </button>                              
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0 text-center">
                                                <th class="border-0">Compte general</th>
                                                <th class="border-0">Date</th>
                                                <th class="border-0"> Piece </th>
                                                <th class="border-0"> Tiers </th>
                                                <th class="border-0"> Libelle </th>
                                                <th class="border-0"> Debit </th>
                                                <th class="border-0"> Credit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ecritures as $ecriture){ ?>
                                                <tr>
                                                    <td><?php echo $ecriture['numero_compte'] ?> - <?php echo $ecriture['intitule'] ?></td>
                                                    <td><?php echo $ecriture['date_insertion']  ?></td>
                                                    <td><?php echo $ecriture['ref_piece']  ?></td>
                                                    <td><?php echo $ecriture['intitule_tiers'] ?></td>
                                                    <td><?php echo $ecriture['libelle'] ?></td>
                                                    <td class="text-right">Ar  <?php echo $ecriture['debit'] ?></td>
                                                    <td class="text-right">Ar <?php echo $ecriture['credit'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>

     <!-- INSERTION NOUVEAU PRODUIT // MODAL -->
     <div class="modal fade" id="staticBackdropAddEcriture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="staticBackdropLabel">
                        Inserer piece et date:   
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                </div>

                <div class="modal-body text-center">
                    <form action = "#" method="POST">
                        <input type="hidden" value="<?php echo $main_code_journal['id_code_journal']  ?>">
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label for="inputText1" > Date journal:  </label>
                            <input id="inputText1" type="date" name="date_journal" class="form-control" required>
                        </div>
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                        <label for="inputText1" > Piece :  </label>
                        <div class="d-flex flex-row">
                            <input type="text" id="num_racine" class="form-control text-center" style="width:15%" value="PC" readonly>
                            <input id="num_racine_value" type="text" name="piece" class="form-control" required>
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
    