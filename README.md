# INSTALL
```
composer require intheroadstill/test dev-master
```
## use example
`
<?php
        require "./vendor/autoload.php";
        echo (new intheroadstill\test())->hello();
        echo (new intheroadstill\wechat())->push();
`
