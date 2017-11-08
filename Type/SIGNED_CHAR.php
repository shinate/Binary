<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;


class SIGNED_CHAR extends Prototype implements MethodsInterface
{
    use CharTrait;

    protected $LENGTH = 1;

    protected $PACK_FORMAT = 'c*';
}