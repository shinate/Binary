<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午8:09
 */

require substr(__DIR__, 0, -4) . '/autoload.php';

function F($constructor) {
    var_dump(new $constructor(1));
}

F(Codante\Binary\Type\SIGNED_INTEGER::class);