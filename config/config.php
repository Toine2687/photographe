<?php

define("NAME_PATTERN", "^[A-Za-zéçèê'ù\-]{2,20}[ |\-]{0,1}[A-Za-zéèçê'ù\-]{2,20}$");
define('REGEX_NO_NUMBER', "^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('PHONE_PATTERN', '^[0-9\+\-]{10,18}$');
define('REGEX_ZIPCODE', '^[0-9]{5}$');
define('REGEX_DATE', '^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_TEXTAREA', '^[a-zA-Z\n\r]*$');

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);

// Connexion
define("DSN", 'mysql:host=localhost;dbname=photo');
define("USER", 'photoadmin');
define("PASSWORD", '@-nR3O8(TJ(yPrv_');

//Génération de mot de passe aléatoire uniquement à l'envoi du mail pour avertir que la galerie est prête.
//stockage en variable, insertion de la variable dans le corps du mail avec hashage en mise en bdd juste avant.
class PWD
{
    public static function set(): string
    {
        $pwd = bin2hex(openssl_random_pseudo_bytes(8));
        $pwd_array = str_split($pwd);
        $specials = array('&', 'é', 'A', 'V', '-', 'è', '_', 'ç', '*', 'L', 'P', '!', 'I', 'B', 'Q');
        $pwd_array[random_int(0, 14)] = $specials[random_int(0, 14)];
        $pwd = implode('', $pwd_array);
        return $pwd;
    }
}
