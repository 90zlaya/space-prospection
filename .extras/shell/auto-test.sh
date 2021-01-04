#!/bin/bash

################################################################################
# Script name : auto-test.sh
# Description : Run automatic tests 
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
ROOT_DIR="$SCRIPT_DIR/../.."
APP_DIR="$ROOT_DIR/application"
VENDOR_DIR="$APP_DIR/vendor"
PHPCS_DIRS=(
  "controllers"
  "models"
  "tests/controllers"
  "tests/models"
)

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

for directory in ${PHPCS_DIRS[*]}
do
  "${VENDOR_DIR}/bin/phpcs" "${APP_DIR}/${directory}/" --standard="${ROOT_DIR}/.extras/phpcs.xml" --colors
  echo "Finished PHP_CodeSniffer for ${directory} directory"
done

phpunit -c "${APP_DIR}/tests/"

End 0

################################################################################
