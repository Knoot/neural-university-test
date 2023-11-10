build:
	docker-compose --env-file .env.local build
start:
	docker-compose --env-file .env.local up -d
down:
	docker-compose --env-file .env.local down
restart:
	docker-compose --env-file .env.local restart
init:
	cp .env .env.local
	sed -i "s/APP_ENV=prod/APP_ENV=dev/1" .env.local
migrate:
	docker exec -i --user=1000:1000 back-fpm php bin/console doctrine:migrations:migrate
fixture:
	docker exec -i --user=1000:1000 back-fpm php bin/console doctrine:fixtures:load
install: migrate fixture