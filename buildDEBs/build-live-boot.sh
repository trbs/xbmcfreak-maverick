#!/bin/bash

#      Copyright (C) 2005-2008 Team XBMC
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


THISDIR=$(pwd)

if ! ls live-boot_*.deb > /dev/null 2>&1 ; then
	echo "Making live-boot..."

	if [ ! -d live-boot ]; then
	    #if you use git <= 1.6, then use: git clone git://live.debian.net/git/live-boot.git && git checkout -b debian-old-1.0 origin/debian-old-1.0
	    #if you use git >= 1.7, then use: git clone git://live.debian.net/git/live-boot.git && git checkout debian-old-1.0
	    if [ ! -f live-boot.tar ]; then
		    git clone git://live.debian.net/git/live-boot.git
		    if [ "$?" -ne "0" ]; then
			    exit 1
		    fi

		    cd live-boot
		    gitMinorVersion=$(git --version | cut -d" " -f3 | cut -d. -f2)
		    if [ $gitMinorVersion -eq "6" ] ; then
			    git checkout -b 3.0_a16-1 debian/3.0_a16-1
		    else
			    git checkout debian/3.0_a16-1
		    fi

		    cd ..

		    # Saved, to avoid cloning for multiple builds
		    tar cf live-boot.tar live-boot  > /dev/null 2>&1
	    else
		    tar xf live-boot.tar  > /dev/null 2>&1
	    fi
	fi

	#
	# Patch to allow live-boot script not to generate an error when using grep -w, not supported by maverick's busybox
	# (we can accept the script being overzaelous, see http://live.debian.net/gitweb?p=live-boot.git;a=commitdiff;h=34f3c0791bdffd64a3b7d4167882a5d308c6292c)
	#
	sed -i -e "s/grep -q -w/grep -q/g" $THISDIR/live-boot/scripts/live-helpers

	#
	# (Ugly) Patch to allow FAT boot disk to be mounted RW
	#	discussions is in progress with upstream developers
	#
	sed -i -e "/\"\${devname}\" \${mountpoint}/s/-o ro,noatime /\$([ "\$fstype" = \"vfat\" ] \&\& echo \"-o rw,noatime,umask=000\" \|\| echo \"-o ro,noatime\") /" $THISDIR/live-boot/scripts/live

	cd $THISDIR/live-boot
	dpkg-buildpackage -rfakeroot -b -uc -us
	if [ "$?" -ne "0" ]; then
		exit 1
	fi
	cd $THISDIR
fi
