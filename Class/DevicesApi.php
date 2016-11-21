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
         * @return array  اعادة الناتج جسون
         */

        public function getDevicesBySeiral()
        {

            $this->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");

            return $this->JsonBuilder()->get('devices');

        }




         public function getDevices($limit=null)
                {
                    $this->orderBy("devices.idDevices", "DESC");
                    $this->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");
                    $this->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");
                    return $this->get('devices',$limit);

                }




         public function setTrackDevices($data,$id)
                {

                    $this->where('idDevices', (int)$id);
                    return $this->update('devices',$data);

                }





    }