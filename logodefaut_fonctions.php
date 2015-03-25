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
function logo_par_defaut($logo) {
    if (empty($logo)) {
        include_spip('inc/config');
        $config = lire_config('logodefaut');

        // Si la config demande le SPIP logo commen logo par défaut, on l'utilise
        if (isset($config['logo_du_site']) and $config['logo_du_site']) {
            $chercher_logo = charger_fonction('chercher_logo', 'inc');
            $logo_par_defaut = $chercher_logo(0, 'site');
            $logo_par_defaut = $logo_par_defaut[0];
        }
        $balise_img = charger_filtre('balise_img');
        $logo = $balise_img(find_in_path('img/logo_defaut.png'), '', 'spip_logos');
    }
    return $logo;
}