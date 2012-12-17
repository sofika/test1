#!/bin/bash
#---------------------------------------------------------------------------------------
# Deploy in Test-Umgebung
#---------------------------------------------------------------------------------------
DIR=/tmp/test1
rm -rf $DIR
mkdir $DIR
if test $? -e 0
then
	echo "error: cannto create directory $DIR" >&2
	exit 1
fi
cp -qr . $DIR
if test $? -e 0
then
	echo "error: cannot copy current directory to $DIR" >&2
	exit 1
fi

echo "Successfully deployed"
