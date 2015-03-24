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
        $balise_img = charger_filtre('balise_img');
        $logo = $balise_img(find_in_path('img/logo_defaut.png'), '', 'spip_logos');
    }
    return $logo;
}