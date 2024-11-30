フリマアプリ
#環境構築
1.Dockerビルド
  docker-compose up -d --build
#Laravel環境構築
  1.docker-compose exec php bash
  2.composer install
  3..envで環境変数を変更
  4.php artisan key:generate
  5.php artisan migrate
  6.php artisan db:seed
  7.composer require laravel/fortify
#使用技術
  ・PHP7.4.9
  ・Laravel Framework 8.83.8
  ・mysql  Ver 15.1
#URL
 ・開発環境：http://localhost
 ・phpmyadmin：http://localhost:8080
 ![ER](https://github.com/user-attachments/assets/192cf4cb-8bb9-47a5-a901-e40a32c59510)

