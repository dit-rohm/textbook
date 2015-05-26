function result () {
  // 各回答をanswer配列に格納
  var total = document.shindan.length;
  var answer = [];
  var j = 0;
  for (var i = 0; i < total; i++) {
    if (document.shindan.elements[i].checked) {
      answer[j] = document.shindan.elements[i].value;
      j++;
    }
  }

  // それぞれ数える
  var cnt = [ ['king', 0], ['officer', 0], ['scholar', 0], ['craftsman', 0] ];
  for (var i = 0; i < answer.length; i++) {
    switch(answer[i]){
      case 'king':
        cnt[0][1]++;
        break;
      case 'officer':
        cnt[1][1]++;
        break;
      case 'scholar':
        cnt[2][1]++;
        break;
      case 'craftsman':
        cnt[3][1]++;
        break;
      default:
        alert('error!!');
        break;
    }
  }

  // cnt配列を降順にソート
  cnt.sort(function(a, b){return(b[1] - a[1]);});

  // タイプ判定 カウント数が同じものがある場合はランダムに
  var type = cnt[0][0];
  if(cnt[0][1] == cnt[1][1]) {
    type = cnt[Math.floor(Math.random() * 2)][0];
  }

  // タイプごとにページを移動させる
  switch(type){
    case 'king':
      location.href = './king.html';
      break;
    case 'officer':
      location.href = './officer.html';
      break;
    case 'scholar':
      location.href = './scholar.html';
      break;
    case 'craftsman':
      location.href = './craftsman.html';
      break;
    default:
      alert('error!!');
      break;
  }
}
