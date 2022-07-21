<? include_once "sqlheader.php";
   include_once "functions.php";

$u_link = trim($_GET['data']);
//удаление http/https и www из ссылок, для преобразвания в единый вид.
preg_match('#^(?:https://|http://)*(?:www.)?([a-zA-Z0-9-\Q/.%?=&_-*:\E]+)#', $u_link, $u_link);
$u_link = $u_link[1];
$data['original_link']=$u_link;
//проверка на ссылку
if(stripos($u_link, '.') && !strpbrk($u_link, ' @')){
    $data['success']=1;
    //проверка на наличия ссылки в существующей базе
    $t = findLink('original_link', $u_link);
    if(!$t){
         $data['msg']="net takoi";
         $i=1;
        //создание уникального кода и проверка на наличие его в существующей базе
        while ($i>=1){
            $lttl_link = bin2hex(random_bytes(3));
            if(!findLink('lttl_link', $lttl_link)){
                $i=0;
            }else{
                $i++;
            }
            //если 20 попыток создания уникального ключа не получились, закрыть цикл для предотвращения бесконечной загрузки.
            if($i>20){
                $data['success']=0;
                break;
            }
        }
        if($data['success']==1){
            $data['lttl_link']=$_SERVER['HTTP_HOST'].'/'.$lttl_link;
            addLink($lttl_link, $u_link);
            if($_COOKIE['user_link']){
                $user_link_cookie=unserialize($_COOKIE['user_link'], ["allowed_classes" => false]);
                $lttl_link_cookie=unserialize($_COOKIE['lttl_link'], ["allowed_classes" => false]);
                $lttl_link_cookie[]=$lttl_link;
                $user_link_cookie[]=$u_link;
            }else{
                $lttl_link_cookie[]=$lttl_link;
                $user_link_cookie[]=$u_link;
            }
            setcookie('user_link', serialize($user_link_cookie));
            setcookie('lttl_link', serialize($lttl_link_cookie));
        }
    }else{ $data['msg']="esti"; $data['lttl_link']=$_SERVER['HTTP_HOST'].'/'.$t['lttl_link']; }
}else{
    $data['success']=0;
}
echo json_encode($data);