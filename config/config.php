<?php
/**
 * @copyright Copyright (c) 2016 Lukas Reschke <lukas@statuscode.ch>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

declare(strict_types=1);

$rel = '2021-04-29 16:00';
$ver = '3.2.1';
$legacy_ver = '3.1.3';

$ver_str = 'Nextcloud Client ' . $ver;
$legacy_ver_str = 'Nextcloud Client ' . $legacy_ver;

if (version_compare($version, '3.0.3') < 0) {
	$url = 'https://download.nextcloud.com/desktop/releases/';
	$legacyurl = 'https://download.nextcloud.com/desktop/releases/';
	$linux_url = $url . 'Linux/';
	$windows_url = $url . 'Windows/';
	$legacy_windows_url = $legacyurl;
	$mac_url = $url . 'Mac/Installer/';
} else {
	$url = 'https://github.com/nextcloud/desktop/releases/download/v' . $ver . '/';
	$legacyurl = 'https://github.com/nextcloud/desktop/releases/download/v' . $legacy_ver . '/';
	$linux_url = $url;
	$windows_url = $url;
	$legacy_windows_url = $legacyurl;
	$mac_url = $url;
}

if (version_compare($version, '3.1.0') < 0) {
    $windows_suffix = '-setup.exe';
} else {
    if ($buildArch === 'i386') {
        $windows_suffix = '-x86.msi';
    } else {
        $windows_suffix = '-x64.msi';
    }
}


/**
 * Associative array of OEM => OS => version
 */
return [
	'Nextcloud' => [
		'release' => $rel,
		'linux' => [
			'version' => $ver,
			'versionstring' => $ver_str,
			'legacyversion' => null,
			'legacyversionstring' => null,
			'downloadurl' => $linux_url . 'Nextcloud-' . $ver . '-x86_64.AppImage',
			'legacydownloadurl' => null,
			'web' => 'https://nextcloud.com/install/?pk_campaign=clientupdate#install-clients',
		],
		'win32' => [
			'version' => $ver,
			'versionstring' => $ver_str,
			'legacyversion' => $legacy_ver,
			'legacyversionstring' => $legacy_ver_str,
			'downloadurl' => $windows_url . 'Nextcloud-' . $ver . $windows_suffix,
			'legacydownloadurl' => $legacy_windows_url . 'Nextcloud-' . $legacy_ver . $windows_suffix,
			'web' => 'https://nextcloud.com/install/?pk_campaign=clientupdate#install-clients',
		],
		'macos' => [
			'version' => $ver,
			'versionstring' => $ver_str,
			'legacyversion' => null,
			'legacyversionstring' => null,
			'downloadurl' => $mac_url . 'Nextcloud-' . $ver . '.pkg',
			'legacydownloadurl' => null,
			'web' => 'https://nextcloud.com/install/?pk_campaign=clientupdate#install-clients',
		],
	],
];
