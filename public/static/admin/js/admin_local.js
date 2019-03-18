//iframe
  document.onkeydown = function (e) {
    //键盘按键控制        
    e = e || window.event;
    if (e.keyCode == 116) {
    var iframe = $('.Mainindex');
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
  // document.oncontextmenu = function(){
  //   return false;
  // }