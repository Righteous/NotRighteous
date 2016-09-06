<?php

/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 8/31/16
 * Time: 8:26 PM
 */

function set_active($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}