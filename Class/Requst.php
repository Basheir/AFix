<?php

    /**
     * Created by PhpStorm.
     * User: pc-sales
     * Date: 18‏/11‏/2016
     * Time: 7:44 م
     */
    class Requst
    {

        public function post($v, $fun)
        {

            $ar = [
                'GET'  => $_GET,
                'POST' => $_POST
            ];

            if (isset($_POST[$v])) {
                call_user_func($fun);
            }


        }


        public function get($v, $fun)
        {

            //print_r(Requst::getTypeMethoed($type));

            $ar = [
                'GET'  => $_GET,
                'POST' => $_POST
            ];

            if (isset($_GET[$v])) {
                call_user_func($fun);
            }


        }

    }