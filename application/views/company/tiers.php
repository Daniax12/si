
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
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddTiers">
                            <button class="btn btn-primary">
                                + Ajouter tiers
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
                                                <th class="border-0">Numero</th>
                                                <th class="border-0">Intitule</th>
                                                <th class="border-0"> Type </th>
                                                <th class="border-0">Nom entreprise</th>
                                                <th class="border-0">Responsable</th>
                                                <th class="border-0">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($tiers as $tier){ ?>
                                                <tr>
                                                    <td><?php echo $tier -> numero_tiers ?></td>
                                                    <td><?php echo $tier -> intitule_tiers ?></td>
                                                    <td><?php echo $tier -> intitule ?></td>
                                                    <td><?php echo $tier -> nom_entreprise ?></td>
                                                    <td><?php echo $tier -> responsable ?></td>
                                                    <td><?php echo $tier -> email_tiers ?></td>
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
</div>
    <!-- INSERTION NOUVEAU PRODUIT // MODAL -->
    <div class="modal fade" id="staticBackdropAddTiers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="staticBackdropLabel">
                        Ajout nouveau tiers  
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                </div>

                <div class="modal-body text-center">
                    <form action = "Tiers_ctrl/inserting_tiers" method="POST">
                        <!-- CLIENTS OU FOURNISSEURS -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="input-select"> Status tiers : </label>
                            <select class="form-control" id="input-select_tiers">
                                    <option value="0"> Clients </option>
                                    <option value="1"> Fournisseurs </option>  
                            </select>
                        </div>
                        <!-- NUMERO DE COMPTE -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="inputText1" class="col-form-label"> Numero :  </label>
                            <div class="d-flex flex-row">
                                <input type="text" name="debut_numero" id="num_tiers_debut" value="411" class="form-control text-center" style="width:35%" readonly>
                                <input id="num_racine_value" type="text" name="numero_compte" class="form-control" required>
                            </div>     
                        </div>
                        
                        <!-- TYPE DE TIERS -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="input-select"> Comptes tiers : </label>
                            <select class="form-control" id="input-compte-tiers" name="compte_general">
                                <?php  foreach($tiers_classe as $tier){ ?>
                                    <option value="<?php echo $tier['id_compte_general']; ?>">
                                        <?php echo $tier['numero_compte'] ?> - <?php echo $tier['intitule']  ?>
                                    </option>
                                <?php } ?>     
                            </select>
                        </div>
                        <!-- NOM ENTREPRISE -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="inputText1" class="col-form-label">Nom Entreprise :  </label>
                            <input id="intitule_compte" type="text" name="entreprise" class="form-control" required>
                        </div>
                        <!-- INTITULE -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="inputText1" class="col-form-label"> Intitule :  </label>
                            <input id="intitule_compte" type="text" name="intitule" class="form-control" required>
                        </div>
                        <!-- RESPONSABLE ENTREPRISE -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="inputText1" class="col-form-label"> Responsable:  </label>
                            <input id="intitule_compte" type="text" name="responsable" class="form-control" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="inputText1" class="col-form-label"> Email:  </label>
                            <input id="intitule_compte" type="text" name="email" class="form-control" required>
                        </div>

                        <!-- ADRESSE -->
                        <div class="form-group border border-2" style="padding: 1% 1% 1% 1%">
                            <label for="inputText1" class="col-form-label"> Adresse:  </label>
                            <input id="intitule_compte" type="text" name="adresse" class="form-control" required>
                        </div>

                        <input type="submit" value = "Ajouter" class="btn btn-primary">
                    </form>
                </div>

                <div class="modal-footer justify-content-center">
                
                </div>
            </div>
        </div>
        <script>
            // CHECK THE TYPE OF TIERS
            // Get references to the select and input elements
            var selectInput = document.getElementById("input-select_tiers");
            var textInput = document.getElementById("num_tiers_debut");
            var tiers_select = document.getElementById("input-compte-tiers");

            // Add event listener to the select element
            selectInput.addEventListener("change", function() {
                // Update the value of the text input based on the selected option
                if(selectInput.value == "0"){
                    textInput.value = "411";

                } else if(selectInput.value == "1"){
                    textInput.value = "401";
                }
            });
        

        </script>
    </div>
    