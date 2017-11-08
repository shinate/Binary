<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午8:22
 */

namespace Codante\Binary;


class Builder
{
    use ConstructionConverter;

    private $CONST = [];

    private $DATA = [];

    private $DATA_BUILDED = [];

    private $STREAM;

    public function __construct($construction = [], $data = null) {
        $this->CONST = $construction;
        $this->construction_convert_recursive($this->CONST);
        $this->STREAM = Binary::Stream();
        if ($data) {
            $this->build($data);
        }
    }

    public function build($data) {
        $this->DATA_BUILDED = $this->DATA = $data ?? [];
        $this->field($this->CONST, $this->DATA_BUILDED);

        return $this->stream();
    }

    public function field($field, &$data) {
        $field->build($this, $data);
    }

    public function stream() {
        return $this->STREAM;
    }
}