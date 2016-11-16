<?php

/**
 * بسم الله الرحمن الرحيم
 * Created by Basheir.
 * User: pc-sales
 * Date: 14‏/11‏/2016
 * Time: 10:07 ص
 */
class AlertApi extends MysqliDb
{


    /**
     * @param $v
     * @param string $oper
     * @return array  اعادة الناتج جسون
     */

    public function getAlerDevices(){

        $this->where('isShow','1');
        $this->join("devices", "alert.id = devices.idDevices", "INNER");
        $this->join("coustemers", "devices.idDevices=coustemers.ID", "INNER");
        return  $this->JsonBuilder()->get('alert');

    }


    public function setStatusAlert($id,$s){

        $data = array('isShow' => $s);
        $this->where('id', (int)$id);

       return  $this->update('alert', $data);


    }


    public function addStatusDevices($dataArray){

       return $this->insert('alert', $dataArray);


    }






}