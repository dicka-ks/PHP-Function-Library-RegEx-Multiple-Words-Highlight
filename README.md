# PHP-Function-Library-RegEx-Multiple-Words-Highlight
PHP Function Library RegEx Multiple Words Highlight

    //test highlight 1 (ini cuma highlight 1 kata aja)
        function highlightWords($text, $word)
        {
            $text = preg_replace('#'. preg_quote($word) .'#i', '<span style="background-color: #F9F902 !important;">\\0</span>', $text);
            return $text;
        }

    //test highlight 2 (ini bisa highlight banyak kata)
    $searchwords=@$_GET['search'];

        function highlight($text, $words) 
        {
            preg_match_all('~\w+~', $words, $m);
            if(!$m)
                return $text;
            //$re = '~\b(' . implode('|', $m[0]) . ')\b~'; //sensitive
            $re = '~\b(' . implode('|', $m[0]) . ')\b~i'; //in-sensitive
            return preg_replace($re, '<b><span style="background-color: #F9F902 !important;">$0</span></b>', $text);
        }


    /*explanation
        Apakah ini => preg_match_all('~\w+~', $words, $m);
        preg_match_all ( string $pattern , string $subject , array &$matches = null)
            1. '~\w+~'          \w  => to find a word character
                                \w+ => by doing global search, not only one word, can be as many as it can, at least one.
                                    inilah fungsi yang menjadikan 
                                    kita bisa menghighlight lebih dari satu kata

            2. $words           $words di sini diambil dari:
                                $words=$searchwords;
                                $searchwords=@$_GET['search'];
                                $words=@$_GET['search'];

            3. $m               $m ini adalah sebuah array, 
                                yang kita buat pada fungsi setelahya,
                                yakni fungsi implode
                                
        Apakah ini => $re = '~\b(' . implode('|', $m[0]) . ')\b~i';
        RegEx (Regular Expresion)
            1. $re              like regular expresion variable (regex), 
                                regex is for defining variable for what are you looking for
                                because it will be use in next function, 
                                such as:

                                regex -> cari apa, ini kayak Ctrl+F kalau di Excel
                                fungsi di bawah ini -> mau hasilnya gimana?
                                1.1 preg_match()        hasilnya dalam boolean, 1 jika ada yang sama, 0 jika tidak ada yang sama 
                                1.2 preg_match_all()    jumlah ada berapa yang sama, bisa 0, bisa lebih dari 0 jumlahnya 
                                1.3 preg_replace()      untuk me-replace hasil pencarian, return a new string where matched patterns have been replaced with another string
                                

            2. '   ...   '      for opening text in php //can use "
            3. ~   ...   ~      as the delimiter "~" //The delimiter can be any character that is not a letter, number, backslash or space
            4. \b  ...  \b      to find a word match between this tag
            5. ('. php  .')     () a.k.a parentheses is for grouping, '. .'  for inserting php
                                grouping dilakukan, karena di dalamnya kita mau buat looping dengan fungsi implode()

            6. implode()        php function, 
                    6.1 implode ('|', $m[0])
                    6.2 '|' digunakan sebagai delimiter, 
                        $m[0] => $m  di sini singkatan dari "match"    
                                [0] ini sebagai array key  
                        
                        e.g:
                        if there are 5 array 
                        $m = array('aero','tcp','target');
                        echo $m[0]; //hasilnya adalah "aero"
                        
                        implode('|', )

                        '|' ini bukan sembarang delimiter.
                        dalam regex tanda garis ke atas ini '|' 
                        digunakan untuk mencari adanya persamaan
    */
//end -> highlight function
