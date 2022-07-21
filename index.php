<?include_once "sqlheader.php";
include_once "functions.php";
if($_COOKIE['user_link']){$showLinkCookieU = array_reverse(unserialize($_COOKIE['user_link'], ["allowed_classes" => false]));}
if($_COOKIE['lttl_link']){$showLinkCookie = array_reverse(unserialize($_COOKIE['lttl_link'], ["allowed_classes" => false]));}
$showAllLink = showAllLink();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сокращение ссылок</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="tbpdg20">
        <div class="logoName">LTTL</div>
        <div class="logoDesc">сокращение ссылок</div>
    </header>
    <section class="tbpdg20">
        <div class="tac">
            <div>
                <div class="bpdg5">Введите ссылку</div>
                <input type="text" placeholder="Например, http://lttl.ru/" class="user_link" name="u_link">
            </div>
        </div>
        <div class="tac tpdg5">
            <div class="user_info"></div>
        </div>
        <div class="tac tbpdg20">
            <div class="hover">
                <div class="btnlttl tac" id="lttl_btn">СОКРАТИТЬ</div>
            </div>
        </div>
        <div class="tac">
            <div>
                <div class="bpdg5">Скопируйте результат</div>
                <input type="text" name="lttl_link" readonly>
            </div>
        </div>
        <div class="tac tpdg5">
            <div class="lttl_info"></div>
        </div>
    </section>
    <hr class="">
    <section class="tbpdg20">
        <div>
            <div class="tac">
                <div>История на этом устройстве</div>
            </div>
            <div class="pdg10 w100 tac">
                <table class="tableuserlink">
                    <tr class="tableheader">
                        <th>Сокращенные ссылки</th>
                        <th>Исходные ссылки</th>
                    </tr>
                    <?if($showLinkCookie){foreach($showLinkCookieU as $i => $itemlink){?>
                    <tr>
                        <td><?=$_SERVER['HTTP_HOST']?>/<?=$showLinkCookie[$i]?></td>
                        <td><a href="http://<?=$itemlink?>" target="_blank"><?if(mb_strwidth($itemlink)>=40){ echo mb_strimwidth($itemlink, 0, 40)."...";}else{echo $itemlink;}?></a></td>
                    </tr>
                    <?}}?>
                </table>
            </div>
        </div>
    </section>
<!--
    <section class="tbpdg20">
        <div>
            <div class="tac">
                <div>Вся история</div>
            </div>
            <div class="pdg10 w100 tac">
                <table>
                    <tr>
                        <th>Сокращенные ссылки</th>
                        <th>Исходные ссылки</th>
                    </tr>
                    <?foreach($showAllLink as $itemlink){?>
                    <tr>
                        <td><?=$_SERVER['HTTP_HOST']?>/<?=$itemlink['lttl_link']?></td>
                        <td><a href="<?=$itemlink['original_link']?>" target="_blank"><?if(mb_strwidth($itemlink['original_link'])>=40){ echo mb_strimwidth($itemlink['original_link'], 0, 40)."...";}else{echo $itemlink['original_link'];}?></a></td>
                    </tr>
                    <?}?>
                </table>
            </div>
        </div>
    </section>
-->
    
    <script src="inc/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
