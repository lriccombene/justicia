#!/bin/bash
docker-compose exec app composer update
docker-compose exec app chmod 777 ./web/assets -R
docker-compose exec app chmod 777 ./runtime -R
