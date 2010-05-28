<?php
/**
* This file is part of Ozio Gallery 3.
*
* Ozio Gallery 3 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* (at your option) any later version.
*
* Foobar is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*
* @copyright Copyright (C) 2010 Open Source Solutions S.L.U. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see RT-LICENSE.php
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Com_OzioGallery3InstallerScript 
{

	function install($parent) 
	{
	
			$folder[0][0]	=	'images' . DS . 'oziogallery3' . DS ;
			$folder[0][1]	= 	JPATH_ROOT . DS .  $folder[0][0];
			$folder[0][0]	=	'images' . DS . 'oziodownload' . DS ;
			$folder[0][2]	= 	JPATH_ROOT . DS .  $folder[0][0];
			$file 		= "index.html";
			$file2 		= "_preferences.xml";
			$file3 		= "info.png";	
			$source 	= 	JPATH_ROOT . DS . 'components' . DS . 'com_oziogallery3';
			$source2 	= 	JPATH_ROOT . DS . 'components' . DS . 'com_oziogallery3' . DS . 'imagin' . DS . 'imagin';	
			$dest 		=   JPATH_ROOT . DS . 'images' . DS . 'oziogallery3';	
			$dest2 		=   JPATH_ROOT . DS . 'images' . DS . 'oziodownload';
			
			$message = '';
			$error	 = array();
			foreach ($folder as $key => $value)
			{
				if (!JFolder::exists( $value[1]))
				{
					if (JFolder::create( $value[1], 0755 ) && JFolder::create( $value[2], 0755 ) && @copy($source. DS .$file,$dest. DS .$file) && @copy($source. DS .$file,$dest2. DS .$file) && @copy($source2. DS .$file2,$dest. DS .$file2) && @copy($source2. DS .$file3,$dest. DS .$file3))
					{

						$message .= '<p><b><span style="color:#009933">Folder</span> ' . $value[0] 
								   .' <span style="color:#009933">created!</span></b></p>';
						$error[] = 0;
					}	 
					else
					{
						$message .= '<p><b><span style="color:#CC0033">Folder</span> ' . $value[0]
								   .' <span style="color:#CC0033">creation failed!</span></b> Please create it manually.</p>';
						$error[] = 1;
					}
				}
				else//Folder exist
				{
					$message .= '<p><b><span style="color:#009933">Folder</span> ' . $value[0] 
								   .' <span style="color:#009933">exists!</span></b></p>';
					$error[] = 0;
				}

			}
	
		echo '<p>'. JText::_('COM_OZIOGALLERY3_INSTALL_SCRIPT') . '</p>';
	}

	function uninstall($parent) 
	{
	
		echo '<p>'. JText::_('COM_OZIOGALLERY3_UNINSTALL_SCRIPT') .'</p>';
	}

	function update($parent) {
	}

	function preflight($type, $parent) {
	}

	function postflight($type, $parent) {
//		$parent->getParent()->set('redirect_url', 'index.php?option=com_oziogallery3');
	}
}
