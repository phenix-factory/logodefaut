<?php
/**
 * Fonctions utiles au plugin Logo par défaut
 *
 * @plugin     Logo par défaut
 * @copyright  2015
 * @author     Phenix
 * @licence    GNU/GPL
 * @package    SPIP\Logodefaut\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Dans le cas ou un logo est vide, on affiche le logo par défaut
 *
 * @param mixed $logo
 * @access public
 * @return mixed
 */
function logo_par_defaut($logo='') {
    if (empty($logo)) {

        include_spip('inc/config');
        $config = lire_config('logodefaut');

        // Si la config demande le SPIP logo commen logo par défaut, on l'utilise
        if (isset($config['logo_du_site']) and $config['logo_du_site']) {
            $chercher_logo = charger_fonction('chercher_logo', 'inc');
            $logo_par_defaut = $chercher_logo(0, 'site');
            $logo_par_defaut = $logo_par_defaut[0];
        }

        // Class par défaut des logo (Y a pas une constante pour ça ?)
        $class = 'spip_logos';

        $balise_img = charger_filtre('balise_img');
        // On ajoute cette class si on est dans l'espace privé (juste pour spip 3.1?)
        if (test_espace_prive())
            $class .= ' spip_logo';

        // Création du logo par défaut
        $logo = $balise_img(find_in_path($logo_par_defaut), '', $class);
    }
    return $logo;
}

/**
 * Ajouter un logo nommé "logo_defaut.xxx" dans le dossier IMG
 *
 * @param mixed $file
 * @access public
 */
function logodefaut_uploader() {

   include_spip('action/editer_logo');
    // Version SPIP 3.1 de cette fonction:
   if (function_exists('logo_modifier'))
        return logo_modifier('logo_', '', 'defaut', $_FILES['logodefaut']['tmp_name']);

   // Spip 3.0
   include_spip('action/iconifier');
   $ajouter_image = charger_fonction('spip_image_ajouter','action');

    // Dans le cas d'un tableau, on présume que c'est un $_FILES et on passe directement
    $err = $ajouter_image('logo_defaut'," ", $_FILES['logodefaut'], true);

    if ($err)
        return $err;
    else
        return true;
}