<button onclick="javascript:location='?do=admin&ad=newemp'" class="mb-3 btn btn-success">Add Employee</button>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Employee Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Dept. ID</th>
                      <th>&nbsp&nbspCity&nbsp&nbsp</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Postal Code</th>
                      <th>Salary</th>
                      <th>Holiday</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                    <th>Employee Name</th>
                      <th>Title</th>
                      <th>Employee ID</th>
                      <th>City</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Postal Code</th>
                      <th>Salary</th>
                      <th>Holiday</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <?php
                        $rows=all("employee");
                        foreach($rows as $emp){
                            echo "<tr>";
                            echo "<td>".$emp['姓名']."</td>";
                            echo "<td>".$emp['現任職稱']."</td>";
                            echo "<td>".$emp['部門代號']."</td>";
                            echo "<td>".$emp['縣市']."</td>";
                            echo "<td>".$emp['地址']."</td>";
                            echo "<td>".$emp['電話']."</td>";
                            echo "<td>".$emp['郵遞區號']."</td>";
                            echo "<td>".$emp['目前月薪資']."</td>";
                            echo "<td>".$emp['年假天數']."</td>";
                            echo "<td>";
                    ?>
                            <button  onclick="javascript:location='?do=admin&ad=editemp&id=<?=$emp['id'];?>'" class="btn btn-warning">Modify</button>
                    <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>