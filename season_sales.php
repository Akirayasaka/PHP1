<?php

    // $year= (!empty($_GET['year']))?$_GET['year']:89;

  if(!empty($_GET['year'])){
      $year=$_GET['year'];
  }else{
      $year=89;
  }

  $salesSQL="SELECT
  `product`.`產品名稱`,
  FLOOR((`sales2`.`交易月`-1)/3)+1 AS '季',
  sum(`sales2`.`數量`) AS '數量',
  sum(`sales2`.`數量`*`product`.`單價`) AS '銷售額'
FROM
  `sales2`,
  `product`
WHERE 
  `sales2`.`產品代號`=`product`.`產品代號` && 
  `sales2`.`交易年`='$year'
GROUP BY
  `sales2`.`產品代號`,
  FLOOR((`sales2`.`交易月`-1)/3)+1
ORDER BY
  CONVERT(`product`.`產品名稱` using big5) ASC , 
  FLOOR((`sales2`.`交易月`-1)/3)+1";

  $sales=$pdo->query($salesSQL)->fetchAll();

  $pro=[];
  $sumAll=0;
  // print_r($sales);
  foreach($sales as $key => $s){
      if(!empty($pro[$s['產品名稱']]["銷售額"])){
        $pro[$s['產品名稱']]["銷售額"]+=$s['銷售額'];
      }else{
        $pro[$s['產品名稱']]["銷售額"]=$s['銷售額'];
      }
        $pro[$s['產品名稱']][$s['季']]=$s['數量'];
        $sumAll+=$s['銷售額'];
  }
  // echo $sumAll;
  // print_r($pro);
  foreach($pro as $key => $p){
      $sumQ=0;
      $p['銷售百分比']=round($p['銷售額']/$sumAll,4)*100 . "%";
      
      for($i=1;$i<5;$i++){
          if(!empty($p[$i])){
              $sumQ+=$p[$i];
              
          }else{
              $p[$i]=0;
          }
      }
      $p['平均數量']=round($sumQ/4,2);
      $pro[$key]=$p;
      
  }
  // print_r($pro);

?>
                
<div class="dropdown mb-3">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Year
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="?do=content&repo=season&year=89">89</a>
    <a class="dropdown-item" href="?do=content&repo=season&year=90">90</a>
  </div>
</div>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataInfo</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Q1</th>
                      <th>Q2</th>
                      <th>Q3</th>
                      <th>Q4</th>
                      <th>Average</th>
                      <th>Total</th>
                      <th>Sales percentage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($pro as $key => $v){
                            echo "<tr>";
                            echo "  <td>".trim($key)."</td>";
                            echo "  <td>".number_format($v['1'],0,'.',',')."</td>";
                            echo "  <td>".number_format($v['2'],0,'.',',')."</td>";
                            echo "  <td>".number_format($v['3'],0,'.',',')."</td>";
                            echo "  <td>".number_format($v['4'],0,'.',',')."</td>";
                            echo "  <td>".number_format($v['平均數量'],2,'.',',')."</td>";
                            echo "  <td>".number_format($v['銷售額'],0,'.',',')."</td>";
                            echo "  <td>".$v['銷售百分比']."</td>";
                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          
          <canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>