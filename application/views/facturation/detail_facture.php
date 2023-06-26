

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
                        <h2 class="pageheader-title"> Facturation </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Details facture </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> <?php echo $my_facture['id_facture'] ?> </li>
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
                    <div class="col-md-12">
                        <div class="card" style="padding: 2% 2% 2% 2%">
                            <div class="card-body p-0">
                                <div class="col-md-12 d-flex flex-row justify-content-between" style="padding:1% 1% 1% 1%;"> 
                                    <h3 style="font-size:30px; margin-left:2%">DIMPEX</h3>
                                    <div class="d-flex flex-column">
                                        <span>Etat: <?php echo $my_facture['valide_letter'] ?> </span>
                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdropAddToFacture">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-cart-arrow-down" style="margin-right: 5px"></i> AJOUTER
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between col-md-9 offset-md-1" style="padding:1% 1% 1% 1%">
                                    <div>
                                        Adresse: <?php echo $company -> adresse; ?>
                                    </div>
                                    <div>
                                        Email: <?php echo $company -> email; ?>
                                    </div>
                                    <div>
                                        Numero: <?php echo $company -> tel; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 border border-5 text-center font-weight-bold" style="padding: 1% 1% 1% 1%; font-size:20px">
                                    FACTURE
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <div style="width: 70%;padding: 2% 2% 2% 2%">
                                        <table>
                                            <tr>
                                                <td style="width:65%">Date</td>
                                                <td><?php echo $my_facture['date_insertion']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Numero facture:</td>
                                                <td><span class="font-weight-bold"> <?php echo $my_facture['id_facture']; ?> </span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="width:29%">
                                        <table style="width:100%">
                                            <tr>
                                                <td style="width: 40%">Client :</td>
                                                <td> <?php echo $my_facture['nom_entreprise']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Adresse :</td>
                                                <td> <?php echo $my_facture['adresse_tiers']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Email: </td>
                                                <td> <?php echo $my_facture['email_tiers']; ?> </td>
                                            </tr><tr>
                                                <td>Responsable: </td>
                                                <td> <?php echo $my_facture['responsable']; ?> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 border border-5" style="padding: 1% 1% 1% 1%;">
                                    <table style="margin-left: auto; margin-right:auto">
                                        <tr>
                                            <td style="width:65%">Objet: </td>
                                            <td><?php echo $my_facture['object_facture'] ?>  </td>
                                        </tr>
                                        <tr>
                                            <td>Reference facture:</td>
                                            <td><span class="font-weight-bold"> <?php echo $my_facture['ref_bc']; ?> </span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="padding: 1% 1% 1% 1%">
                                    <table class="table table-secondary table-borderless">
                                        <thead>
                                            <th>Designation</th>
                                            <th>Quantite</th>
                                            <th>Unite</th>
                                            <th class="text-right">Prix unitaire</th>
                                            <th class="text-right">Montant HT</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php if($facture_kid){
                                                foreach($facture_kid as $child){ ?>
                                                    <tr>
                                                        <td> <?php echo $child['nom_product']; ?> </td>
                                                        <td> <?php echo $child['qty']; ?> </td>
                                                        <td> <?php echo $child['nom_unity']; ?> </td>
                                                        <td class="text-right"> Ar <?php echo $child['pu']; ?> </td>
                                                        <td class="text-right font-weight-bold"> Ar <?php echo $child['price_ht']; ?> </td>
                                                        <td style="width:4%" class="text-center"> 
                                                            <a href="#">
                                                                <i class="fas fa-edit" style="color: #5A9BDC"></i>
                                                            </a>
                                                        </td>
                                                        <td style="width:4%" class="text-center"> 
                                                            <a href="#">
                                                                <i class="fas fa-trash" style="color:#DA594F"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            <tr>
                                                <td colspan=4 class="text-right"> Total HT :</td>
                                                <td class="text-right"> 4000 </td>
                                            </tr>
                                            <tr>
                                                <td colspan=4 class="text-right"> TVA :</td>
                                                <td class="text-right" >20%</td>
                                            </tr>
                                            <tr>
                                                <td colspan=4 class="text-right"> Total TTC :</td>
                                                <td class="text-right">20%</td>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td colspan=4 class="text-right">Accompte :</td>
                                                <td class="text-right"></td>
                                            </tr>
                                            <tr>
                                                <td colspan=4 class="text-right"> Net a payer :</td>
                                                <td class="text-right"></td>
                                            </tr>
                                        </tbody>    
                                    </table>
                                </div>
                                <div style="padding: 2% 2% 2% 2%">
                                    Arrêter la présente facture à la somme de cinq mille euros TTC
                                </div>
                                <div class="d-flex flex-row justify-content-between col-md-6 offset-md-3" style="padding: 2% 2% 2% 2%">
                                    <button class="btn btn-success">
                                        VALIDER
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        MODIFER
                                    </button>
                                    <button class="btn btn-danger">
                                        SUPPRIMER
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        EXPORTER PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>

                  <!-- INSERTION NOUVEAU PRODUIT // MODAL -->
                  <div class="modal fade" id="staticBackdropAddToFacture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center" id="staticBackdropLabel">
                                    Nouvelle facture  
                                </h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                            </div>

                            <div class="modal-body text-center align-item-center">
                                <form action = "<?php echo site_url("index.php/Facture_ctrl/adding_product") ?>" method="POST">
                                    <!-- PRODUCTS -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="input-select" style="width: 30%">  Produits : </label>
                                            <select class="form-control" id="product_input" name="product_id">
                                                <option value=""></option>
                                                <?php  
                                                if($products){ 
                                                    foreach($products as $product){ ?>
                                                        <option value="<?php echo $product -> id_product; ?>">
                                                            <?php echo $product -> nom_product; ?>
                                                        </option>
                                                    <?php } 
                                                } ?>     
                                            </select>
                                        </div>
                                    </div>

                                    <!-- UNITE -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="input-select" style="width: 30%">  Unite : </label>
                                            <select class="form-control" id="unity_input" name="unity_id">
                                                <option value=""></option>
                                                <?php  
                                                if($units){ 
                                                    foreach($units as $unit){ ?>
                                                        <option value="<?php echo $unit -> id_unity ?>">
                                                            <?php echo $unit -> nom_unity ?>
                                                        </option>
                                                    <?php } 
                                                } ?>     
                                            </select>
                                        </div>
                                    </div>

                                    <!-- PU -->
                                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Prix unitaire :  </label>
                                            <input type="text" name="pu" id="pu_input" class="form-control" readonly>
                                        </div>
                                    </div>

                                     <!-- QUANTITE -->
                                     <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Quantite:  </label>
                                            <input id="qty_input" type="number" name="qty" class="form-control" required>
                                        </div>
                                    </div>

                                     <!-- PRIX HT -->
                                     <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                                        <div class="d-flex flex-row">
                                            <label for="inputText1" class="col-form-label" style="width: 30%"> Prix total HT:  </label>
                                            <input type="text" name="ht" id="ht_input" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <input type="hidden" name="facture_id" value="<?php echo $my_facture['id_facture']; ?>">
                                    <input type="submit" value = "Ajouter" class="btn btn-primary">
                                </form>
                            </div>
                            <div class="modal-footer justify-content-center">
                            
                            </div>
                        </div>

                        <script>
                            var productInput = document.getElementById('product_input');
                            var unityInput = document.getElementById('unity_input');
                            var priceInput = document.getElementById('pu_input');
                            var htInput = document.getElementById('ht_input');
                            var qtyInput = document.getElementById('qty_input');
                            var htInput = document.getElementById('ht_input');

                            function update_price(){
                                var productValue = productInput.value;
                                var unityValue = unityInput.value;
                                var qtyValue = qtyInput.value;

                                if(productValue && unityValue && qtyValue){
                                    console.log('Product is ', newPrice );
                                    var newPrice = calculate_unit_price(productValue, unityValue);
                                    htInput.value = newPrice * qtyValue;
                                } else if(productValue && unityValue){
                                    var newPrice = calculate_unit_price(productValue, unityValue);    
                                    priceInput.value = newPrice;
                                } 
                            }

                            function calculate_unit_price(product, unity){
                                <?php for($i = 0; $i < count($product_details); $i++){ 
                                        for($k = 0; $k < count($product_details[$i]); $k++){ ?>
                                            if('<?php echo $product_details[$i][$k]['id_product']; ?>' === product && '<?php echo $product_details[$i][$k]['id_unity']; ?>' === unity){
                                                return '<?php echo $product_details[$i][$k]['price_unit']; ?>';
                                            }
                                <?php } } ?>
                            }

                            productInput.addEventListener("change", update_price);
                            unityInput.addEventListener("change", update_price);
                            qtyInput.addEventListener("input", update_price);
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    