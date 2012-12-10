#!/bin/sh

SCR_PATH="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# Go to folder tests/
cd $SCR_PATH
cd ../tests/

# Execute the phpunit tests
phpunit --configuration phpunit.xml
