<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

/**
 * filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function logodefaut_declarer_tables_interfaces($interfaces) {

    $logo_par_defaut = array(
        'LOGO_INSTITUTION',
        'LOGO_EVENT',
        'LOGO_AUTEUR'
    );
    foreach($logo_par_defaut as $logo)
        $interfaces['table_des_traitements'][$logo][] = 'logo_par_defaut(%s)';

    return $interfaces;
}