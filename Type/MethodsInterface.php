<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/3
 * Time: 下午4:29
 */

namespace Codante\Binary\Type;


interface MethodsInterface
{
    public function pack($data);

    public function unpack($raw);

    public function hexdec($data);

    public function dechex($raw);
}