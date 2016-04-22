#!/bin/sh
#Deploy to git

export REPO_PATH=git@github.com:RowlandOti/deploy-zone.git
export COMMIT_MSG="deploy: Automated Deploy to Server with Commit -"
export COMMIT_USER="Travis-Bot-RowlandOti"
export COMMIT_EMAIL="travis-bot@rowlandoti.com"
# Extract the commit message
export TRAVIS_COMMIT_MSG="$(git log --format=%B --no-merges -n 1)"
export CHANGESET="$(git rev-parse --verify HEAD)"

git config --global push.default matching
git config --global user.email "${COMMIT_EMAIL}"
git config --global user.name "${COMMIT_USER}"
git init
git add --all .
git commit -am "${COMMIT_MSG} ${TRAVIS_COMMIT_MSG} and Changeset - ${CHANGESET}"
git remote add deploy ${REPO_PATH}
git push deploy