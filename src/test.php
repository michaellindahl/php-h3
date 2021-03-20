<?php

$h3API = new \H3();
$parent = $h3API->h3ToParent('8a2a1072b59ffff', 5);

echo "level 5: $parent is ".($parent == '852a1073fffffff').' via '.php_sapi_name();
