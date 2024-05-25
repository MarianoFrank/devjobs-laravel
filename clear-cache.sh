#!/bin/bash

commands=(
    "cache:clear"
    "route:clear"
    "config:clear"
    "view:clear"
    "optimize:clear"
)

total=${#commands[@]}
count=0


echo "Cleaning all cache:"

for cmd in "${commands[@]}"; do
    output=$(./vendor/bin/sail artisan $cmd 2>&1)
    echo "$output"
done
