

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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Grand livre du compte </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $compte['intitule'] ?></li>
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
                        <form action = "<?php echo site_url("index.php/Compte_ctrl/grand_livre_page") ?>" method="GET">
                            <div class="d-flex flex-row align-items-center">
                                <div class="form-group">
                                    <select class="form-control" name="id_compte_general_input" id="input-select_racine" placeholder="Rechercher">
                                        <option value=""></option>
                                        <?php  foreach($comptes_generaux as $compte_general){ ?>
                                            <option value="<?php echo $compte_general -> id_compte_general ?>">
                                                <?php echo $compte_general -> numero_compte ?> - <?php echo $compte_general -> intitule ?>
                                            </option>
                                        <?php } ?>     
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0 text-center">
                                                <th class="border-0">Date</th>
                                                <th class="border-0"> Piece </th>
                                                <th class="border-0"> Tiers </th>
                                                <th class="border-0"> Libelle </th>
                                                <th class="border-0"> Debit </th>
                                                <th class="border-0"> Credit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($livres){            
                                                foreach($livres as $livre){ ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $livre['date_insertion']  ?></td>
                                                        <td><?php echo $livre['ref_piece']  ?></td>
                                                        <td><?php echo $livre['intitule_tiers']  ?></td>
                                                        <td><?php echo $livre['libelle']  ?></td>
                                                        <td class="text-right"> Ar <?php echo $livre['debit']  ?></td>
                                                        <td class="text-right"> Ar <?php echo $livre['credit']  ?></td>
                                                    </tr>
                                                <?php } 
                                            }?>
                                        </tbody>
                                        <tfoot>
                                            <td colspan=4 class="text-right"> Total </td>
                                            <td class="text-right">Ar <?php echo $balance[0] ?></td>
                                            <td class="text-right"> Ar <?php echo $balance[1] ?> </td>
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
    