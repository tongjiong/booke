// 图片查看
layer.photos({
  photos: '.layer-photos-demo'
  ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
}); 

//载入弹窗
// layui.use('element', function(){
  var element = layui.element;
  $(".btn_starts").click(function(){
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
