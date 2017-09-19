#!/usr/bin/env bash

ACTIVE_BRANCH=$(git branch | grep \* | cut -d ' ' -f2)
BUILD_BRANCH='tmp-build'

DOTENV='.env'
DOTENV_TMP='.env.tmp'
DOTENV_DEPLOY='.env.deploy'

DEPLOY_ACTION="$1"

function print_error {
    message=$( echo "$1" | xargs )

    echo -e "\n[ERROR]\n$message"

    return 0
}

function print_info {
    message=$( echo "$1" | xargs )

    echo -e "\n[INFO]\n$message"

    return 0
}

function print_usage {
    echo "Usage: ./deploy.sh [-i|--init] [-r|--restore] [-h|--help]"

    return 0
}

function runcmd {
    CMD="$1"
    DD="${2:-true}"

    EXIT_MESSAGE=$( $CMD )
    EXIT_CODE="$?"

    if [ $EXIT_CODE -ne 0 ] ; then

        [ "$DD" = false ] && return 0

        print_error "$EXIT_MESSAGE"

        restore_defaults

        exit 1

    else

        print_info "$EXIT_MESSAGE"

    fi

    return 0
}

function create_storage_link {
    SOURCE_STORAGE='storage/app/public'
    TARGET_STORAGE='public/storage'

    runcmd "mkdir -p $SOURCE_STORAGE"
    runcmd "ln -s --force $SOURCE_STORAGE $TARGET_STORAGE"

    return 0
}

function run_initial_setup {
    print_info "Setting up..."
    runcmd "mv -v $DOTENV $DOTENV_TMP"
    runcmd "mv -v $DOTENV_DEPLOY $DOTENV"

    print_info "Checking out $BUILD_BRANCH"
    runcmd "git checkout -qb $BUILD_BRANCH"

    print_info "Creating storage link"
    create_storage_link

    print_info "Removing php vendor packages"
    runcmd "rm -rf vendor/"

    print_info "Reinstalling php vendor packages"
    runcmd "composer install -q --no-dev"

    print_info "Compiling static assets"
    runcmd "yarn production"

    return 0
}

restore_defaults() {
    runcmd "mv -v $DOTENV $DOTENV_DEPLOY" "false"
    runcmd "mv -v $DOTENV_TMP $DOTENV" "false"

    runcmd "git reset --hard"
    runcmd "git clean --force -d"

    runcmd "git checkout $ACTIVE_BRANCH"

    runcmd "git branch -D $BUILD_BRANCH" "false"

    print_info "Back to project defaults"

    return 0
}

function run_initial_upload {
    run_initial_setup

    runcmd "git ftp init"

    restore_defaults

    return 0
}

function run_upload {
    run_initial_upload

    runcmd "git ftp push"

    run_restore_defaults

    return 0
}

case "$DEPLOY_ACTION" in

-i|--init)
    run_initial_upload

    exit 0
    ;;

-r|--restore)
    run_restore_defaults

    exit 0
    ;;

-h|--help)
    print_usage

    exit 1
    ;;
esac

run_upload

exit 0
