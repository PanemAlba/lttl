<?ob_start();
include_once "sqlheader.php";
include_once "functions.php";
$l=$_GET['l'];
if(findLink('lttl_link', $l)){
    $u_link="http://".findLink('lttl_link', $l)['original_link'];
}else{
    $u_link="http://".$_SERVER['HTTP_HOST'].'/';
}
header('Location: '.$u_link);
ob_end_flush();
exit();