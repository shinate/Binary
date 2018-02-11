<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午8:09
 */
require 'autoload.php';

function F($constructor) {
    var_dump(new $constructor(1));
}

F(Codante\Binary\Type\SIGNED_INTEGER::class);
F(Codante\Binary\Type\UNSIGNED_CHAR::class);
F(Codante\Binary\Type\SIGNED_SHORT::class);
F(Codante\Binary\Type\UNSIGNED_SHORT::class);
F(Codante\Binary\Type\SIGNED_INTEGER::class);
F(Codante\Binary\Type\UNSIGNED_INTEGER::class);