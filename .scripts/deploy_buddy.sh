#!/bin/sh
#Deploy to git
eval "$(ssh-agent -s)" #start the ssh agent
chmod 600 deploy_key.pem # this key should have push access
ssh-add deploy_key.pem
git config --global user.email "travis-bot@rowlandoti.com"
git config --global user.name "Travis-Bot-RowlandOti"
git init
git add .
git commit -am "deploy: automated deploy to server"
git remote add deploy git@github.com:RowlandOti/deploy-zone.git
git push deploy