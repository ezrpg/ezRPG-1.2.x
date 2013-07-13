<?php

if (!defined('IN_EZRPG'))
    exit;

/*
  Title: Module functions
  This file contains functions used for security pruposes.
 */

/*
  Function: LoadModuleCache
  Loads the Module Cache from /cache
  
  Paramaters:

  Returns:
  Array - The Cache.
 */
function loadModuleCache() {  
	global $db;
	$query = 'SELECT * FROM `<ezrpg>plugins` WHERE active = 1';
	$cache_file = md5($query);
	$cache = CACHE_DIR . $cache_file;
	if( file_exists( $cache ) )
	{
		if( filemtime( $cache ) > time( ) - 60 * 60 * 24 ) 
		{
			$array = unserialize( file_get_contents( $cache ) );
			if ( DEBUG_MODE == 1 ) {
			echo 'Loaded Module Cache! <br />';
			}
		} else {
			unlink( $cache );
			$query1 = $db->execute($query);
			$array = $db->fetchAll($query1);
			file_put_contents( CACHE_DIR . $cache_file, serialize( $array ) );
			if ( DEBUG_MODE == 1 ) {
				echo 'Created Module Cache! <br />';
			}
		}
	} else {
		$query1 = $db->execute($query);
		$array = $db->fetchAll($query1);
		file_put_contents( CACHE_DIR . $cache_file, serialize( $array ) );
		if ( DEBUG_MODE == 1 ) {
			echo 'Created Module Cache! <br />';
		}
	}
	$debugTimer['Loaded Module Cache']=microtime(1);
    return $array;
}

/*
  Function: killModuleCache
  Wipes the Module Cache from /cache
  
  Paramaters:

  Returns:
  TRUE
 */
function killModuleCache(){
	$query = 'SELECT * FROM `<ezrpg>plugins` WHEE active = 1';
	$cache_file = md5($query);
	$cache = CACHE_DIR . $cache_file;
	unlink( $cache );
	echo 'Module Cache cleaned!';
	return true;
}

/*
  Function: killMenuCache
  Wipes the Menu Cache from /cache
  
  Paramaters:

  Returns:
  TRUE
 */
function killMenuCache(){
	$query = 'SELECT * FROM `<ezrpg>menu` WHERE active = 1 ORDER BY `pos`';
	$cache_file = md5($query);
	unlink( CACHE_DIR . $cache_file );
	echo 'Menu Cache cleaned!';
	return true;
}

/*
  Function: killSettingsCache
  Wipes the Settings Cache from /cache
  
  Paramaters:

  Returns:
  TRUE
 */
function killSettingsCache(){
	$query = 'SELECT * FROM `<ezrpg>settings`';
	$cache_file = md5($query);
	unlink( CACHE_DIR . $cache_file );
	echo 'Settings Cache cleaned!';
	return true;
}

/*
  Function: killPlayerCache
  Wipes the Player Cache from /cache
  
  Paramaters:
  $id = User's id whose cache is wiped
  Returns:
  TRUE
 */
function killPlayerCache($id){
	$query = 'SELECT id, username, 
			email, rank, registered
			FROM `<ezrpg>players` WHERE id = ' . $id;
	$cache_file = md5($query);
	unlink( CACHE_DIR . $cache_file );
	echo 'Player Cache cleaned!';
	loadMetaCache(1);
	return true;
}

/*
  Function: isModuleActive
  checks if module is in Module array
  
  Paramaters:
  $name - title of the module checking
  $modules - optional param for the modulecache

  Returns:
  BOOL - TRUE/FALSE.
 */
function isModuleActive($name, $modules = 0){
	if ($modules == 0)
		$modules = (array)loadModuleCache();
		
	foreach ( $modules as $key => $item) {
		if(in_array($name,(array) $item))
			return true;
	}
	return false;
		
	}
?>