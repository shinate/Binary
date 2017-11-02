<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:48
 */

namespace Codante\Binary;

use \ReflectionClass;

class Binary
{

    const RAW_FILTER_PACK = 1;
    const RAW_FILTER_HEX = 2;


    public static function __callStatic($name, $arguments) {
        // TODO: Implement __callStatic() method.
        return (new ReflectionClass('Codante\\Binary\\Type\\' . $name))->newInstanceArgs($arguments);
    }
}