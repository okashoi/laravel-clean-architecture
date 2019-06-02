.PHONY: setup test

setup: .env vendor/autoload.php
	php artisan key:generate
	php artisan migrate
	chmod -R 777 storage bootstrap/cache

.env:
	echo ".env.example をコピーして .env を作成し、値を設定してください"
	exit 1

vendor/autoload.php:
	composer install

test: vendor/bin/phpunit
	./vendor/bin/phpunit

vendor/bin/phpunit:
	composer install
