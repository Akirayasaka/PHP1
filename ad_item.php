
<button onclick="javascript:location='?do=admin&ad=newitem'" class="mb-3 btn btn-success">Add Product</button>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Product Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Product ID</th>
                      <th>Unit Price</th>
                      <th>Cost</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>Product Name</th>
                      <th>Product ID</th>
                      <th>Unit Price</th>
                      <th>Cost</th>
                      <th>Action</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <?php
                        $rows=all("product");
                        foreach($rows as $item){
                            echo "<tr>";
                            echo "<td>".$item['產品名稱']."</td>";
                            echo "<td>".$item['產品代號']."</td>";
                            echo "<td>".$item['單價']."</td>";
                            echo "<td>".$item['成本']."</td>";
                            echo "<td>";
                    ?>
                            <button  onclick="javascript:location='?do=admin&ad=edititem&id=<?=$item['id'];?>'" class="btn btn-outline-warning">Modify</button>
                            <button  onclick="javascript:location='?do=admin&ad=delitem&id=<?=$item['id'];?>'" class="btn btn-danger">Delete</button>
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

