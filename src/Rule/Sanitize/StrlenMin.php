<?php

namespace AEngine\Orchid\Filter\Rule\Sanitize;

use AEngine\Orchid\Filter\Rule\AbstractStrlen;
use Closure;

class StrlenMin extends AbstractStrlen
{
    /**
     * Sanitizes a string to a minimum length by padding it
     *
     * @param int    $min       string length
     * @param string $padString Pad using this string
     * @param int    $padType   A `STR_PAD_*` constant
     *
     * @return Closure
     */
    public function __invoke($min, $padString = ' ', $padType = STR_PAD_RIGHT)
    {
        return function (&$field) use ($min, $padString, $padType) {
            if (!is_scalar($field)) {
                return false;
            }
            if (mb_strlen($field) < $min) {
                $field = $this->mb_str_pad($field, $min, $padString, $padType);;
            }

            return true;
        };
    }
}
