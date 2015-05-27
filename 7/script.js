var type = {
  king: 0, officer: 0, scholar: 0, craftsman: 0
}

function result () {
  var answer = checkAnswer();

  countType(answer);

  var max = getMax(answer);

  var result = getResult(max)

  showResult(result);
}

function checkAnswer() {
  // 各回答をreturnAnswer配列に格納
  var total = document.shindan.length;
  var returnAnswer = [];
  var j = 0;
  for (var i = 0; i < total; i++) {
    if (document.shindan.elements[i].checked) {
      returnAnswer.push(document.shindan.elements[i].value);
    }
  }

  return returnAnswer;
}

function countType(answer) {
  // それぞれ数える
  for (var i = 0; i < answer.length; i++) {
    switch(answer[i]){
      case 'king':
        type.king++;
        break;
      case 'officer':
        type.officer++;
        break;
      case 'scholar':
        type.scholar++;
        break;
      case 'craftsman':
        type.craftsman++;
        break;
      default:
        alert('error!!');
        break;
    }
  }
}

function getMax(answer) {
  /*
   * 回答数が多いプロパティのキーを取りたい
   * 最大回答数の5から降ろしていく
   */
  for (var i = answer.length; i > 0; i--) {
    var returnMax = getKey(i);
    if (returnMax.length > 0) break;
  }
  alert(returnMax);
  return returnMax;
}

// 一致するバリューがあればキーを配列で返す
function　getKey(value) {
    var returnKey = [];
    for (var key in type) {
        if (type[key] == value) {
            returnKey.push(key);
        }
    }
    return returnKey;
}

function getResult(max) {
  if (max.length == 1) {
    var returnResult = max[0];
  } else {
    returnResult = max[Math.floor(Math.random() * max.length)];
  }

  return returnResult;
}

function showResult(result) {
  // タイプごとにページを移動させる
  switch(result){
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
