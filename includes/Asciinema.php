<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @file
 */

use MediaWiki\MediaWikiServices;
use MediaWiki\Shell\Shell;


class Asciinema {

	/**
	 * @param \OutputPage $out
	 * @param \Skin $skin
	 */
	public static function onParserFirstCallInit( Parser &$parser ) {
	   $parser->setHook( 'asciinema', [ self::class, 'renderTagAsciinema' ] );
		
	}
	
	// Render <asciinema>
	public static function renderTagAsciinema( $input, array $args, Parser $parser, PPFrame $frame ) {

		global $wgUploadDirectory;
      //error_log(print_r($parser->getOutput()->getModules(),true));
      $parser->getOutput()->addModules( 'ext.asciinema' );
      $playerargs = "";
      foreach($args as $param => $value)
      {
      	$playerargs .= $param . '="'.$value.'" ';
      }
      $parser->getOutput()->addModuleStyles( 'ext.asciinema' );
	  $out = '<asciinema-player ' . $playerargs .'></asciinema-player>';
   	  error_log($out);
	  return $out;
	}	

}
