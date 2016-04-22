#!/bin/sh
#Deploy to git

export REPO_PATH=git@github.com:RowlandOti/deploy-zone.git
export COMMIT_MESS="deploy: automated deploy to server"
export COMMIT_USER="Travis-Bot-RowlandOti"
export COMMIT_EMAIL="travis-bot@rowlandoti.com"
# Extract the commit message
export TRAVIS_COMMIT_MSG="$(git log --format=%B --no-merges -n 1)"
export CHANGESET="$(git rev-parse --verify HEAD)"

mkdir -p ~/.ssh
mv .keys/deploy_key.pem ~/.ssh/id_rsa
mv .keys/authorized_keys ~/.ssh/authorized_keys
chmod 600 ~/.ssh/id_rsa # this key should have push access
chmod 600 ~/.ssh/authorized_keys

echo -e "Host github.com\n\tStrictHostKeyChecking no\n" >> ~/.ssh/config
eval "$(ssh-agent -s)" #start the ssh agent

git config --global push.default matching
git config --global user.email "${COMMIT_EMAIL}"
git config --global user.name "${COMMIT_USER}"
git init
git add --all .
git commit -am "${COMMIT_MESS} with changeset ${CHANGESET}"
git remote add deploy ${REPO_PATH}
git push deploy