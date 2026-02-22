# test_contact-form

## 環境構築手順
### 1. Dockerビルド
- git clone 

### 2. Laravel環境構築
- docker-compose exec php bash
- composer install
- cp env.example .env
- .env内の環境変数を変更。
- php artisan key generate
- php artisan migrate
- php artisan db:seed

## 開発環境
- お問い合わせ画面：http://localhost/
- ユーザー登録：http://localhost/register
- phpMyAdmin：http://localhost:8080/

## 使用技術（実行環境）
- PHP 8.1
- Laravel 8.83.8
- MySQL 8.4
- nginx 1.29.5


# 採点者の方へ
- 作業時間の不足と学習内容の理解不足により、全機能を実装し切ることができませんでした。大変申し訳ございません。次に繋げるため、現在のコーディングの範囲内で改善点等あればご教示いただけますと幸いです。何卒、よろしくお願いいたします。

