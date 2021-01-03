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
ROOT_DIR="$SCRIPT_DIR/.."
APP_DIR="$ROOT_DIR/application"
VENDOR_DIR="$APP_DIR/vendor"
PHPCS_DIRECTORIES=(
  "controllers"
  "models"
  "tests/controllers"
  "tests/models"
)

################################################################################
# Show help
################################################################################

Help()
{
  echo ""
  echo -e "\e[1mRunning $SCRIPT_NAME\e[0m"
  echo "Description: Run automatic tests"
  echo ""
  echo "Show this help : $SCRIPT_NAME -h"
  echo ""
}

################################################################################
# Getting parameters
################################################################################

GetParameters()
{
  if [ $# -eq 1 ]
  then
    if [ "x$1" = "x-h" ]
    then
      Help
      End 0
    fi
  fi
}

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

GetParameters $@

for directory in ${PHPCS_DIRECTORIES[*]}
do
  "${VENDOR_DIR}/bin/phpcs" "${APP_DIR}/${directory}/" --standard="${ROOT_DIR}/ruleset.xml" --colors
  echo "Finished PHP_CodeSniffer for ${directory} directory"
done

phpunit -c "${APP_DIR}/tests/"

End 0

################################################################################
