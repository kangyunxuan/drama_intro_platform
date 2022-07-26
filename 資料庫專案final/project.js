document.querySelector('taiwan').onclick = function() {
    alert('Ouch! Stop poking me!');
}
$(function(){
    $('#sc').click(function(){

        var gid=$(this).attr('data-id');
        var data={
          gid:gid
        };
        $.ajax({
          url:"{:U('Goods/collect_add')}", 
          type:"post",
          data:data,
          success:function(data){
            // window.clearInterval(timer);
                          if(data==1){
                              window.location.href="{:U('Public/login')}"; //登陆界面
                          }else {
                              if(data==2){
                                  $('#sc').css({
                                      'background-color':'white',
                                      'color':'#00ccff',
                                  });
                                  $('#sc_words').html(
                                      '收藏'
                                  );
                              }else if(data==3){
                                  $('#sc').css({
                                      'background-color':'#00ccff',
                                      'color':'white',
                                  });
                                  $('#sc_words').html(
                                      '已收藏'
                                  );
                              }else{
                                  alert(data);
                              }
                          }
          },
          error:function(){
            alert('请求失败');
          }
        });
    });
  })