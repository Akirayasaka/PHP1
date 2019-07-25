<?php
    if(!empty($_GET['id'])){
        $cli=find("customer",$_GET['id']);
    }
?>
<h1>Modify Client</h1>
<form action="api_client.php?do=editclient" method="post">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            <div>Client Name</div>
                            <div>
                                <input type="text" name="name" value="<?=$cli['客戶寶號'];?>">
                            </div>
                        </li>
                        <li>
                            <div>Client ID</div>
                                <div>
                                   <input type="text" name="code" value="<?=$cli['客戶代號'];?>">
                                </div>
                        </li>
                        <li>
                            <div>City</div>
                            <div>
                                <select name="country" id="">
                                    <?php
                                        $country=['台北市',
                                        '台北縣',
                                        '基隆市',
                                        '宜蘭縣',
                                        '桃園縣',
                                        '新竹市',
                                        '新竹縣',
                                        '苗栗縣',
                                        '台中市',
                                        '台中縣',
                                        '彰化縣',
                                        '南投縣',
                                        '嘉義市',
                                        '嘉義縣',
                                        '雲林縣',
                                        '台南市',
                                        '台南縣',
                                        '高雄市',
                                        '高雄縣',
                                        '澎湖縣',
                                        '屏東縣',
                                        '台東縣',
                                        '花蓮縣',
                                        '金門縣',
                                        '連江縣',
                                        '南海諸島'];
                                        foreach($country as $c){
                                            $selected=($c==$cli['縣市'])?"selected":"";
                                            echo "<option value='".$c."' $selected>".$c."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>Address</div>
                            <div>
                                <input type="text" name="addr" value="<?=$cli['地址'];?>">
                            </div>
                        </li>
                        <li>
                             <div>Postal Code</div>
                             <div>
                                 <input type="text" name="postcode" value="<?=$cli['郵遞區號'];?>">
                            </div>
                        </li>
                        <li>
                             <div>Contact</div>
                             <div>
                                 <input type="text" name="contact" value="<?=$cli['聯絡人'];?>">
                            </div>
                        </li>
                        <li>
                             <div>Title</div>
                             <div>
                                 <input type="text" name="title" value="<?=$cli['職稱'];?>">
                            </div>
                        </li>
                        <li>
                             <div>Phone</div>
                             <div>
                                 <input type="text" name="phone" value="<?=$cli['電話'];?>">
                            </div>
                        </li>
                        <li>
                            <div>Industry</div>
                            <div>
                                <input type="text" name="ind" value="<?=$cli['行業別'];?>">
                            </div>
                        </li>
                        <li>
                            <div>GUI Number</div>
                            <div>
                                 <input type="text" name="gui" value="<?=$cli['統一編號'];?>">
                            </div>  
                         </li>
                        <li>
                            <input type="hidden" name="id" value="<?=$cli['id'];?>">
                            <input type="submit" value="OK" class="btn btn-outline-success mt-3">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
<button onclick="javascript:location='index.php?do=admin&ad=client'" class="btn btn-dark mt-3 mb-3">Back</button>