PHP = docker-compose run --rm php-cli

.PHONY: default up down setup artisan composer test

default: up

up: .env
	docker-compose up -d --build

down:
	docker-compose down

setup: up
	$(PHP) make setup

.env:
	echo ".env.example をコピーして .env を作成し、値を設定してください"
	exit 1

src/.env:
	$(PHP) make .env

artisan: .env src/.env
	$(PHP) php artisan $(CMD)

composer: .env
	$(PHP) composer $(CMD)

test: .env src/.env
	$(PHP) make test
