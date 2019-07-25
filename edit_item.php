<?php
    if(!empty($_GET['id'])){
        $item=find("product",$_GET['id']);
    }
?>
<h1>Modify Procuct Info</h1>
<form action="api_item.php?do=edititem" method="post">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            <div>Product Name</div>
                            <div><input type="text" name="name" value="<?=$item['產品名稱'];?>"></div>
                        </li>
                        <li>
                            <div>Product ID</div>
                            <div><input type="text" name="code" value="<?=$item['產品代號'];?>"></div>
                        </li>
                        <li>
                            <div>Unit Price</div>
                            <div><input type="text" name="price" value="<?=$item['單價'];?>"></div>
                        </li>
                        <li>
                            <div>Cost</div>
                            <div><input type="text" name="cost" value="<?=$item['成本'];?>"></div>
                        </li>
                        <li>
                        <input type="hidden" name="id" value="<?=$item['id'];?>">
                        <input type="submit" value="OK" class="btn btn-outline-success mt-3">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</form>
<button onclick="javascript:location='index.php?do=admin'" class="btn btn-dark mt-3 mb-3">Back</button>