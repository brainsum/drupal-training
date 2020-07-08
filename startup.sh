#!/usr/bin/env bash

docker-compose up -d --force-recreate --remove-orphans || exit 1
docker-compose ps || exit 1
docker-compose exec --user 1000 php sh || exit 1
