#! /bin/bash
#push to github

git add -A 
if [ -n "$1" ]
then
    git commit -m "$1"
else
    git commit -m "maj"
fi
git push origin master
<<c
php bin/console cache:clear
php bin/console cache:clear --env=prod
php bin/console cache:clear --env=dev
c


