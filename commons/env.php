<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
define('PATH_CONTROLLER',  __DIR__.'/../controllers/');
define('PATH_MODEL',       __DIR__.'/../models/');
define('PATH_VIEW',        __DIR__.'/../views/');


define('PATH_CONTROLLER_ADMIN',  __DIR__.'/../admin/controllers/');
define('PATH_MODEL_ADMIN',  __DIR__.'/../admin/models');

define('PATH_VIEW_ADMIN',        __DIR__.'/../admin/views/');


define('PATH_UPLOAD',        __DIR__.'/../');





define('BASE_URL'       , 'http://localhost/da1_nhom2/');

// dường dẫn vào phần admin
define('BASE_URL_ADMIN'       , 'http://localhost/da1_nhom2/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'bd_shop_tshirt_da_1');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
