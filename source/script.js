var qa = [ 
  ["「テトリス（ゲーム）」を開発したのは、日本人だ。", 2],
  ["生きている間は、有名な人であっても広辞苑に載ることはない。 ", 1],
  ["現在、2000円札は製造を停止している。", 1],
  ["パトカーは、取り締まっている最中であれば、どこでも駐車違反になることはない。", 2],
  ["昆虫の中には、口で呼吸する昆虫もいる。 ", 2],
  ["一般的に体の水分は、男性より女性のほうが多く含まれている。", 2],
  ["たとえ１ｃｍの高さであっても、地震によって起こるのは全て「津波」である。", 1],
  ["1円玉の直径は、ちょうど１ｃｍになっている。", 2],
  ["塩はカロリー０である。 ", 1],
  ["「小中学校は、PTAを作らなければならない」と法律で定められている。", 2]
];

var count = 0;
var correctnum = 0;

window.onload = function() {
  setReady();
};

//初期設定
function setReady(){
  //最初の問題
  document.getElementById("problem").innerHTML = (count + 1) + "問目：" + qa[count][0];
}

//問題表示
function quiz() {
  count++;
  document.getElementById("problem").innerHTML = (count + 1) + "問目：" + qa[count][0];
}

//クリック時の答え判定
function seikai(btnNo){
  if (btnNo == 1){
    if(qa[count][1] == 1){
      correctnum++;
    } 
  }else{
    if(qa[count][1] == 2){
      correctnum++;
    } 
  }
  if(count < 9){
    quiz();
  }else{
    end();
  }
}

//終了判定
function end(){
  document.getElementById("problem").innerHTML ="正解は" + correctnum + "問です";   
  changeVisibility();
}

//ボタンを見えなくする
function changeVisibility(){
  var sl = document.getElementsByClassName("button");
  for (var i = 0; i < sl.length; i++) {
    sl[i].style.visibility = "hidden";
  }
}
