<?php
    if(!empty($_GET['id'])){
        $emp=find("employee",$_GET['id']);
    }
?>
<h1>Modify Employee Info</h1>
<form action="api_emp.php?do=editemp" method="post">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            <div>Employee Name</div>
                            <div><input type="text" name="name" value="<?=$emp['姓名'];?>"></div>
                        </li>
                        <li>
                            <div>Title</div>
                            <div>
                                <select name="title" id="">
                                    <?php
                                        $sql="SELECT `現任職稱` FROM `employee` group by `現任職稱`";
                                        $pos=$pdo->query($sql)->fetchAll();
                                        foreach($pos as $p){
                                            $selected=($p['現任職稱']==$emp['現任職稱'])?"selected":"";
                                            echo "<option value='".$p['現任職稱']."'$selected>".$p['現任職稱']."</option>  ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>Dept. ID</div>
                            <div>
                                <select name="deptcode" id="">
                                    <?php
                                        $sql="SELECT `部門名稱`,`部門代號` FROM `dept`";
                                        $dept=$pdo->query($sql)->fetchAll();
                                        foreach($dept as $d){
                                            $selected=($d['部門代號']==$emp['部門代號'])?"selected":"";
                                            echo "<option value='".$d['部門代號']."'$selected>".$d['部門代號']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>Country</div>
                            <div>
                                <select name="country" id="">
                                    <?php
                                        $country=[
                                            '台北市',
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
                                            '南海諸島'
                                        ];
                                        foreach($country as $c){
                                            $selected=($c==$emp['縣市'])?"selected":"";
                                            echo "<option value='".$c."'$selected>".$c."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>Address</div>
                            <div>
                                <input type="text" name="addr" value="<?=$emp['地址'];?>">
                            </div>
                        </li>
                        <li>
                            <div>Phone</div>
                            <div>
                                <input type="text" name="phone" value="<?=$emp['電話'];?>">
                            </div>
                        </li>
                        <li>
                            <div>Postal Code</div>
                            <div>
                                <input type="text" name="postcode" value="<?=$emp['郵遞區號'];?>">
                            </div>
                        </li>
                        <li>
                            <div>Salary</div>
                            <div>
                                <input type="text" name="salary" value="<?=$emp['目前月薪資'];?>">
                            </div>
                        </li>
                        <li>
                            <div>Holiday</div>
                            <div>
                                <select name="holiday" id="">
                                <option value="7" <?=($emp['年假天數']==7)?"selected":"";?>>7</option>
                                <option value="14" <?=($emp['年假天數']==14)?"selected":"";?>>14</option>
                                </select>
                            </div>
                        </li>
                        <li>
                        <input type="hidden" name="id" value="<?=$emp['id'];?>">
                        <input type="submit" value="OK" class="btn btn-outline-success mt-3">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</form>
<button onclick="javascript:location='index.php?do=admin&ad=emp'" class="btn btn-dark mt-3 mb-3">Back</button>