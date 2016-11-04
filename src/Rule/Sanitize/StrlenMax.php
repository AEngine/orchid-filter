<?php

namespace AEngine\Orchid\Filter\Rule\Sanitize;

use Closure;

class StrlenMax
{
    /**
     * Sanitizes a string to a maximum length by chopping it at the right
     *
     * @param int $max maximum length.
     *
     * @return Closure
     */
    public function __invoke($max)
    {
        return function (&$field) use ($max) {
            if (!is_scalar($field)) {
                return false;
            }
            if (mb_strlen($field) > $max) {
                $field = mb_substr($field, 0, $max);
            }

            return true;
        };
    }
}
