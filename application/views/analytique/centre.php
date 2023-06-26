

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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Etude analytique d'un produit PAR CENTRE </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $the_product['nom_product'] ?></li>
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
                        <form action = "<?php echo site_url("index.php/Product_ctrl/repartition_charge_product") ?>" method="GET">
                            <div class="d-flex flex-row align-items-center">
                                <div class="form-group">
                                    <select class="form-control" name="id_product_input" id="input-select_racine" style="width:400px">
                                        <option value=""></option>
                                        <?php  
                                        if($products){
                                            foreach($products as $product){ ?>
                                                <option value="<?php echo $product -> id_product ?>">
                                                    <?php echo $product -> nom_product ?>
                                                </option>
                                            <?php } 
                                        } ?>     
                                    </select>
                                </div>
                                <div style="margin-left:20px">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">Centre</th>
                                                <th class="border-0"> Valeur </th>
                                                <th class="border-0"> Pourcentage </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($repartition_centre){ 
                                                foreach($repartition_centre as $repartition){ ?>
                                                    <tr class="">
                                                        <td > <?php echo $repartition[0] -> nom_centre ?> </td>
                                                        <td class="text-right"> Ar <?php echo number_format($repartition[1], 2, ',', ' ')  ?></td>
                                                        <td class="text-right"> <?php echo $repartition[2] ?> % </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <td class="text-right"> Total </td>
                                            <td class="text-right">Ar <?php echo number_format($charges, 2, ',', ' ')  ?></td>
                                            <td class="text-right"> 100.00 % </td>
                                        </tfoot>
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
    