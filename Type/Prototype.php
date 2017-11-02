<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:51
 */

namespace Codante\Binary\Type;

use Codante\Binary\Binary;
use Codante\Binary\Parser;
use ReflectionClass;

class Prototype
{

    protected $LENGTH;

    protected $pack_format = null;

    protected $pack_filter = 0;

    protected $wrapper = null;

    public function __construct(int $length = null, int $pack_filter = 0, $wrapper = null) {
        if ($length > -1) {
            $this->LENGTH = $length;
        }
        $this->pack_filter = $pack_filter;
        if (!is_null($wrapper)) {
            $this->wrapper = $wrapper;
        }
    }

    public function parse(Parser &$parser) {
        $raw = $parser->stream()->read($this->LENGTH);

        switch ($this->pack_filter) {
            case Binary::RAW_FILTER_PACK:
                method_exists($this, 'unpack') && $raw = $this->unpack($raw);
                break;
            case Binary::RAW_FILTER_HEX:
                method_exists($this, 'hex') && $raw = $this->hex($raw);
                break;
        }

        if (!is_null($this->wrapper)) {
            if (is_callable($this->wrapper)) {
                $raw = call_user_func($this->wrapper, $raw);
            } elseif (class_exists($this->wrapper)) {
                $raw = (new ReflectionClass($this->wrapper))->newInstance($raw);
            }
        }

        return $raw;
    }
}