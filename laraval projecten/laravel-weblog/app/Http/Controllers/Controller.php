<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function makeBlurb(string $text, int $maxWords = 8)
        {
            $text = preg_replace('/\s+/', ' ', trim($text));
            $words = preg_split('/\s+/', $text);

            if (count($words) <= $maxWords) {
                return $text;
            }
            $blurb = implode(' ', array_slice($words, 0, $maxWords));

            return $blurb . '...';
        }
}
