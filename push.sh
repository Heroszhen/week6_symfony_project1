#! /bin/bash
#push to github

git add -A 
git commit -m "maj"
git push origin master

php bin/console cache:clear
php bin/console cache:clear --env=prod
php bin/console cache:clear --env=dev


if [ $1 = "archive" ]
then
    zip ../symfony-default.zip -r * .[^.]* -x "vendor/*"
fi