#!/usr/bin/env bash

# TODO git ftp init
# if .env.deploy does not exist, run git ftp init

git checkout -b deploy

#swap dot-env files
mv .env .env.tmp
mv .env.deploy .env

#confirm configurations
cat .env
read

rm -rfv vendor/
composer install -vvv --no-dev
yarn production

git ftp catchup

#restore defaults
mv .env .env.deploy
mv .env.tmp .env
git reset --hard && git clean -df
git checkout master
git branch -D deploy
