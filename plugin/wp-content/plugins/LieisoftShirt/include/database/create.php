<?php

defined("LS_COUNT_TABLES") or define("LS_COUNT_TABLES", 2);
defined("LS_DB_VERSION") or define("LS_DB_VERSION","1.1");


function ls_create_db(){
    
    global $wpdb;
    $prefix     = $wpdb->prefix;
    $version    = get_option("ls_db_version");
    if($version == NULL || $version < LS_DB_VERSION){
        for($i = 0 ; $i < LS_COUNT_TABLES ; $i++){
            $wpdb->query(ls_tables($i, $prefix));
        }
        add_option( "ls_db_version", LS_DB_VERSION);
    }
}



function ls_tables($i , $prefix){
    
    $t1 = "CREATE TABLE IF NOT EXISTS `" . $prefix  . "shirt` (
            `id_tshirt` int(11) NOT NULL AUTO_INCREMENT,
            `id_user` int(11) DEFAULT '0',
            `id_wc` int(11) DEFAULT '0',
            `imagen` text,
            `camisa_obj` int(11) DEFAULT NULL,
            `precio` double DEFAULT NULL,
            `deadline` datetime DEFAULT NULL,
            `tags` text,
            `id_product` int,
            `attr` text
            PRIMARY KEY (`id_tshirt`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ";
    
    
    $tables = array(
        0 => $t1
    );

    return $tables[$i];
   
}



    