#!/bin/sh
#Deploy to server
find ./ -type f -exec curl --user $FTP_USER:$FTP_PASS --ftp-create-dir -T {} ftp://ftp.skyllabler.com/{} \;