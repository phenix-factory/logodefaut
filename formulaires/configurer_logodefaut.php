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
            'saisie' => 'logodefaut',
            'options' => array(
                'nom' => 'logodefaut',
                'type' => 'file',
                'label' => _T('logodefaut:logodefaut_titre'),
                'afficher_si' => '@logo_du_site@ == ""'
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
    );
    return $saisies;
}

function formulaires_configurer_logodefaut_charger_dist() {
    // Contexte du formulaire.
    include_spip('inc/config');
    $config = lire_config('logodefaut');

    if (isset($_FILES['logodefaut']))
        logodefaut_uploader();

    // Supprimer le logo au besoin
    if (_request('supprimer_logo_') and empty($config['logo_du_site'])) {
        $path = extraire_attribut(logo_par_defaut(), src);
        spip_unlink($path);
    }

    if (empty($config))
        return array();

    return $config;
}
