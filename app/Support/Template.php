<?php

namespace App\Support;

class Template
{
    /**
     * Replace placeholders like {brand}, {city}, {area}.
     *
     * @param  array<string, string>  $vars
     */
    public static function render(string $template, array $vars): string
    {
        $replacements = [];

        foreach ($vars as $key => $value) {
            $replacements['{'.$key.'}'] = $value;
        }

        return strtr($template, $replacements);
    }
}

