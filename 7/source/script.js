var type = {
  king: 0,
  officer: 0,
  scholar: 0,
  craftsman: 0
};

function result() {
  var answer = checkAnswer();

  countType(answer);

  var max = getMax(answer);

  var result = getResult(max);

  showResult(result);
}

function checkAnswer() {
  // 各回答をreturnAnswer配列に格納
  var total = 5;
  alert(total);
  var returnAnswer = [];
  for (var i = 0; i < total; i++) {
    var value = document.shindan.elements['q' + i].value;
    returnAnswer.push(value);
  }

  return returnAnswer;
}

function countType(answer) {
  // それぞれ数える
  for (var i = 0; i < answer.length; i++) {
    if (answer[i] == 'king') {
      type.king++;
    } else if (answer[i] == 'officer') {
      type.officer++;
    } else if (answer[i] == 'scholar') {
      type.scholar++;
    } else if (answer[i] == 'craftsman') {
      type.craftsman++;
    } else {
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

  return returnMax;
}

// 一致するバリューがあればキーを配列で返す
function getKey(value) {
  var returnKey = [];
  for (var key in type) {
    if (type.hasOwnProperty(key) && type[key] == value) {
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
  if (result == 'king') {
    location.href = './king.html';
  } else if (result == 'officer') {
    location.href = './officer.html';
  } else if (result == 'scholar') {
    location.href = './scholar.html';
  } else if (result == 'craftsman') {
    location.href = './craftsman.html';
  } else {
    alert('error');
  }
}
