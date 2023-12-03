お問い合わせフォーム

環境構築
１.git clone git@github.com:coachtech-material/laravel-template.git
2.docker-compose up -d -build

Laravel環境
１.docker-compose exec php bash
2.composer install
3..env.exampleファイルから.envを作成、環境変数を変更
４.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
・PHP 8.2.12
・Laravel　8.83.8
・MySQL 8.0.26

URL
・開発環境:　http://localhost/
・phpMyadmin: http://localhost:8080/
