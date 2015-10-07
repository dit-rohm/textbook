# MySQLとは

MySQLは、世界で最も普及している関係データベース管理システム（RDBMS: Relational Database Management System）である。RDBMSにおいて、データの操作や定義を行うためのデータベース言語をSQLという。本稿では、MySQLにおけるSQLの文法について取り扱う。

# 基本構文

SQLは、キーワードと呼ばれる、予め定義された命令のための語句を組み合わせて構成する。このキーワードと、テーブル名・列名・データなどを組み合わせてSQL文が完成する。以下にSQL文の例を示す。

```
SELECT 〇〇 FROM △△ WHERE □□='hoge'; 
```

「SELECT」、「FROM」、「WHERE」がキーワードであり、「〇〇」、「△△」がそれぞれ列名とテーブル名になる。SQL文を構成する際の基本的な注意点は以下のとおりである。

1. 語句の間は半角スペース
2. 末尾に「;」（セミコロン）を付ける
3. 文字列は「'」（シングルクオート）で囲む
4. 大文字と小文字は区別しない（SELECTとselect）

# 操作

## CREATE TABLE

指定された名前を持つテーブルを作成する命令

```
CREATE TABLE テーブル名 (列名1 型1[, 列名2 型2, ...]);
```

### 使用例

`name`, `email`, `age`, `birthday`を列に持つ`user`テーブルを作成

```
CREATE TABLE user (name VARCHAR(100), email VARCHAR(255), age INT, birthday DATE);
```

## INSERT

既存のテーブルの新しい行を挿入する命令

```
INSERT INTO テーブル名 (カラム名1[, カラム名2, ...]) VALUES (値1[, 値2, ...]);
```

### 使用例

`user`テーブルにデータを挿入する
 
```
INSERT INTO user (name, email, age) VALUES ('Keita Nakanishi', 'contact@nakanishy.com', 21);
```

## SELECT

1つ以上のテーブルから選択された行を取得する命令

```
SELECT 列名1[, 列名2, ...] FROM テーブル名;
```

### 使用例

`user`テーブルから`name`と`email`を取得
 
```
SELECT name, email FROM user;
```


`user`テーブルからすべての列を取得

```
SELECT * FROM user
```

# 条件の指定

`SELECT`文を使って情報を取得する際に使えるものを紹介する。

## WHERE

条件式に一致する行を取得する。

```
SELECT 列名1[, 列名2, ...] FROM テーブル名 WHERE 条件式;
```

条件式には比較演算子と論理演算子が使える。

### 比較演算子

| 演算子 |        意味        |
|:------:|:------------------:|
|    >   |     より大きい     |
|   >=   | より大きいか等しい |
|    <   |     より小さい     |
|   <=   | より小さいか等しい |
|   =    |       等しい       |
|   !=   |     等しくない     |
|   <>   |     等しくない     |


### 論理演算子

| 演算子 |  使用例 |                  意味                 |
|:------:|:-------:|:-------------------------------------:|
|   AND  | a AND b |       aとbが共にTRUEの時に TRUE       |
|   &&   |  a && b |       aとbが共にTRUEの時に TRUE       |
|   OR   |  a OR b | aかbの少なくとも1つがTRUEの場合にTRUE |
|   \|\|   |  a \|\| b | aかbの少なくとも1つがTRUEの場合にTRUE |
|   XOR  | a XOR b |  aかbのどちらか1つがTRUEの場合にTRUE  |
|   NOT  |  NOT a  |    aがTRUEならFALSE, FALSEならTRUE    |
|    !   |   ! a   |    aがTRUEならFALSE, FALSEならTRUE    |

### 使用例

20歳以上、60歳以下の人のみデータを取得する例

```
SELECT name, email FROM user WHERE age >= 20 AND age <= 60;
```

## ORDER BY

指定した方法でデータを並び替えて取得

```
SELECT 列名1[, 列名2, ...] FROM テーブル名 ORDER BY 列名 [ASC | DESC], ...;
```

`ASC`を指定した場合は昇順、`DESC`を指定した場合は降順にソートされる。省略した場合は昇順でソートが行われる。

### 使用例

年齢の大きい順にデータを取得する例

```
SELECT name, email FROM user ORDER BY age DESC;
```


# データ型

型は、列にどのようなデータを格納するかを示すものである。よく使う基本的な型を以下に示す。

|    型     |   入れられる値  |
|:----------:|:---------------:|
|     INT    |       整数      |
|    FLOAT   |   浮動小数点数  |
| VARCHAR(M) | M文字分の文字列 |
|    DATE    |     年月日    |
|  DATETIME  |  年月日と時間  |

その他の型については、<a href="http://dev.mysql.com/doc/refman/5.6/ja/data-types.html" target="_blank">MySQL 5.6 リファレンスマニュアル :: 11 データ型</a>を参照のこと。

# 値の制約

SQLの表定義ではデータ値に制約を持たせることで、登録されるデータが常に正しい状態を保つことができます。

## 主キーの指定（PRIMARY KEY）

主キーとは、テーブルに格納されたレコードを一意に識別するための属性です。

```
CREATE TABLE user (id INT PRIMARY KEY, ...);
```

## 外部キーの指定（FOREIGN KEY）

外部キーとは、テーブルの指定したカラムに格納できる値を他のテーブルに格納されている値だけに限定するものです。参照される側のテーブルを親テーブル、参照する側のテーブルを子テーブルと呼びます。

親テーブル

```
CREATE TABLE user (id INT PRIMARY KEY, ...);
```

小テーブル

```
CREATE TABLE post (user_id INT, ...,
  FOREIGN KEY (user_id)
  REFERENCES user(id)
);
```

## 一意な値（UNIQUE）

UNIQUEを指定すると、指定した列（カラム）に重複する値を許しません。

```
CREATE TABLE user (student_id INT UNIQUE, ...);
```

## 連番をふる（AUTO_INCREMENT）

AUTO_INCREMENTを指定したカラムには、自動

```
CREATE TABLE user (student_id INT UNIQUE, ...);
```





uniqe, prim key, foreign key, unsigned, auto increment, not null, default,
