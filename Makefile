.PHONY: run up stop first-run run-tests destroy

NAME ?= rest-control-training-server
CONSOLE := docker-compose -p $(NAME) -f ./Docker/docker.yml

start:
	@-$(CONSOLE) up -d
stop:
	@-$(CONSOLE) stop
build:
	$(CONSOLE) build --pull
first-run:
	@-$(CONSOLE) run --service-ports --workdir="/app/server" --rm cli php artisan passport:keys
	make composer-install
	make database-migrate
	make database-seed
composer-install:
	@-$(CONSOLE) run --service-ports --workdir="/app/server" --rm cli composer install
	@-$(CONSOLE) run --service-ports --workdir="/app/tests" --rm cli composer install
database-migrate:
	@-$(CONSOLE) run --service-ports --workdir="/app/server" --rm cli php artisan migrate
database-seed:
	@-$(CONSOLE) run --service-ports --workdir="/app/server" --rm cli php artisan db:seed
destroy:
	-$(CONSOLE) down -v --rmi all
run-tests:
	@-$(CONSOLE) run --service-ports --workdir="/app/tests" --rm cli php vendor/bin/rest-control run