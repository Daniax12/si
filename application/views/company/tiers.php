
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
                        <a href="#" style="margin-right:20px">
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
    