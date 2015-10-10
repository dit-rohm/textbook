# 事前準備

[ditter.zip](./ditter.zip?raw=true)から、ditterのテンプレートをダウンロードして下さい。展開し、`ditter`というディレクトリをまるまる、Macなら`/Applications/XAMPP/htdocs`配下に、Windowsなら`C:¥xampp¥htdocs`配下に置いて下さい。今後はこの中で作業していきます。

<a href="http://localhost/ditter/index.php" target="_blank">http://localhost/ditter/index.php</a>にアクセスし、`Hello World`が見れたらOKです。

ditterの中は以下のようになっています。

```
.
├── config.php      # 設定を保管しておくためのファイル
├── functions.php   # 関数を書いておくためのファイル
├── index.php       # トップページに関するファイル
├── reply.php       # リプライ画面に関するファイル
├── signin.php      # サインイン画面に関するファイル
├── signout.php     # サインアウト画面に関するファイル
└── signup.php      # 新規登録画面に関するファイル
```

それぞれのファイルには最低限のコードが既に書かれていますので、追記していく形で進めて行きましょう！
