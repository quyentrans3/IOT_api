<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Utility;

/**
 * Description of common
 *
 */
class Common {
    static public function convertToSlug($text, $lower = true)
    {
        $text = htmlspecialchars_decode($text, ENT_QUOTES);
        $text = trim($text, ' ');
        $text = preg_replace('/[^A-Za-z0-9\s]/', '-', $text);
        $text = preg_replace('/\s+/', '-', $text);
        $text = preg_replace('/-+/', '-', $text);
        $text = trim($text, '-');

        if (empty($text)) {
            return 'n-a';
        }

        // lowercase
        $text = $lower ? strtolower($text) : $text;

        return $text;
    }
}
