<button onclick="javascript:location='?do=admin&ad=newclient'" class="mb-3 btn btn-success">Add Client</button>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Client Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Client ID</th>
                      <th>City</th>
                      <th>Address</th>
                      <th>Postal Code</th>
                      <th>Contact</th>
                      <th>Title</th>
                      <th>Phone</th>
                      <th>Industry</th>
                      <th>GUI number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>Client Name</th>
                      <th>Client ID</th>
                      <th>City</th>
                      <th>Address</th>
                      <th>Postal Code</th>
                      <th>Contact</th>
                      <th>Title</th>
                      <th>Phone</th>
                      <th>Industry</th>
                      <th>GUI number</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <?php
                        $rows=all("customer");
                        foreach($rows as $c){
                            echo "<tr>";
                            echo "<td>".$c['客戶寶號']."</td>";
                            echo "<td>".$c['客戶代號']."</td>";
                            echo "<td>".$c['縣市']."</td>";
                            echo "<td>".$c['地址']."</td>";
                            echo "<td>".$c['郵遞區號']."</td>";
                            echo "<td>".$c['聯絡人']."</td>";
                            echo "<td>".$c['職稱']."</td>";
                            echo "<td>".$c['電話']."</td>";
                            echo "<td>".$c['行業別']."</td>";
                            echo "<td>".$c['統一編號']."</td>";
                            echo "<td>";
                    ?>
                            <button  onclick="javascript:location='?do=admin&ad=editclient&id=<?=$c['id'];?>'" class="btn btn-warning">Modify</button>
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