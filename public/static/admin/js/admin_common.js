//载入弹窗
layui.use('element', function(){
  var element = layui.element;
  $(".btn_right").click(function(){
      var datatitle = $(this).data("title");
      var datacontent = $(this).data("content");
      layer.open({
        type: 2,
        title: datatitle,
        shadeClose: true,
        shade: 0.8,
        area: ['700px','600px'],
        content: datacontent //iframe的url
      }); 
    }) 
});


//图片模型
layui.use('upload', function(){
  var upload = layui.upload;
  var uploadInst = upload.render({
    elem: '#upload_img', //绑定元素
    url: Uploadimg_model, //上传接口
    accept: 'images',
    exts: 'jpg|png|jpeg',
    acceptMime: 'image/*',
    size: 2048,
    number: 1, 
    method: 'post',
    before: function(data){
       layer.load(0, {shade: false});
    },
    done: function(data){
      if(data.code == 1){
          layer.close(layer.load());        
          layer.msg(data.msg);
          $("#image_hidden").val(data.img_oute);
          $(".image_src").attr('src',project+data.img_oute);
          $("#image_src_banner").show();
      }else{
        layer.msg(data.msg);
      }
    }
  });
});