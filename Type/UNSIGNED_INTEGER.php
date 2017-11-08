<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;

class UNSIGNED_INTEGER extends Prototype implements MethodsInterface
{
    use NumbicTrait;

    protected $LENGTH = 4;

    protected $PACK_FORMAT = 'I';
}