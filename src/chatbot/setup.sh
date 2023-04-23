#!/bin/bash
chgrp -R www-data storage bootstrap/cache && \
chown -R www-data storage bootstrap/cache && \
chmod -R ug+rwx storage bootstrap/cache && \

touch storage/logs/laravel.log && chmod 775 storage/logs/laravel.log && chown www-data storage/logs/laravel.log
composer config --no-plugins allow-plugins.kylekatarnls/update-helper true && composer install
php artisan key:generate && npm install
php artisan migrate:fresh --seed
echo "Done..."