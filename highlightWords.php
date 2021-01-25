<?php

//================================================================================================================
//                      This Function is For Highlight As Many As The Matched Result Words
//                                           Use this for searching
//================================================================================================================


        function highlight($text, $words) 
        {
            preg_match_all('~\w+~', $words, $m);
            if(!$m)
                return $text;
            //$re = '~\b(' . implode('|', $m[0]) . ')\b~'; //sensitive
            $re = '~\b(' . implode('|', $m[0]) . ')\b~i'; //in-sensitive
            return preg_replace($re, '<b><span style="background-color: #F9F902 !important;">$0</span></b>', $text);
        }

?>