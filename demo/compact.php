<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2018/2/8
 * Time: 下午8:56
 */
require 'autoload.php';

use Codante\Binary\Binary;

$CONF_1 = [
    'sign'    => Binary::UNSIGNED_SHORT(Binary::RAW_FILTER_PACK),
    'content' => Binary::UNSIGNED_INTEGER(8, Binary::RAW_FILTER_PACK),
];

var_dump($CONF_1);

// $CONF_2 = Binary::UNSIGNED_CHAR(null, Binary::RAW_FILTER_HEX());
$res = Binary::Builder($CONF_1, [
    'sign'    => 6,
    'content' => 123,
])->stream()->all();

var_dump(Binary::Parser($CONF_1, Binary::Stream($res))->data());