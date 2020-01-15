<?php

function remove_foreign_uri($string)
{
    //Регулярное выражение опробовано на следующих примерах:
    define('URL_FORMAT_PATTERN1', '/(?:(?:(?:(?:https?|ftp|file){1}.?:?\/{0,2})|(?:www.))\S*)/i');
    /*      www.google.com
            http://www.google.com
            http://www.google.co.uk/projects/my%20folder/test.php
            https://myserver.localdomain
            http://192.168.1.120/projects/index.php
            http://192.168.1.1/projects/index.php
            http://projectpier-server.localdomain/projects/public/assets/javascript/widgets/UserBoxMenu/widget.css
            https://2.4.168.19/project-pier?c=test&a=b
            https://localhost/a/b/c/test.php?c=controller&arg1=20&arg2=20
            http://user:password@localhost/a/b/c/test.php?c=controller&arg1=20&arg2=20
            hfhjhf gf gjfjf hjgfgjfg fghfgdhd  http:// : gfdhd fh
            http/localhost
            http :// fdfh fh dgd ftwertwet wrwe tew twer
    */

    define('URL_FORMAT_PATTERN2', '/(?:[^.]*\.(?=[^ ]*)[^\/?# ]*(?=[\/?#])(?:[\/?#]+[^ ]*| ))/i');
    /*      google.comd/
    */

    $result = preg_replace_callback(
        [
            URL_FORMAT_PATTERN1,
            URL_FORMAT_PATTERN2,
        ],
        function ($matches) {
            $app_url_host = parse_url(env('APP_URL'), PHP_URL_HOST);

            $good_needles = [$app_url_host];
            $bad_needles = ['://', ':/'];
            $haystack = $matches[0];

            foreach ($good_needles as $needle) {
                if (strpos($haystack, $needle)) {
                    foreach ($bad_needles as $bad_needle)
                        if (substr_count($haystack, $bad_needle) > 1) {
                            return '';
                        }
                    return $haystack;
                }
            }

            return '';
        },
        $string
    );

    return $result;
}