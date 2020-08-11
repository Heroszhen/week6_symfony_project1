#! /bin/bash
#push to github

php bin/console cache:clear
php bin/console cache:clear --env=prod
php bin/console cache:clear --env=dev

if [ $1 = "archive" ]
then
    zip ../symfony-default.zip -r * .[^.]* -x "vendor/*"
fi