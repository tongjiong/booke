layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  //触发事件
  var active = {
    tabAdd: function(){
      var urll = $(this).data("url");
      var textt = $(this).text();
      //新增一个Tab项  
      var exist=$("li[lay-id='"+urll+"']").length; //判断是否存在tab
        if(exist==0){
          element.tabAdd('test', {
            title: textt //用于演示
            ,content: '<iframe class="Mainindex" name="Mainindex" src="'+urll+'" width="100%" height="900px" frameborder="0"></iframe>'
            ,id: urll //实际使用一般是规定好的id，这里以时间戳模拟下
          }) 
      }     
      element.tabChange('test',urll);
    }
  };
  
  // 点击添加Tab项 
  $('.site-demo-active').on('click', function(){
    var othis = $(this), type = othis.data('type');
    active[type] ? active[type].call(this, othis) : '';
  });
  
  //Hash地址的定位
  var layid = location.hash.replace(/^#/, '');
  element.tabChange('test', layid);
  
  element.on('tab(test)', function(elem){
    window.location.hash = $(this).attr('lay-id');
  });

  //iframe
  document.onkeydown = function (e) {
    //键盘按键控制        
    e = e || window.event;
    if (e.keyCode == 116) {
    var iframe = $('body');
    var src = iframe.attr('src');
    e.preventDefault(); 
    var iframeSrc = src;
    iframe.attr('src',iframeSrc);        
    }    
  }
  document.onkeydown = function (e) {
    e = e || window.event;
    if (e.keyCode == 116) {
      var iframe = $('.Mainindex', parent.document);
      var iframeSrc = iframe[0].src;
      // console.log(iframe[0])
      e.preventDefault();
      iframe[0].src = iframeSrc;return false;
    }
  }
  document.oncontextmenu = function(){
    return false;
  }

});