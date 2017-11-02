<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;


class UNSIGNED_CHAR extends Prototype
{
    protected $LENGTH = 4;

    protected $pack_format = 'C*';
}