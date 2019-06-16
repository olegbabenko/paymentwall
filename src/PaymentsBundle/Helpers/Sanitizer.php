<?php

namespace PaymentsBundle\Helpers;

/**
 * Trait Sanitizer
 *
 * @package PaymentsBundle\Helpers
 */
trait Sanitizer
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function sanitize(string $string): string
    {
        return preg_replace('/\s+/', '', htmlspecialchars(trim($string)));
    }
}
