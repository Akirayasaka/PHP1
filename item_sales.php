<?php

    if(!empty($_GET['year'])){
        $year=$_GET['year'];
    }else{
        $year=89;
    }

    $salesSQL="SELECT 
	`sales2`.`業務姓名`,
    `customer`.`客戶寶號`,
    `sales2`.`數量`,
    `product`.`單價`,
    (`sales2`.`數量`*`product`.`單價`) AS `Total` 
FROM 
	`customer`,
    `sales2`,
    `product` 
WHERE 
	`customer`.`客戶代號`=`sales2`.`客戶代號` && 
    `sales2`.`產品代號`=`product`.`產品代號` && 
    (`sales2`.`數量`*`product`.`單價`)>=10000000 &&
    `sales2`.`交易年`='$year'

ORDER BY
	`Total` DESC,
    `product`.`單價` DESC,
    `sales2`.`數量` DESC,
    CONVERT(`sales2`.`業務姓名` using big5) ASC";

$sales=$pdo->query($salesSQL)->fetchAll();


?>

<div class="dropdown mb-3">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Year
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="?do=content&repo=items&year=89">89</a>
    <a class="dropdown-item" href="?do=content&repo=items&year=90">90</a>
  </div>
</div>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataInfo</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sales</th>
                      <th>Client</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sales</th>
                      <th>Client</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                        foreach($sales as $man){
                            echo "<tr>";
                            echo "<td>".$man['業務姓名']."</td>";
                            echo "<td>".$man['客戶寶號']."</td>";
                            echo "<td>".$man['數量']."</td>";
                            echo "<td>".$man['單價']."</td>";
                            echo "<td>".$man['Total']."</td>";
                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
