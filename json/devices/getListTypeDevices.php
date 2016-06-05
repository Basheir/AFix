<div class="col-lg-12 col-md-12">
    <div class="panel info-box panel-white">
        <div class="panel-body">

      
            <?php

            $resultData = array();
            include('../../config.php');


            $db->orderBy("ID", "asc");
            $devicesList = $db->get('typedevices');
            //echo $db->getLastQuery();

            foreach ($devicesList as $v) {


                $resultData[] = '

           <tr>
        <td>' . $v['ID'] . '</td>
        <td><input type="text" traget-input="' . $v['ID'] . '" traget="change" value="' . $v['NameDevices'] . '" class="form-control" name="searchID" id="xxx"></td>
        <td>
        <div class = "col-sm-6 col-md-3">
        <a href = "#showListImages" class = "thumbnail">
            <img imgTarget="' . $v['ID'] . '" data-toggle="modal" data-target="#myModalImagesViewrer" data-remote="./json/devices/getListImagesDevices.php?ID=' . $v['ID'] . '"   src="' . IMAGEDEVICESURL . $v['imageUrl'] . '" alt = ".">
        </a>
    </div>
        
        
        </td>



</td>



      </tr>


        ';


            }

            echo '<div class="row"><table id="exported" class="table table-striped table-bordered hover"  cellspacing="0" width="100%"><thead>
      <tr>
        <th>ID</th>
        <th>نوع الجهاز
        </th>
        <th>صورة</th>

      </tr>
    </thead>    <tbody>

';
            echo implode(' ', $resultData);
            echo '</tbody></table></div>        </div>

        </div>
    </div>
</div>';


            ?>





            
