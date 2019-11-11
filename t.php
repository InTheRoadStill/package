<?php
require "./vendor/autoload.php";

echo (new intheroadstill\test())->hello();
echo (new intheroadstill\http())->get("http://192.168.4.220:801/test/");