#!/bin/bash

################################################################################
# Script name : setup.sh
# Description : Setup project 
# Arguments   : /
# Author      : 90zlaya
# Email       : contact@zlatanstajic.com
# Licence     : MIT
################################################################################

################################################################################
# Globals
################################################################################

SCRIPT_NAME="`basename $(readlink -f $0)`"
SCRIPT_DIR="`dirname $(readlink -f $0)`"
ROOT_DIR="$SCRIPT_DIR/.."
APP_DIR="$ROOT_DIR/application"

################################################################################
# Shell terminates
################################################################################

End()
{
  if [ $1 -eq 0 ]
  then
    echo "Script $SCRIPT_NAME finishing OK"
    echo ""
    exit 0
  else
    echo -e "Script $SCRIPT_NAME finishing with \e[1mERROR [$2]\e[0m"
    echo ""
    exit 1
  fi
}

################################################################################
# Executing all
################################################################################

echo ""
echo "Script $SCRIPT_NAME starting..."

composer install
php "$APP_DIR/vendor/kenjis/ci-phpunit-test/install.php"
rm "$APP_DIR/tests/controllers/Welcome_test.php"
cp "$APP_DIR/tests/.phpunit.xml" "$APP_DIR/tests/phpunit.xml"

End 0

################################################################################
