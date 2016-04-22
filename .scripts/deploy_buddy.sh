#!/bin/sh
#Deploy to git

REPO_PATH=git@github.com:RowlandOti/deploy-zone.git
COMMIT_MESS="deploy: automated deploy to server"
COMMIT_USER="Travis-Bot-RowlandOti"
COMMIT_EMAIL="travis-bot@rowlandoti.com"
CHANGESET=$(git rev-parse --verify HEAD)

eval "$(ssh-agent -s)" #start the ssh agent
#chmod 600 .keys/deploy_key.pem # this key should have push access
#ssh-add .keys/deploy_key.pem
mkdir -p ~/.ssh
mv .keys/deploy_key.pem ~/.ssh/id_rsa
mv .keys/authorised_keys ~/.ssh/authorised_keys
chmod 600 ~/.ssh/id_rsa # this key should have push access
chmod 600 ~/.ssh/authorized_keys
echo -e "Host github.com\n\tStrictHostKeyChecking no\n" >> ~/.ssh/config
echo -e "Host github.com\n\tPasswordAuthentication no\n" >> ~/.ssh/config
git config --global user.email "${COMMIT_EMAIL}"
git config --global user.name "${COMMIT_USER}"
git init
git add .
git commit -am "${COMMIT_MESS} with changeset ${CHANGESET}"
git remote add deploy ${REPO_PATH}
git push deploy