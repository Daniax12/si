


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

            <div class ="card" style="padding:4% 4% 4% 4%">
                <form action = "#" method="POST">
                    <!-- RACINE DES COMPTES -->
                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                        <label for="input-select"> Racine des comptes : </label>
                        <select class="form-control" id="input-select_racine">
                            <?php  foreach($racines as $racine){ ?>
                                <option value="<?php echo $racine -> numero_compte ?>">
                                    <?php echo $racine -> numero_compte ?> - <?php echo $racine -> nom_racine ?>
                                </option>
                            <?php } ?>     
                        </select>
                    </div>
                    <!-- NUMERO DU COMPTE -->
                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                        <label for="inputText1" class="col-form-label"> Numero :  </label>
                        <div class="d-flex flex-row">
                            <input type="text" id="num_racine" class="form-control text-center" style="width:15%" readonly>
                            <input id="num_racine_value" type="text" name="numero_compte" class="form-control" required>
                        </div>   
                        <span id="check_numero"></span>  
                    </div>
                    <!-- INTITULE DU COMPTE -->
                    <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                        <label for="inputText1" class="col-form-label"> Intitule:  </label>
                        <input id="intitule_compte" type="text" name="intitule_compte" class="form-control" required>
                    </div>

                    <!-- REPARTITION DU CHARGE  -->
                    <div id="partition_charge" style="display:none">  

                        <!-- SUPPLETIVES -->
                         <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="radio_suppletive" checked="" value="1" class="custom-control-input"><span class="custom-control-label">Suppletive</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="radio_suppletive"  value="2" class="custom-control-input"><span class="custom-control-label">Non suppletive</span>
                            </label>
                        </div>
                        <!-- CORPORABLES OU INCORPORABLES -->
                        <div class="form-group border border-2" style="padding: 2% 2% 2% 2%">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="radio_corporable" checked="" value="1" class="custom-control-input"><span class="custom-control-label">Incorporable</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="radio_corporable"  value="2" class="custom-control-input"><span class="custom-control-label">Non incorporable</span>
                            </label>
                        </div>

                        <!-- REPARTITION DES CHARGES -->
                        <div class="form-group border border-2" id="incorporable_charge" style="padding: 2% 2% 2% 2%">
                            <label for="inputText1" class="col-form-label"> Repartition du charge:  </label>
                            <div>
                                <!-- TITRE DU TABLEAU  -->
                                <div class="d-flex flex-row" class="border border-5">
                                    <div  class="border border-2 text-center" style="width:20%">
                                        Produit
                                    </div>
                                    <div class="border border-2 text-center" style="width:15%">
                                        Nature
                                    </div>
                                    <div class="d-flex flex-row justify-content-between border border-5 text-center" style="width:65%">
                                        <?php $divis = 100/ count($centers); 
                                        for($i = 0; $i < count($centers); $i++){ ?>
                                            <div class="border border-2" style="width:<?php echo $divis ?>%" >
                                                <?php echo $centers[$i] -> nom_centre ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <!-- DATA -->
                                <?php foreach($products as $product){ ?>
                                    <div class="d-flex flex-row text-center">
                                        <!-- REPARTITION PRODUIT/CHARGES -->
                                        <div class="d-flex flex-column" style="width:20%">
                                            <div class="border border-2">
                                                <?php echo $product -> nom_product ?>
                                            </div>
                                            <div class="border border-2">
                                                <input type="number" value="0" id="rep_<?php echo $product -> nom_product ?>" name="rep_<?php echo $product -> nom_product ?>" class="border-primary" style="width: 50%" required> %
                                            </div>
                                        </div>
                                        <!-- REPARTITION PRODUIT - CHARGES FIXES/VARIABLES -->
                                        <div class="d-flex flex-column" style="width:15%">
                                            <div class="border border-2">
                                                F: <input type="number" value="0" id="fix_rep_<?php echo $product -> nom_product ?>" name="fix_rep_<?php echo $product -> nom_product ?>" class="border-primary" style="width: 50%">
                                            </div>
                                            <div class="border border-2">
                                                V: <input type="number" value="0" id="var_rep_<?php echo $product -> nom_product ?>" name="var_rep_<?php echo $product -> nom_product ?>" class="border-primary" style="width: 50%">
                                            </div>
                                        </div>
                                        <!-- REPARTITION DES CENTRES -->
                                        <div class="d-flex flex-row justify-content-between border border-5 text-center" style="width:65%">
                                        <?php for($i = 0; $i < count($centers); $i++){ ?>
                                            <div class="d-flex flex-column" style="width:<?php echo $divis ?>%">
                                                <div class="border border-2" >
                                                    <input type="number" value="0" id="fix_rep_<?php echo $product -> nom_product ?>_<?php echo $centers[$i] -> nom_centre ?>" name="fix_rep_<?php echo $product -> nom_product ?>_<?php echo $centers[$i] -> nom_centre ?>" class="border-primary" style="width: 50%"> % 
                                                </div>
                                                <div class="border border-2">
                                                    <input type="number" value="0" id="var_rep_<?php echo $product -> nom_product ?>_<?php echo $centers[$i] -> nom_centre ?>" name="var_rep_<?php echo $product -> nom_product ?>_<?php echo $centers[$i] -> nom_centre ?>" class="border-primary" style="width: 50%"> %
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <input onclick=check_new_charge() value = "Ajouter" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script>
        



        // Check then the new charge -> and all repartition
        function check_new_charge(){

            // Sending the data to the controller
            var data_to_send = [];
            var racine = document.getElementById("input-select_racine").value;
            var numero = racine + document.getElementById("num_racine_value").value;
            var intitule = document.getElementById("intitule_compte").value;

            // Compte simple
            if(racine != 6){
                var xhr = new XMLHttpRequest();
                var data = {
                    racine: racine,
                    numero: numero,
                    intitule: intitule
                };

                
                xhr.open('POST', 'http://localhost/si_main/index.php/Compte_ctrl/insert_new_compte', true);
                xhr.setRequestHeader('Content-Type', 'application/json');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log('Data sent successfully');
                            console.log('Response is '+ xhr.responseText);
                            if(xhr.responseText == 0){
                                window.location.href = "<?php echo site_url('index.php/Compte_ctrl'); ?>";
                            }
                        } else {
                            console.log('Error sending data:', xhr.status);
                            // Handle the error
                        }
                    }
                };
                xhr.send(JSON.stringify(data));
            } else if(racine == 6){ 
                var radio_corporative = document.getElementsByName('radio_corporable');
                var selected_corporable = 0;

                for (var i = 0; i < radio_corporative.length; i++) {
                    if (radio_corporative[i].checked) {
                        selected_corporable = radio_corporative[i].value;
                        break; 
                    }
                }

                var radio_suppletive = document.getElementsByName('radio_suppletive');
                var selected_suppletive = 0;

                for (var i = 0; i < radio_suppletive.length; i++) {
                    if (radio_suppletive[i].checked) {
                        selected_suppletive = radio_corporative[i].value;
                        break; 
                    }
                }


                if(selected_corporable == 2){
                    var xhr = new XMLHttpRequest();
                    var data = {
                        racine: racine,
                        numero: numero,
                        intitule: intitule,
                        corporable: '2'
                    };

                    xhr.open('POST', 'http://localhost/si_main/index.php/Compte_ctrl/insert_new_compte', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                console.log('Data sent successfully');
                                console.log('Response is '+ xhr.responseText);
                                if(xhr.responseText == 0){
                                    window.location.href = "<?php echo site_url('index.php/Compte_ctrl'); ?>";
                                }
                            } else {
                                console.log('Error sending data:', xhr.status);
                                // Handle the error
                            }
                        }
                    };
                    xhr.send(JSON.stringify(data));
                } else {
                    var general_array = [];
                    var check_rep_prod = 0;
                    <?php foreach($products as $product){ ?>
                        var prod_rep = parseInt(document.getElementById("rep_<?php echo $product -> nom_product ?>").value);            // Repartitiopn des produits
                        var fixe_rep = parseInt(document.getElementById("fix_rep_<?php echo $product -> nom_product ?>").value);        //Repartition fixe_variable
                        var var_rep = parseInt(document.getElementById("var_rep_<?php echo $product -> nom_product ?>").value);

                        var arr_rep_center = [];
                        <?php foreach($centers as $center){ ?>
                            var temp_center = [];
                            var temp_rep_fix = parseInt(document.getElementById("fix_rep_<?php echo $product -> nom_product ?>_<?php echo $center -> nom_centre ?>").value);
                            var temp_rep_variable = parseInt(document.getElementById("var_rep_<?php echo $product -> nom_product ?>_<?php echo $center -> nom_centre ?>").value);
                            temp_center.push(temp_rep_fix);
                            temp_center.push(temp_rep_variable);
                            temp_center.push("<?php echo $center -> id_centre ?>");
                            arr_rep_center.push(temp_center);                                                                           // Repartition des centres
                        <?php } ?>

                        var sub_array = [prod_rep, fixe_rep, var_rep, arr_rep_center, "<?php echo $product -> id_product ?>"];
                        general_array.push(sub_array);

                    <?php } ?>

                    // Check the repartition of all product
                    for(var element of general_array){
                        check_rep_prod += element[0]; 
                    }
                    console.log(general_array);
                    if(check_rep_prod != 100){
                        console.log(check_rep_prod);
                        alert("Error here");
                        
                    } else {
                    //  alert("Great");
                        var can_insert = 0;
                        for(var element of general_array){
                            if((element[1] + element[2]) != 100){
                                alert("Error on variable + fixe");
                                can_insert = 1;
                                break;
                            } else {
                                if(element[1] != 0){
                                    var check_fixe = 0;
                                    for(elt of element[3]){
                                        check_fixe += elt[0]; 
                                    }
                                    if(check_fixe != 100){
                                        alert("Error fixe total");
                                        can_insert = 1;
                                        break;
                                    } 
                                }
                                if(element[2] != 0){
                                    var check_variable = 0;
                                    for(elt of element[3]){
                                        check_variable += elt[1]; 
                                    }
                                    if(check_variable != 100){
                                        alert("Error variable total");
                                        can_insert = 1;
                                        break;
                                    }
                                }
                            }
                        }

                        if(can_insert == 0){
                            var xhr = new XMLHttpRequest();
                            var data = {
                                racine: racine,
                                numero: numero,
                                intitule: intitule,
                                corporable: selected_corporable,
                                suppletive: selected_suppletive,
                                rep_charge: general_array
                            };

                            xhr.open('POST', 'http://localhost/si_main/index.php/Compte_ctrl/insert_new_compte', true);
                            xhr.setRequestHeader('Content-Type', 'application/json');

                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        console.log('Data sent successfully');
                                        console.log('Response is '+ xhr.responseText);
                                        if(xhr.responseText == 0){
                                            window.location.href = "<?php echo site_url('index.php/Compte_ctrl'); ?>";
                                        }
                                    } else {
                                        console.log('Error sending data:', xhr.status);
                                        // Handle the error
                                    }
                                }
                            };
                            xhr.send(JSON.stringify(data));
                        }
                    }
                }
            }
        }

        // CHECK IF ALREADY IN DB COMPTE
        const numRacineValue = document.getElementById('num_racine_value');
       // var start = document.getElementById('num_racine').value;
        const checkNumero = document.getElementById('check_numero');
        const arrayData = <?php echo json_encode($numeros); ?>;
        // Add an event listener for input changes
        numRacineValue.addEventListener('input', function() {
            var start = document.getElementById('num_racine').value;
            const enteredValue = start+numRacineValue.value;
     //       console.log(enteredValue.length);
            if (enteredValue.length < 5) {
                checkNumero.innerHTML = 'Enter at least 4 characters';
                return;
            } else if(enteredValue.length > 5){
                checkNumero.innerHTML = 'Enter at least less than 5 characters';
                return;
            }
            checkNumero.innerHTML = '';
            let isInDatabase = false;
            for (let i = 0; i < arrayData.length; i++) {
                const item = arrayData[i];
                if (item.hasOwnProperty('numero_compte') && item.numero_compte == enteredValue) {
                    isInDatabase = true;
                    break;
                }
            }
            if (isInDatabase) {
                checkNumero.innerHTML = 'Numero existe deja dans la base donnes';
                checkNumero.style.color = 'red';
            } 
        });

         // CHECK THE NUMERO DEBUT GENERAL ACCOMPTE
        // Get references to the select and input elements
        var selectInput = document.getElementById("input-select_racine");
        var charge_repartition = document.getElementById("partition_charge");
        var textInput = document.getElementById("num_racine");

        // Add event listener to the select element
        selectInput.addEventListener("change", function() {
            // Update the value of the text input based on the selected option
            textInput.value = selectInput.value;

            if(textInput.value === '6'){
                charge_repartition.style.display = "block";
            } else {
                charge_repartition.style.display = "none";
            }
        });


        // CHECK THE DIV CHARGE INCORPORABILITE
        var myRadio = document.getElementsByName("radio_corporable");
        var myDiv = document.getElementById("incorporable_charge");

        // Add event listener to the radio buttons
        for (var i = 0; i < myRadio.length; i++) {
            myRadio[i].addEventListener("change", function() {
                // Check the selected radio button and update the display property of the div
                if (this.value === "1") {
                myDiv.style.display = "block";
                } else {
                myDiv.style.display = "none";
                }
            });
        }
    </script>
</div>
    