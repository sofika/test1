#!/bin/bash
#---------------------------------------------------------------------------------------
# Deploy in Test-Umgebung
#---------------------------------------------------------------------------------------
set -xv
DIR=/var/www/testing.reef.7p-group.local/htdocs/reef
rm -rf $DIR
mkdir $DIR
if test $? -ne  0
then
	echo "error: cannto create directory $DIR" >&2
	exit 1
fi
cp -r . $DIR
if test $? -ne  0
then
	echo "error: cannot copy current directory to $DIR" >&2
	exit 1
fi

echo "Successfully deployed to $DIR"
