<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function formulaires_configurer_logodefaut_saisies_dist() {
    $saisies = array(
        array(
            'saisie' => 'case',
            'options' => array(
                'nom' => 'logo_du_site',
                'label_case' => _T('logodefaut:logo_du_site'),
                'explication' => _T('logodefaut:explication_logo_du_site')
            )
        ),
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'saisie',
                'afficher_si' => '@logo_du_site@ != ""'
            ),
            'saisies' => array(
                array(
                    'saisie' => 'input',
                    'options' => array(
                        'nom' => 'logodefaut',
                        'type' => 'file',
                        'label' => _T('logodefaut:logodefaut_titre')
                    )
                ),
                array(
                    'saisie' => 'choisir_objets',
                    'options' => array(
                        'nom' => 'objet',
                        'label' => _T('logodefaut:choisir_objet'),
                        'explication' => _T('logodefaut:explication_choisir_objet')
                    )
                )
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