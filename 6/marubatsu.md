# まるばつクイズを作ろう

JavaScriptの授業第２回目です。
今回は前回のおみくじを利用してまるばつクイズを作ります。
前回よりもJavaScriptが難しくなりますが、がんばっていきましょう。

今回のまるばつクイズの仕様は以下のとおりです。

* 問題は10問
* まるかばつで答える
* 最後まで答えると正解数がでる

イメージは以下の図のような形です。デザインは時間があれば好きなようにCSSをいじってみましょう。

![Screenshot](images/1.png)


それではソースを見てみましょう。

## HTMLの基本仕様
`<head>`の部分の記述は覚えていますでしょうか。必要な記述事項としては

* 文字コード
* CSSファイルの読み込み
* タイトル

でしたね。わからなくなったら前回のテキストやリファレンスを参考にしてください。
それでは次は`<body>`の中身です。必要な`div`要素は以下のとおりです。これをもとに必要な文章を正しい場所に記述してください。

* `div class="wrapper"` : 全体を包むラッパークラス
* `div class = "problem"` : 問題を表示する部分
* `div class = "selection"` : まるとばつを表示する部分

ここで、JavaScriptに対応するボタンについて説明します。ボタンの書き方は以下のようにしてください。

```
<input type="button" class="button" value="○" onClick="seikai(1)">
<input type="button" class="button" value="×" onClick="seikai(2)">
```
`type`としてボタンを指定し、どちらも同じ仕様のボタンにしたいため`class`で命名しCSSのデザインを適用させます。`value`にはボタンの文字を書きます。`onClick`ではまるボタンを押したら1を引数として渡し、ばつボタンを押したら2を引数として渡すようにします。

最後に`body`内の終わりにJavaScriptを読み込む文章を追加を忘れないでください。


## CSSの基本仕様

htmlで指定した`div`要素をそれぞれ中央寄せにしたり幅を決めたりしましょう。ここは好きに
ボタンのデザインとマウスオーバーした時の動作は以下のようにしましょう。

```
.button{
  background-color: #EEE;
  border: 1px solid #DDD;
  border-radius: 8px;
  color: #111;
  width: 100px;
  height: 40px;
  margin: 10px;
  font-size: 20px;
  outline: none;
}
.button:hover{
  background-color: #a1d7e0;
  cursor: pointer;
}

```
* border-radius : 縁取りの丸み
* outline : ボタン選択の際の囲み
* cursor : カーソルの種類の指定

## JavaScriptの基本仕様
まず、問題と解答を保存する配列を作ります。今回は問題は10問でまるの場合1を、ばつの場合2にしておきます。

```
var qa = [ 
  ["「テトリス（ゲーム）」を開発したのは、日本人だ。", 2],
  ["生きている間は、有名な人であっても広辞苑に載ることはない。 ", 1],
  ["現在、2000円札は製造を停止している。", 1],
  ["パトカーは、取り締まっている最中であれば、どこでも駐車違反になることはない。", 2],
  ["昆虫の中には、口で呼吸する昆虫もいる。", 2],
  ["一般的に体の水分は、男性より女性のほうが多く含まれている。", 2],
  ["たとえ１ｃｍの高さであっても、地震によって起こるのは全て「津波」である。", 1],
  ["1円玉の直径は、ちょうど１ｃｍになっている。", 2],
  ["塩はカロリー０である。", 1],
  ["「小中学校は、PTAを作らなければならない」と法律で定められている。", 2]
];
```
次に今回使う変数を指定します。

* `var count = 0;`：今何問目にいるのかを保存する
* `var correctNum = 0;`：正解数を保存する

次はウィンドウを読み込んだ時の動作です。ウィンドウを読み込んだ時点で最初の問題が表示されるところまで書いていきます。
`document.getElementById("problem").innerHTML`でHTMLのidを拾ってきて、その内容を書き換える処理を書いています。

```
window.onload = function() {
  setReady();
};

//初期設定
function setReady(){
  //最初の問題
  document.getElementById("problem").innerHTML = (count + 1) + "問目：" + qa[count][0];
}
```

次の問題の表示とともにcountを増やします。

```
//問題表示
function quiz() {
  count++;
  document.getElementById("problem").innerHTML = (count + 1) + "問目：" + qa[count][0];
}

```
問題を変えるタイミングはボタンをクリックした時なので、クリックしたときにまるボタンだと1を引数として受け取り、配列に入っている変数と比較して同じの場合正解数correctNumを増やすという形になっています。

また、countが9になると10問目の終了となるので、クイズを終了させます。

```
//クリック時の答え判定
function seikai(btnNo){
  if (btnNo == 1){
    if(qa[count][1] == 1){
      correctNum++;
    } 
  }else{
    if(qa[count][1] == 2){
      correctNum++;
    } 
  }
  if(count < 9){
    quiz();
  }else{
    end();
  }
}

```
最後に終了画面として、正解数を表示するとともにボタンを見えなくします。

```
//終了判定
function end(){
  document.getElementById("problem").innerHTML ="正解は" + correctNum + "問です";   
  changeVisibility();
}

//ボタンを見えなくする
function changeVisibility(){
  var sl = document.getElementsByClassName("button");
  for (var i = 0; i < sl.length; i++) {
    sl[i].style.visibility = "hidden";
  }
}

```

