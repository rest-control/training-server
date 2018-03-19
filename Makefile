.PHONY: run up stop

NAME ?= rest-control-training-server
CONSOLE := docker-compose -p $(NAME) -f ./Docker/docker.yml

start:
	- docker network create rest-control
	@-$(CONSOLE) up -d
stop:
	@-$(CONSOLE) stop
build:
	$(CONSOLE) build --pull
	make composer-install
	make database-migrate
	make database-seed
composer-install:
	@-$(CONSOLE) run --service-ports --rm cli composer install
database-migrate:
	@-$(CONSOLE) run --service-ports --rm cli php artisan migrate
database-seed:
	@-$(CONSOLE) run --service-ports --rm cli php artisan db:seed