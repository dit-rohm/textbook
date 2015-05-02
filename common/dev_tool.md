# デベロッパーツール
最近のモダンブラウザにはウェブ開発を支援する機能が実装されています．  
テキストエディタとにらめっこするのもいいのですが，視覚的に編集しててみるのはどうでしょうか．

## 使い道
本稿ではデベロッパーツールの使い道の一部に触れる程度にとどまっています．  
詳しい使い方を知りたい方は，[みんなのGoogle先生](https://www.google.co.jp/search?q=デベロッパーツール)に聞いてみましょう．

### HTML: HTMLをリアルタイムに編集する
HTMLをリアルタイムに編集することが出来ます．
![](images/dev_tool/html_edit.gif)

### HTML: ノードツリーからノードを削除する
HTML文書はブラウザの内部においてツリー構造で表現される．．．という話はさておき，編集することが出来れば削除することも出来ます．
![](images/dev_tool/html_delete.gif)

### CSS: カラーピッカーを使用して色を変更する
「あの色の名前がわからない」「思っている色と微妙に違う」．．．こんなことでお悩みではありませんか?  
カラーピッカーを使えば問題を解決してくれるでしょう．
![](images/dev_tool/css_color.gif)

### CSS: プロパティの追加と有効化・無効化
HTMLをリアルタイムに編集することが出来るならCSSも編集することが出来ます．  
プロパティを追加したり，有効化・無効化を切り替えたりすることが出来ます．
![](images/dev_tool/css_add_switch.gif)

### CSS: プロパティの削除
「誤ってプロパティを追加してしまった」．．．御安心ください，削除することも出来ます．
![](images/dev_tool/css_delete.gif)

### CSS: ボックスモデルの確認
「padding？margin？」「サイズがおかしい」．．．そんな貴方にはボックスモデル．  
要素のサイズやマージン等を視覚的に確認することが出来ます．
![](images/dev_tool/css_padding.gif)

### HTML/CSS: 編集結果の保存
もちろん保存することも出来ます．
![](images/dev_tool/css_save.gif)

## Google Chrome
Google Chromeの設定→その他のツール→デベロッパー ツール（⌥⌘i）
![](images/dev_tool/chrome.png)

## Mozilla Firefox
ツール→Web 開発→開発ツールを表示（⌥⌘i）
![](images/dev_tool/firefox.png)

## Safari
デフォルトではメニューバーに”開発”メニューが表示されません．  
表示されるように設定を変更しましょう．  
Safari→環境設定（⌘,）→メニューバーに”開発”メニューを表示
![](images/dev_tool/safari_setting.png)
開発→Web インスペクタを表示（⌥⌘i）
![](images/dev_tool/safari.png)

## Internet Explorer
ツール→F12 開発者ツール