
// 图片查看
layer.photos({
  photos: '.layer-photos-demo'
  ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
}); 
// });
// 表单模型
layui.use('form', function(){
    var form = layui.form;
  // //监听提交
 // form.on('submit(formDemo)', function(data){
 //     layer.msg(JSON.stringify(data.field));
 //   return false;
 //  }
    form.verify({
        // 图片验证
        image_hidden: function(value){ //value：表单的值、item：表单的DOM对象
            if(value == ''){
              return '请上传图片';
            }
        },
    });
});


//载入弹窗
// layui.use('element', function(){
  var element = layui.element;
  $(".btn_right").click(function(){
      var datatitle = $(this).data("title");
      var datacontent = $(this).data("content");
      var datawidth = $(this).data("width");
      var dataheight = $(this).data("height");
      layer.open({
        type: 2,
        title: datatitle,
        shadeClose: true,
        shade: 0.8,
        area: [datawidth,dataheight],
        content: datacontent //iframe的url
      }); 
    }) 
// });


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


