$(function() {
  // 使用ブラウザの取得 ie 8以降は trident
  if (window.navigator.userAgent.toLowerCase().indexOf("trident") != -1) {
    // headerに font-awesome CDN書き込み
    var FontawesomeScript = document.createElement('script');  
    FontawesomeScript.setAttribute('src','https://use.fontawesome.com/releases/v5.15.3/js/all.js');
    document.head.appendChild(FontawesomeScript);
    // DOMの生成・スタイル指定
    $text01 = $('<div>', { class: 'text-box', css: ({'margin-top': '30px', display: 'flex', 'justify-content': 'center' }),});
    $text01_1 = $('<span>', { text:'お使いの Internet Explorer では', css:({'font-weight': 'bold', color:'#888', 'letter-spacing':'.1rem', 'font-family': 'Yu Gothic' })});
    $text01_2 = $('<span>', { text:'正しく表示されない場合がございます。', css:({'margin-left':'3px', 'font-weight': 'bold', color:'#555', 'letter-spacing':'.1rem', 'font-family': 'Yu Gothic' })});
    $text02 = $('<p>', { text:'Microsoft Edge もしくは Google Chrome の使用を推奨します。', css:({'margin-top': '10px', 'font-weight': 'bold', color:'#888', 'letter-spacing':'.1rem', 'font-family': 'Yu Gothic' })});
    $cautionIe = $('<i>', { class :"fab fa-internet-explorer", css: ({'font-size': '60px', color: '#BBB'})});
    // $recommendEdge = $('<i>', { class :"fab fa-edge", css: ({'font-size': '60px', color: '#444', 'margin-left':'40px'})});
    // $recommendChrome = $('<i>', { class :"fab fa-chrome", css: ({'font-size': '60px', color: '#444', 'margin-left':'20px'})});
    // $iconArrow = $('<i>', { class :"fas fa-long-arrow-alt-right", css: ({'font-size': '60px', color: '#888', 'margin-left':'40px'})});
    $icons = $('<div>', {class: 'icons-box', css: ({display: 'flex', 'justify-content': 'center'}),});
    
    $btn = $('<button>', {css: ({
      position: 'absolute',
      top: '20px',
      right: '20px',
      'font-size': '20px',
      color: '#444',
      cursor: 'pointer',
      'background-color': 'transparent',
      border: 'none',
      cursor: 'pointer',
      outline: 'none',
      padding: '0',
      appearance: 'none',
    })}).append($('<i>', {class :"fas fa-times-circle"}));
    
    $alertBox = $('<div>', { 
      class:'alert-box',
      css:({
        // width:'500px',
        // height:'200px',
        padding: '60px 40px',
        'border-radius':"10px",
        position:'absolute',
        top: '50%',
        left: '50%', transform:
        'translate(-50%,-50%)',
        background: '#EEE',
      }) 
    });

    $alertBoxMain = $('<div>', { 
      class:'alert-box-main',
      css:({
        display: 'flex',
        'flex-direction': 'column',
        'justify-content': 'center',
        'max-width':'100%',
        'max-height':'100%',
        'text-align': 'center'
      })
    });

    $popupArea = $('<div>', { class:'overlay', css:({display:'none', width:'100%', height:'100%', background:'rgba(0,0,0,0.6)', position:'fixed', 'z-index':'1000000'}) });
    
    // DOMの結合
    $icons.append($cautionIe);
    $text01.append($text01_1).append($text01_2)
    $alertBoxMain.append($icons).append($text01).append($text02);
    $alertBox.append($btn).append($alertBoxMain);
    $popupArea.append($alertBox);

    // bodyタグの先頭にポップアップを配置
    $('body').prepend($popupArea);

    // 初回閲覧時のみ表示するスクリプト
    $(".overlay").show();
    Cookies.get('btnFlg') == 'on' ? $('.overlay').hide() : $('.overlay').show();
    $('.alert-box button').click(function(){
      $('.overlay').fadeOut();
      Cookies.set('btnFlg', 'on', { expires: 3,path: '/' }); //cookieの保存
    });
  }
});
