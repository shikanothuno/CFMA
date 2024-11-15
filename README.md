# プリケーション名：COACHTECH フリマアプリ  
フリマアプリ  
* 商品を出品できる。
* お気に入りを登録できる。
* コメントを商品に付けることができる。
* 商品を検索できる。
* 管理者がユーザーやコメントを削除できる。

トップ画面の画像
![[トップ画面]top-view.png](/images/top_view.png)

## 作成した目的  
ある企業が自ブランドのアイテムを出品した独自のフリマアプリを求めていたため。  

## アプリケーションURL  
http://localhost/  

## 機能一覧  
- 会員登録
- ログイン
- ログアウト
- 商品一覧取得
- 商品詳細取得
- 商品お気に入り一覧取得
- ユーザー情報取得
- ユーザー購入商品一覧取得
- ユーザ出品商品一覧取得
- プロフィール変更
- 商品お気に入り追加
- 商品お気に入り削除
- 商品コメント追加
- 商品コメント削除
- 出品
- 管理者ユーザー削除
- 管理者メール送信

## 使用技術  
|アプリケーション名|バージョン|
|:---------------|:--------|
|PHP|8.2.12|
|Mysql|8.0.26|
|nginx|1.21.1|
|laravel|11.70|

## 設計したテーブル  

### categories
| カラム名       | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|----------------|-----------|-------------|------------|----------|-------------|
| id             | integer   | O           | O          | O        |             |
| category_name  | varchar   |             |            | O        |             |
| created_at     | datetime  |             |            |          |             |
| updated_at     | datetime  |             |            |          |             |

### comments
| カラム名       | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|----------------|-----------|-------------|------------|----------|-------------|
| id             | integer   | O           | O          | O        |             |
| item_id        | integer   |             |            | O        | O           |
| user_id        | integer   |             |            | O        | O           |
| comment_body   | varchar   |             |            |          |             |
| created_at     | datetime  |             |            |          |             |
| updated_at     | datetime  |             |            |          |             |

### favorites
| カラム名       | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|----------------|-----------|-------------|------------|----------|-------------|
| id             | integer   | O           | O          | O        |             |
| user_id        | integer   |             |            | O        | O           |
| item_id        | integer   |             |            | O        | O           |
| created_at     | datetime  |             |            |          |             |
| updated_at     | datetime  |             |            |          |             |

### images
| カラム名       | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|----------------|-----------|-------------|------------|----------|-------------|
| id             | integer   | O           | O          | O        |             |
| image_name     | varchar   |             |            | O        |             |
| image_url      | varchar   |             |            | O        |             |
| created_at     | datetime  |             |            |          |             |
| updated_at     | datetime  |             |            |          |             |

### items
| カラム名         | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------------|-----------|-------------|------------|----------|-------------|
| id               | integer   | O           | O          | O        |             |
| item_status_id   | integer   |             |            | O        | O           |
| item_name        | varchar   |             |            | O        |             |
| item_brand_name  | varchar   |             |            | O        |             |
| item_description | text      |             |            | O        |             |
| item_price       | integer   |             |            | O        |             |
| image_id         | integer   |             |            | O        | O           |
| listing_user     | integer   |             |            | O        | O           |
| purchase_user    | integer   |             |            |          | O           |
| created_at       | datetime  |             |            |          |             |
| updated_at       | datetime  |             |            |          |             |

### item_statuses
| カラム名         | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------------|-----------|-------------|------------|----------|-------------|
| id               | integer   | O           | O          | O        |             |
| item_status_name | varchar   |             |            | O        |             |
| created_at       | datetime  |             |            |          |             |
| updated_at       | datetime  |             |            |          |             |

### payment_methods
| カラム名         | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------------|-----------|-------------|------------|----------|-------------|
| id               | integer   | O           | O          | O        |             |
| payment_method   | varchar   |             |            | O        |             |
| created_at       | datetime  |             |            |          |             |
| updated_at       | datetime  |             |            |          |             |

### users
| カラム名           | 型        | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|--------------------|-----------|-------------|------------|----------|-------------|
| id                 | integer   | O           | O          | O        |             |
| name               | varchar   |             |            |          |             |
| email              | varchar   |             |            | O        |             |
| email_verified_at  | datetime  |             |            |          |             |
| password           | varchar   |             |            | O        |             |
| is_admin           | boolean   |             |            | O        |             |
| user_zip_code      | varchar   |             |            |          |             |
| user_address_name  | varchar   |             |            |          |             |
| user_building_name | varchar   |             |            |          |             |
| image_id           | integer   |             |            |          | O           |
| payment_method     | integer   |             |            | O        | O           |
| created_at         | datetime  |             |            |          |             |
| updated_at         | datetime  |             |            |          |             |

## 作成したER図  

![[作成したER図]er.png](/images/ER.png)  
 
# 環境構築  
Dockerで環境構築を行っている  

## 環境構築手順  
1. 環境構築用のディレクトリを用意する  
2. Gitをダウンロードする  
3. 以下のコマンドをコマンドプロンプトに入力する  
```
git clone https://github.com/shikanothuno/Rese.git
```
4. Dockerをインストールし、起動する  
5. Reseフォルダの中でコマンドプロンプトを開いて以下のコマンドを入力する  
```
docker compose build
```
6. srcファイルの中の.env.exampleを.envファイルとしてコピーする  
コピーには以下のコマンドを使用する  
```
cd ./src
cp .env.example .env
```
7. コピーした.envファイルの内容を以下のように書き換える  

before　　
```before
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525

```

after　　

```after
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

MAIL_MAILER=smtp
MAIL_HOST=mail
MAIL_PORT=1025

```

8. 以下のコマンドでPHPサーバーに入る  
```
cd ../
docker compose up -d
docker compose exec php bash
```

9. 以下のコマンドで必要なファイルをインストールする  
```
composer install
```

10. 以下のコマンドでAPI Keyを生成する
```
php artisan key:generate
```
11. 以下のコマンドでシンボリックリンクを作成する
```
php artisan storage:link
```
12. 以下のコマンドでマイグレーションファイルを再生成し、ダミーデータを作成する
```
php artinsa migrate:fresh --seed
```

13. 以下のユーザメールとパスワードを使ってログインする  
管理者
```
email:admin@example.com
password:password
```
一般利用者
```
email:test0@example.com
password:password
```

14. アプリの機能を確認する  

## ユーザー登録手順
1.新規登録画面からメールアドレス、パスワードを登録する  

## 開発環境と本番環境の切り分け  
### 開発環境の場合  
以下のコマンドで起動する  
```
docker compose --env-file .env.testing up -d --build
```  
また、以下のファイルに開発環境の環境設定を記述する
```
.env.testing
```
### 本番環境の場合
以下のコマンドで実行する  
```
docker compose --env-file .env.production up -d --build
```
また、以下のファイルに本番環境の環境設定を記述する  
```
.env.production
```  
