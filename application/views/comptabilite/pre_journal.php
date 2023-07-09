

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
                                    <li class="breadcrumb-item active" aria-current="page"> Journal <?php echo $journal['id_journal'] ?></li>
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
                        <a data-bs-toggle="modal" style="margin-right: 50px" data-bs-target="#staticBackdropAddEcriture">
                            <button class="btn btn-primary">
                                + Inserer une ecriture
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
                                            <tr class="border-0">
                                                <th class="border-0">Compte general</th>
                                                <th class="border-0">Date</th>
                                                <th class="border-0"> Piece </th>
                                                <th class="border-0"> Tiers </th>
                                                <th class="border-0"> Libelle </th>
                                                <th class="border-0 text-right"> Debit </th>
                                                <th class="border-0 text-right"> Credit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($contents){
                                                foreach($contents as $content){ ?>
                                                <tr>
                                                    <td><?php echo $content['numero_compte'] ?> - <?php echo $content['intitule'] ?></td>
                                                    <td><?php echo $journal['date_insertion']  ?></td>
                                                    <td><?php echo $journal['ref_piece']  ?></td>
                                                    <td><?php echo $content['intitule_tiers'] ?></td>
                                                    <td><?php echo $content['libelle'] ?></td>
                                                    <td class="text-right">Ar  <?php echo number_format($content['debit'], 2, ',', ' ') ?></td>
                                                    <td class="text-right">Ar <?php echo number_format($content['credit'], 2, ',', ' ') ?></td>
                                                </tr>
                                            <?php } 
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <?php if($contents){ ?>
                    <div>
                        <a href="<?php echo site_url("index.php/Journal_ctrl/submiting_journal/" . $journal['id_journal'] ."/" . $journal['id_code_journal']); ?>">
                            <button class="btn btn-primary">
                                Enregistrer
                            </button>
                        </a>
                        <?php 
                        $fail = $this->input->get('fail');
                        if($fail){ ?>

                            <h6 style="color: red; margin-top:50px"> Error: Total credit doit etre egal a total credit </h6>
                        <?php }
                        ?>
                    </div>
                <?php }?>
                
            </div>
        </div>
    </div>

     <!-- INSERTION NOUVEAU PRODUIT // MODAL -->
     <div class="modal fade" id="staticBackdropAddEcriture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="staticBackdropLabel">
                        Inserer une ecriture :
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                </div>

                <div class="modal-body text-center">
                    <form action = "<?php echo site_url("index.php/Journal_ctrl/inserting_content_journal") ?>" method="POST">
                        <input type="hidden" name="id_journal" value="<?php echo $journal['id_journal']  ?>">

                        <!-- COMPTE -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="input-select"> Compte General : </label>
                            <select class="form-control" id="input-compte-tiers" name="compte_general">
                                <?php  
                                if($comptes){
                                    foreach($comptes as $compte){ ?>
                                        <option value="<?php echo $compte -> id_compte_general; ?>">
                                            <?php echo $compte->numero_compte; ?> - <?php echo $compte->intitule;  ?>
                                        </option>
                                    <?php } 
                                } ?>     
                            </select>
                        </div>

                        <!-- TYPE DE TIERS -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <input type="hidden" name="id_journal" value="<?php echo $journal['id_journal'] ?>">
                            <label for="input-select"> Comptes tiers : </label>
                            <select class="form-control" id="input-compte-tiers" name="compte_tiers">
                                <option value=""></option>
                                <?php  foreach($tiers as $tier){ ?>
                                    <option value="<?php echo $tier->id_tiers;; ?>">
                                        <?php echo $tier->numero_tiers; ?> - <?php echo $tier->intitule_tiers;  ?>
                                    </option>
                                <?php } ?>     
                            </select>
                        </div>

                        <!-- LIBELLE -->
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label for="inputText1" > Libelle :  </label>
                            <input id="inputText1" type="text" name="libelle" class="form-control" required>
                        </div>

                        <!-- CREDIT - DEBIT -->
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label for="inputText1" > Montant :  </label>
                            <div class="d-flex flex-row">
                                <select class="form-control" name="credit-debit" style="width: 30%">
                                    <option value="0"> DEBIT </option>
                                    <option value="1"> CREDIT </option>
                                </select>
                                <input id="inputText1" type="number" name="montant" class="form-control" required>
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
    