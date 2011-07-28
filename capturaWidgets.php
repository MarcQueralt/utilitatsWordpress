<?php
/*
 * Retorna els widgets actius amb totes les opcions.
 * El contingut es formateja per a poder ésser inserit dins d'un array() de php
 * Author: Marc Queralt
 * Version: 20110728
 * Setup: Copiar al root de wordpress
 * Execute: invocar des del navegador
 */
require('wp-load.php');
$sidebars = get_option( 'sidebars_widgets' );
echo '<pre>';
//print_r( $sidebars );
foreach ( $sidebars as $sidebar_id => $vectors ):
    if ( $sidebar_id == 'wp_inactive_widgets' ):
        continue;
    endif;
    foreach ( $vectors as $widget_id ):
        echo "'sidebar_id' =>'" . $sidebar_id . "',";
        echo " 'widget_id' => '" . $widget_id . "',";
        echo " 'opcions' => array(";
        $base=explode('-',$widget_id);
        $opcio = get_option( "widget_".$base[0]);
        $opcio = $opcio[$base[1]];
        foreach($opcio as $nom=>$valor){
            echo "'".$nom."'=>'".$valor."', ";
        }
        echo "),\n";
        //print_r($opcio);
    endforeach;
endforeach;
echo '</pre>';
?>
