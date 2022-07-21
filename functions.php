<?
function showAllLink(){
    global $link;
    $sql="SELECT id, lttl_link, original_link FROM sites ORDER BY id DESC";
    if(!$result=mysqli_query($link, $sql))
        return false;
    $items=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items;
}

function findLink($name, $u_link){
    global $link;
   $sql="SELECT id, lttl_link, original_link FROM sites WHERE ".$name."='".$u_link."'";
    if(!$result=mysqli_query($link, $sql))
        return false;
    $items=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items[0];
}

function addLink($lttl_link='', $original_link=''){
    global $link;
    $sql = 'INSERT INTO sites (lttl_link, original_link) VALUES (?, ?)';
    if (!$stmt = mysqli_prepare($link, $sql)){
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ss", $lttl_link, $original_link);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}