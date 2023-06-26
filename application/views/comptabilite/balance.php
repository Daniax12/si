

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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Balance </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">  Exercice 2023 </li>
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
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0"> Numero des compte </th>
                                                <th class="border-0"> Intitule </th>
                                                <th class="border-0"> Debit </th>
                                                <th class="border-0"> Credit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($balances){            
                                                foreach($balances as $balance){ ?>
                                                    <tr class="">
                                                        <td><?php echo $balance[0] ->numero_compte  ?></td>
                                                        <td><?php echo $balance[0] -> intitule  ?></td>
                                                        <td class="text-right"> Ar <?php echo $balance[1]  ?></td>
                                                        <td class="text-right"> Ar <?php echo $balance[2]  ?></td>
                                                    </tr>
                                                <?php } 
                                            }?>
                                        </tbody>
                                        <tfoot class="font-weight-bold">
                                            <td colspan=2 class="text-right font-weight-bold"> Total </td>
                                            <td class="text-right font-weight-bold">Ar <?php echo $total[0] ?></td>
                                            <td class="text-right font-weight-bold"> Ar <?php echo $total[1] ?> </td>
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
    