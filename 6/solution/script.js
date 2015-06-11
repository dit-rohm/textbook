var qa = [
  ['「テトリス（ゲーム）」を開発したのは、日本人だ。', 2],
  ['生きている間は、有名な人であっても広辞苑に載ることはない。 ', 1],
  ['現在、2000円札は製造を停止している。', 1],
  ['パトカーは、取り締まっている最中であれば、どこでも駐車違反になることはない。', 2],
  ['昆虫の中には、口で呼吸する昆虫もいる。 ', 2],
  ['一般的に体の水分は、男性より女性のほうが多く含まれている。', 2],
  ['たとえ１ｃｍの高さであっても、地震によって起こるのは全て「津波」である。', 1],
  ['1円玉の直径は、ちょうど１ｃｍになっている。', 2],
  ['塩はカロリー０である。 ', 1],
  ['「小中学校は、PTAを作らなければならない」と法律で定められている。', 2]
];

var count = 0;
var correctNum = 0;

window.onload = function() {
  // 最初の問題を表示
  var question = document.getElementById('question');
  question.innerHTML = (count + 1) + '問目：' + qa[count][0];
};

// クリック時の答え判定
function hantei(btnNo) {
  if (btnNo == 1) {
    if (qa[count][1] == 1) {
      correctNum++;
    }
  } else {
    if (qa[count][1] == 2) {
      correctNum++;
    }
  }

  if (count == 9) {
    alert('あなたの正解数は' + correctNum + '問です！');
  }

  // 次の問題表示
  count++;
  var question = document.getElementById('question');
  question.innerHTML = (count + 1) + '問目：' + qa[count][0];
}

