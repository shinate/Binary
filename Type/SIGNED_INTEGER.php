<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;

class SIGNED_INTEGER extends Prototype
{
    use NumbicTrait;

    protected $LENGTH = 4;

    protected $PACK_FORMAT = 'i';
}