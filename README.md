# アプリケーション名
お問い合わせフォーム

# 環境構築
## Dockerビルド
- git clone git@github.com:ainasan0321/Fashionably-Late.git
- DockerDesktopを立ち上げる
- docker-compose up -d --build

## Laravel環境構築
- docker-compose exec php bash
- composer install
- cp .env.example  .env
- php artisan key:generate
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



