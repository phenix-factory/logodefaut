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

    include_spip('inc/config');
    $config = lire_config('logodefaut');

    // On va créer la liste des objets qui sont affecté
    $logo_par_defaut_objet = array();
    foreach($config['objet'] as $table_objet) {
        if (!empty($table_objet))
            $logo_par_defaut_objet[] = 'LOGO_'.strtoupper(objet_type($table_objet));
    }

    foreach($logo_par_defaut_objet as $logo)
        $interfaces['table_des_traitements'][$logo][] = 'logo_par_defaut(%s)';

    return $interfaces;
}