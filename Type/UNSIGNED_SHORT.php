<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;

use Codante\Binary\Processor\NUMBIC;
use Codante\Binary\Processor\ProcessorInterface;

class UNSIGNED_SHORT extends TypePrototype implements ProcessorInterface
{
    use NUMBIC;

    protected $LENGTH = 2;

    protected $PACK_FORMAT = 'S';
}