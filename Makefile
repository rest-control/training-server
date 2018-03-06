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
composer-install:
	@-$(CONSOLE) run --service-ports --rm cli composer install
database-migrate:
	@-$(CONSOLE) run --service-ports --rm cli php artisan migrate