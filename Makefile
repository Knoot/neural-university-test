build:
	docker-compose build
start:
	docker-compose  up -d
down:
	docker-compose down
restart:
	docker-compose restart
init:
	cp .env .env.local
	sed -i "s/APP_ENV=prod/APP_ENV=dev/1" .env.local