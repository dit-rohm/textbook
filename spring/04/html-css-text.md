# HTMLとCSSでDITのようなWebサイトを作ってみよう（解答）

[HTMLとCSSでDITのようなWebサイトを作ってみよう](./html-css.md)の解答です。

ここでは、課題で作成する「DITのようなサイト」のソースコードの一例を載せています。

この書き方だけが正解ではありませんが、一例として参考にしてみてください！


### index.html

```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>DIT</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- header部分 -->
  <div class="header">
    <!-- nav部分 -->
    <div class="nav">
      <div class="inner">
        <h1>DIT</h1>
        <ul>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#mentor">MENTOR</a></li>
          <li><a href="#question">QUESTION</a></li>
        </ul>
      </div>
    </div>
    <h2>同志社から新たなエンジニアを</h2>
  </div>
  <!-- mentor部分 -->
  <div id="mentor">
    <div class="inner">
      <h2>メンター</h2>
      <div class="mentor-item"><img src="./img/mentor.png"></div>
      <div class="mentor-item"><img src="./img/mentor.png"></div>
      <div class="mentor-item"><img src="./img/mentor.png"></div>
      <div class="mentor-item"><img src="./img/mentor.png"></div>
      <div class="mentor-item"><img src="./img/mentor.png"></div>
      <div class="mentor-item"><img src="./img/mentor.png"></div>
    </div>
  </div>
  <!-- about部分 -->
  <div id="about">
    <div class="inner">
      <h2>DIT</h2>
      <p>
        DIT（Doshisha Institute of Technology）は、同志社生の技術力向上を目指し、勉強会を開催するプロジェクトです。
        週に1度、演習形式の勉強会を開催し、Web技術の習得を目指します。また、夏にはハッカソンの開催も予定しています。
      </p>
    </div>
  </div>
  <!-- question部分 -->
  <div id="question">
    <div class="inner">
      <h2>よくある質問</h2>
      <div class="question-item">
        <h3>参加費用はかかりますか？</h3>
        <p>いいえ。無料でご参加いただけます。</p>
        <h3>初心者なのでついていけるか心配です</h3>
        <p>基礎から教えるので経験がなくても大丈夫です。</p>
      </div>
      <div class="question-item">
        <h3>ノートパソコンを持っていません</h3>
        <p>貸出用のPCを用意しているのでなくても大丈夫です。</p>
        <h3>何ができるようになりますか</h3>
        <p>1年間でWebサイトの構築が一人でできるようになります。</p>
      </div>
    </div>
  </div>
  <!-- footer部分 -->
  <div class="footer">
    <div class="inner">
      <div class="footer-item">
        <h3>LOCATION</h3>
        <p>同志社ローム記念館2F RM215</p>
      </div>
      <div class="footer-item">
        <h3>COMMUNITY</h3>
        <a href="#">Blog</a>
        <a href="#">News</a>
      </div>
      <div class="footer-item">
        <h3>CONTACT</h3>
        <a href="#">Web</a>
        <a href="#">Twitter</a>
      </div>
    </div>
    <small class="copyright">&copy; 2015 DIT.</small>
  </div>
</body>
</html>
```

### style.css

```css
/* 全てのmargin, paddingを0に */
* {
  margin: 0;
  padding: 0;
}

h2, h3, p {
  margin: 10px;
  text-align: center; /* 中央揃え */
}

.inner {
  margin: 0 auto; /* 中央揃え */
  padding: 20px 50px;
}

/* 以下header部分 */

.header {
  position: relative; /* 相対位置への配置 */
  width: 100vw; /* 横幅をビューポートと同じ幅に*/
  height: 100vh; /* 縦幅をビューポートと同じ幅に*/
  background-color: #18BC9C;
}

.header h2 {
  position: absolute; /* 絶対位置への配置 */
  top: 50%; /* 上からの配置位置を指定 */
  width: 100%;
  color: #fff;
  font-size: 50px;
}

/* 以下nav部分 */

.nav {
  position: fixed; /* 固定する */
  width: 100vw; /* 横幅をビューポートと同じ幅に*/
  height: 90px;
  background-color: #2C3E50;
  z-index: 1; /* 重なりの順序を他の要素より上になるよう指定 */
}

.nav h1 {
  color: #fff;
  float: left;
}

.nav ul {
  float: right; /* 右詰め */
}

.nav li {
  margin: 10px;
  float: left; /* 左詰め */
  list-style: none; /* リストのマーカーをなくす */
}

.nav a {
  color: #fff;
  text-decoration: none; /* テキストの飾りをなくす */
}

/* 以下mentor部分 */

#mentor {
  margin: 0 auto;
  height: 730px;
}

#mentor h2 {
  color: #2C3E50;
}

.mentor-item img {
  width: 33%;
  height: 300px;
  float: left; /* 左詰め */
}

/* 以下about部分 */

#about {
  height: 280px;
  background-color: #18BC9C;
}

#about h2,
#about p {
  color: #fff;
  text-align: center; /* 中央揃え */
}

#about > .inner {
  padding: 65px 320px;
}

/* 以下question部分 */

#question {
  height: 330px;
}

.question-item {
  width: 50%;
  float: left; /* 左詰め */
}

.question-item h2,
.question-item h3,
.question-item p {
  color: #2C3E50;
  text-align: center; /* 中央揃え */
}

.question-item p {
  margin-bottom: 40px;
}

/* 以下footer部分 */

.footer {
  background-color: #2C3E50;
}

.footer-item {
  margin-bottom: 20px;
  width: 33%;
  float: left; /* 左詰め */
  text-align: center; /* 中央揃え */
}

.footer-item  h3,
.footer-item  p,
.footer-item  a  {
  color: #fff;
}

.copyright {
  display: block; /* ブロックレベルで表示 */
  padding: 20px;
  background-color: #233140;
  color: #fff;
  clear: both; /* 回り込みを無効化 */
  text-align: center; /* 中央揃え */
}
```

 
[前へ HTML, CSSの総まとめ（解答）](../04/html-css-text.md)
 
[次へ JavaScript 入門](../05/js.md)
