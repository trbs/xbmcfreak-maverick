#!/bin/sh

#      Copyright (C) 2005-2010 Team XBMC
#      http://www.xbmc.org
#
#  This Program is free software; you can redistribute it and/or modify
#  it under the terms of the GNU General Public License as published by
#  the Free Software Foundation; either version 2, or (at your option)
#  any later version.
#
#  This Program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
#  GNU General Public License for more details.
#
#  You should have received a copy of the GNU General Public License
#  along with XBMC; see the file COPYING.  If not, write to
#  the Free Software Foundation, 675 Mass Ave, Cambridge, MA 02139, USA.
#  http://www.gnu.org/copyleft/gpl.html


cat > $WORKPATH/buildLive/Files/chroot_sources/thopiekar.list.chroot << EOF
deb http://ppa.launchpad.net/thopiekar/maverick-dev/ubuntu maverick main
EOF

cat > $WORKPATH/buildLive/Files/chroot_sources/thopiekar.list.binary << EOF
deb http://ppa.launchpad.net/thopiekar/maverick-dev/ubuntu maverick main
EOF

if [ ! -f $WORKPATH/thopiekar.key ] ; then
        wget --no-proxy -O $WORKPATH/thopiekar.html "http://keyserver.ubuntu.com:11371/pks/lookup?op=get&search=0xD51DB14E9FFECCF3"
        if [ "$?" -ne "0" ] || [ ! -f $WORKPATH/thopiekar.html ] ; then
                echo "Needed keyfile not found, exiting..."
                exit 1
        fi

        #
        # Page structure:
        #
        # <html><head><title> ... </title></head>
        # <body><h1> ... </h1>
        # <pre>
        # -----BEGIN PGP PUBLIC KEY BLOCK-----
        # ...
        # -----END PGP PUBLIC KEY BLOCK-----
        # </pre>
        # </body></html>
        #

        # Filter out all before <pre> and after </pre>
        cat $WORKPATH/thopiekar.html | sed -e '1,/<pre>/d;/<\/pre>/,$d' > $WORKPATH/thopiekar.key
        rm $WORKPATH/thopiekar.html
fi

cp $WORKPATH/thopiekar.key $WORKPATH/buildLive/Files/chroot_sources/thopiekar.binary.gpg
cp $WORKPATH/thopiekar.key $WORKPATH/buildLive/Files/chroot_sources/thopiekar.chroot.gpg
rm $WORKPATH/thopiekar.key

