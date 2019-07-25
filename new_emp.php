<h1>Add Employee</h1>
<form action="api_emp.php?do=newemp" method="post">
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
                            <div><input type="text" name="name" value=""></div>
                        </li>
                        <li>
                            <div>Title</div>
                                <div>
                                    <select name="title" id="">
                                    <?php
                                        $sql="SELECT `現任職稱` FROM `employee` group by `現任職稱`";
                                        $pos=$pdo->query($sql)->fetchAll();
                                        foreach($pos as $p){
                                            echo "<option value='".$p['現任職稱']."'>".$p['現任職稱']."</option>";
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
                                            echo "<option value='".$d['部門代號']."'>".$d['部門名稱']."</option>";
                                        }
                                    ?>
                                </select>
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
                                            echo "<option value='".$c."'>".$c."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>Address</div>
                            <div><input type="text" name="addr" value=""></div>
                        </li>
                         <li>
                             <div>Phone</div>
                             <div><input type="text" name="phone" value=""></div>
                        </li>
                         <li>
                             <div>Postal Code</div>
                             <div><input type="text" name="postcode" value=""></div>
                        </li>
                        <li>
                            <div>Salary</div>
                            <div><input type="text" name="salary" value=""></div>
                        </li>
                        <li>
                            <div>Holiday</div>
                            <div>
                                 <select name="holiday">
                                 <option value="7">7天</option>
                                 <option value="14">14天</option>
                                 </select>
                            </div>  
                         </li>
                        <li>
                            <input type="submit" value="Add" class="btn btn-outline-success mt-3">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
<button onclick="javascript:location='index.php?do=admin&ad=emp'" class="btn btn-dark mt-3 mb-3">Back</button>