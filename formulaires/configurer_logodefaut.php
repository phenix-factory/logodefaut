<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function formulaires_configurer_logodefaut_saisies_dist() {
    $saisies = array(
        array(
            'saisie' => 'input',
            'options' => array(
                'nom' => 'logodefaut',
                'type' => 'file',
                'label' => _T('logodefaut:logodefaut_titre')
            )
        ),
        array(
            'saisie' => 'checkbox',
            'options' => array(
                'nom' => 'logo_du_site',
                'label' => _T('logodefaut:logo_du_site'),
                'explication' => _T('logodefaut:explication_logo_du_site')
            )
        )
    );
    return $saisies;
}

function formulaires_configurer_logodefaut_charger_dist() {
    // Contexte du formulaire.
    include_spip('inc/config');
    $config = lire_config('logodefaut');
    if (empty($config))
        return array();
    return $config;
}