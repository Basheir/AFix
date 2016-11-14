<?php

/**
 * بسم الله الرحمن الرحيم
 * Created by Basheir.
 * User: pc-sales
 * Date: 14‏/11‏/2016
 * Time: 10:07 ص
 */
class DevicesApi extends MysqliDb
{


    /**
     * @param $v
     * @param string $oper
     * @return array  اعادة الناتج جسون
     */

    public function getDevicesBySeiral($v,$oper='LIKE'){
        $this->where('Serial',$v, $oper);
        $this->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");
        return $this->JsonBuilder()->get('devices');


    }


}