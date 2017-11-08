<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:51
 */

namespace Codante\Binary\Type;

use Codante\Binary\Binary;
use Codante\Binary\Builder;
use Codante\Binary\Parser;
use ReflectionClass;

abstract class Prototype
{

    protected $LENGTH;

    protected $PACK_FORMAT = null;

    protected $FILTER = 0;

    protected $WRAP = null;

    public $OFFSET;

    public function __construct(int $length = null, int $pack_filter = 0, $wrapper = null) {
        if ($length > -1) {
            $this->LENGTH = $length;
        }
        $this->FILTER = $pack_filter;
        if (!is_null($wrapper)) {
            $this->WRAP = $wrapper;
        }
    }

    public function parse(Parser &$parser) {
        $raw = $parser->stream()->read($this->LENGTH);

        switch ($this->FILTER) {
            case Binary::RAW_FILTER_PACK:
                method_exists($this, 'unpack') && $raw = $this->unpack($raw);
                break;
            case Binary::RAW_FILTER_HEX:
                method_exists($this, 'dechex') && $raw = $this->dechex($raw);
                break;
        }

        if (!is_null($this->WRAP)) {
            if (is_callable($this->WRAP)) {
                $raw = call_user_func($this->WRAP, $raw);
            } elseif (class_exists($this->WRAP)) {
                $raw = (new ReflectionClass($this->WRAP))->newInstance($raw);
            }
        }

        return $raw;
    }

    public function build(Builder &$builder, &$data) {
        $raw = $data;
        switch ($this->FILTER) {
            case Binary::RAW_FILTER_PACK:
                method_exists($this, 'pack') && $raw = $this->pack($data);
                break;
            case Binary::RAW_FILTER_HEX:
                method_exists($this, 'hexdec') && $raw = $this->hexdec($data);
                break;
        }
        $data = $raw;
        $builder->stream()->write($raw);
    }

    public function length() {
        return $this->LENGTH;
    }

    public function byteLength() {
        return $this->LENGTH;
    }
}