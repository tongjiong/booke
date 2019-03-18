// 消失按钮
$(".image_btn").click(function(){
    $("#image_src_banner").hide();
})

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
