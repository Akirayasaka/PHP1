<?php
  if(!empty($_GET['year'])){
      $year=$_GET['year'];
  }else{
      $year=89;
  }

  $empSQL="SELECT 
  `dept`.`部門名稱`,
	`employee`.`姓名`
FROM 
    `dept`,
    `employee` 
WHERE 
  `dept`.`部門代號`=`employee`.`部門代號` && 
  `dept`.id BETWEEN 6 AND 9
ORDER BY
  CONVERT(`dept`.`部門名稱` using big5) ASC,
  CONVERT(`employee`.`姓名` using big5) ASC";

  $saleSQL="SELECT 
  	`sales2`.`業務姓名`,
    `customer`.`客戶寶號`,
    `customer`.`聯絡人`,
    sum(`sales2`.`數量`*`product`.`單價`) AS `總額` 
FROM 
	`customer`,
    `sales2`,
    `product`
WHERE 
	`customer`.`客戶代號`=`sales2`.`客戶代號` && 
    `sales2`.`產品代號`=`product`.`產品代號` && 
    `sales2`.`交易年`='$year'
GROUP BY
    `customer`.`客戶代號`";

  $emps=$pdo->query($empSQL)->fetchAll();
  $sale=$pdo->query($saleSQL)->fetchAll();

  $name=[];
  foreach($sale as $a){
      $name[$a['業務姓名']][]=$a;
  }
  // print_r($name);
  foreach($emps as $k => $v){
      if(!empty($name[$v['姓名']])){
          $emps[$k]['客戶']=$name[$v['姓名']];
      }else{
          unset($emps[$k]);
      }
  }

  // print_r($emps);

  $dept=[];
  foreach($emps as $k => $v){
      $dept[$v['部門名稱']][]=$v;
  }

  // print_r($dept);

?>


<div class="dropdown mb-3">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Year
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="?do=content&repo=sales&year=89">89</a>
    <a class="dropdown-item" href="?do=content&repo=sales&year=90">90</a>
  </div>
</div>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataInfo</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Dept</th>
                      <th>Sales</th>
                      <th>Client</th>
                      <th>Contact</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>Dept</th>
                      <th>Sales</th>
                      <th>Customer</th>
                      <th>Contact</th>
                      <th>Total</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <?php
                        $sumAll=0;
                        foreach($dept as $key => $ddd){
                            echo "<tr><td colspan='5'>".$key."</td></tr>";
                            $sumDept=0;
                            foreach($ddd as $emp){
                                echo "<tr><td>&nbsp;</td><td>".$emp['姓名']."</td>";
                                $sumSales=0;
                                foreach($emp['客戶'] as $ay){
                                    echo "<td>".$ay['客戶寶號']."</td>";
                                    echo "<td>".$ay['聯絡人']."</td>";
                                    echo "<td>".$ay['總額']."</td><tr>";
                                    echo "<tr><td>&nbsp;</td><td>&nbsp;</td>";
                                    $sumSales+=$ay['總額'];
                                }
                                echo "<td colspan='2'></td>";
                                echo "<td>".$sumSales."</td></tr>";
                                $sumDept+=$sumSales;
                            }
                            echo "<tr>";
                            echo "<td colspan='2'>".$key."總計</td>";
                            echo "<td colspan='3'>".$sumDept."</td>";
                            echo "</tr>";
                            $sumAll+=$sumDept;
                        }
                    ?>
                    <tr><td colspan="5">&nbsp;</td></tr>
                    <tr>
                        <td colspan="2">銷售總額</td>
                        <td colspan="3"><?=$sumAll;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>