#!/bin/sh

if  [ -z "$1" ] || [ "$2" ]; then
	echo "Wrong format. Please use ./myawesomescript.sh url"
	exit 1
fi

url="$1"

redir=$(curl -s "$url" | grep "moved here" | cut -d '"' -f 2)

if [ -z "$redir" ]; then
	echo "Please enter a valid url (bit.ly)"
	exit 1
fi

echo "$redir"
