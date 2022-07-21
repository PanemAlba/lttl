<?define('DB_HOST','localhost');
define('DB_LOGIN','root');
define('DB_PASSWORD','root');
define('DB_NAME','lttl');
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die("Ошибка загрузки базы данных. Пожалуйста, перезагрузите страницу.");
mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($link, "SET CHARACTER SET 'utf8'");