#!/bin/sh
#Configure SSH

export KEYS_DIRECTORY=.keys
export SSH_DIRECTORY=~/.ssh

if [ -d "${KEYS_DIRECTORY}" ]; then
   touch ${KEYS_DIRECTORY}/deploy_key.pem
   chmod 600 ${KEYS_DIRECTORY}/deploy_key.pem
else
   echo "Error: ${KEYS_DIRECTORY} not found ....Creating.*.*.*."
   mkdir ${KEYS_DIRECTORY}
   touch ${KEYS_DIRECTORY}/deploy_key.pem
   chmod 600 ${KEYS_DIRECTORY}/deploy_key.pem
fi

openssl aes-256-cbc -nopad -K $encrypted_fd30640532d7_key -iv $encrypted_fd30640532d7_iv -in ${KEYS_DIRECTORY}/deploy_key.pem.enc -out ${KEYS_DIRECTORY}/deploy_key.pem -d
chmod 600 ${KEYS_DIRECTORY}/deploy_key.pem

if [ -d "${SSH_DIRECTORY}" ]; then
   mv .keys/deploy_key.pem ${SSH_DIRECTORY}/id_rsa
   mv .keys/authorized_keys ${SSH_DIRECTORY}/authorized_keys
else
   echo "Error: ${SSH_DIRECTORY} not found ....Creating.*.*.*."
   mkdir -p ${SSH_DIRECTORY}
   mv .keys/deploy_key.pem ${SSH_DIRECTORY}/id_rsa
   mv .keys/authorized_keys ${SSH_DIRECTORY}/authorized_keys
fi

chmod 600 ${SSH_DIRECTORY}/id_rsa # this key should have push access
chmod 600 ${SSH_DIRECTORY}/authorized_keys

echo -e "Host github.com\n\tStrictHostKeyChecking no\n" >> ${SSH_DIRECTORY}/config
eval "$(ssh-agent -s)" #start the ssh agent

ls -al
