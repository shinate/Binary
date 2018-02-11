<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;

use Codante\Binary\Processor\CHAR;
use Codante\Binary\Processor\ProcessorInterface;

class UNSIGNED_CHAR extends TypePrototype implements ProcessorInterface
{
    use CHAR;

    protected $LENGTH = 1;

    protected $PACK_FORMAT = 'C*';
}