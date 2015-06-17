$( scroll );
$( button_listener );

function scroll() {

  /* スクロールするにつれてheaderを透明にしていく */
  $(document).scroll(function(){

    /* 画面最上部から何pxスクロールしたかを取得  */
    var pos = $(document).scrollTop();

    /* 画面の合計の高さを取得  */
    var window_height = $(window).height();

    /* 
     * ヘッダーの半透明度を、スクロール量に比例して決定。 
     * ヘッダーが完全に見えなくなったら完全に透明になるように 
     * する。
     */
    var alpha = 1 - pos/window_height;

    /* CSSで使える形に変換。文字列として渡す */
    var rgba = "rgba(24, 188, 156, " + alpha + ")"

    /* jQueryのcss関数でヘッダーのCSSの背景色をいじる。  */
    $("div.header").css("background-color", rgba);
  });
}

/* ページ内リンクを自動スクロール */
function button_listener() {
  $(".scroll_link").click(function(e){

    /* 標準のリンククリック時の動作を無効化 */
    e.preventDefault();

    /* リンクのhrefからスクロール先のidを取得 */
    var target = $(this).attr("href");
    
    /* スクロール先の要素の、上から何ピクセルかを取得 */
    var offset = $(target).offset().top;

    /* navbarの分の90ピクセルをスクロール量から引く */
    var scroll_distance = offset - 90;

    /* 実際のスクロール動作 */
    $("body, html").animate({
      scrollTop: scroll_distance
    }, 1000);
  });
}

