#!/bin/sh

VERSION='90'
TUTOR_DIR="/usr/share/vim/vim$VERSION/tutor"
TUTOR_JA=$(tempfile -p 'ja')
TUTOR=$(tempfile -p 'en')
chmod +w $TUTOR
cp $TUTOR_DIR/tutor.ja.utf-8 $TUTOR_JA
cp $TUTOR_DIR/tutor $TUTOR                                                  

trap "rm $TUTOR_JA $TUTOR" 0 1 2 3 9 11 13 15

vim -c "tabdo windo set scb nocp nonu showcmd" -O $TUTOR_JA $TUTOR 
