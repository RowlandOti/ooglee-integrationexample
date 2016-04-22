#!/bin/sh
#Deploy to git
eval "$(ssh-agent -s)" #start the ssh agent
#chmod 600 .keys/deploy_key.pem # this key should have push access
#ssh-add .keys/deploy_key.pem
mkdir -p ~/.ssh
mv .keys/deploy_key.pem ~/.ssh/id_rsa
mv .keys/authorised_keys ~/.ssh/authorised_keys
chmod 600 ~/.ssh/id_rsa # this key should have push access
echo -e "Host github.com\n\tStrictHostKeyChecking no\n" >> ~/.ssh/config
git config --global user.email "travis-bot@rowlandoti.com"
git config --global user.name "Travis-Bot-RowlandOti"
git init
git add .
git commit -am "deploy: automated deploy to server"
git remote add deploy git@github.com:RowlandOti/deploy-zone.git
git push deploy