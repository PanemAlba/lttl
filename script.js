$(document).ready(function () {
    
    
    $('#lttl_btn').click(function(){
        var u_link = $("input[name=u_link]").val();
        console.log(u_link);
        $.get("generate.php", {data: u_link} , function (data){
        data = JSON.parse(data);
        console.log(data['success']);
        console.log(data['msg']);
        if(data['success']==1){
            $("input[name=lttl_link]").val(data['lttl_link']);
            $('.tableheader').after('<tr><td>'+data['lttl_link']+'</td><td><a href="http://'+data['original_link']+'" target="_blank">'+data['original_link']+'</td></tr>');
            $("input[name=u_link]").val('');
        }else{
            $(".user_info").html('Ошибка. Проверьте правильность ссылки.');
            setTimeout(function(){
                $(".user_info").html('');
            },1500);
        }
        
        });
    });
    
    $("input[name=lttl_link]").click(function(){
        var copyLink = $("input[name=lttl_link]");
        if(copyLink.val()){
            copyLink.select();
            document.execCommand("copy");
            $(".lttl_info").html('скопировано');
            setTimeout(function(){
                $(".lttl_info").html('');
            },1000);
        }
    });
});