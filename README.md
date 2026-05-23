# アプリケーション名
お問い合わせフォーム

# 環境構築
## Dockerビルド
- コマンドライン上で`git clone git@github.com:ainasan0321/Fashionably-Late.git`でクローンします。
- DockerDesktopを立ち上げる
- コマンドライン上で`docker-compose up -d --build`をしていただき
`Fashionably-Late`があるか確認。

## Laravel環境構築
- PHPコンテナ内にログインしたいので、`docker-compose exec php bash` をします。
- 次に、パッケージのリストをインストールしたいので`composer install`をします。
- `cp .env.example  .env` を実行。
- `.env.example`をコピーし、コピーした`.env`を`docker-compose.yml`に記載されてる内容に変更をします。
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

- 変更ができたら、`php artisan key:generate`.
- php artisan migrate
- php artisan db:seed 

## 開発環境
- お問い合わせ画面：http://localhost/
- ユーザー登録：http://localhost/register
- phpMyAdmin：http://localhost:8080/

## 使用技術
- nginx:1.21.1
- mysql:8.0.45
- php:8.1.34
- Laravel:8.83.29

## ER図
<img width="789" height="512" alt="index drawio" src="https://github.com/user-attachments/assets/a7c7192e-a30b-4129-a728-ccd769bb6ea6" />


## 未実装
- 管理画面：詳細
- 応用　export



