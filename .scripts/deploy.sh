#!/bin/sh

find ./ -type f -exec curl --user $FTP_USER:$FTP_PASSWORD --ftp-create-dir -T {} ftp://ftp.skyllabler.com/test/{} \;