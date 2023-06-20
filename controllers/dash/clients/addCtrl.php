<?php
$style = 'dash';
$pageTitle = '- Dashboard | Ajout Clients';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // ---------------- VERIFICATIONS -------------------


        //===================== Client Firstname : Nettoyage et validation =======================
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($firstname)) {
            $error["firstname"] = "Vous devez entrer un prénom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["firstname"] = "Le prénom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                    $error["firstname"] = "La longueur du prénom est incorrecte";
                }
            }
        }


        //===================== Client Lastname : Nettoyage et validation =======================
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($lastname)) {
            $error["lastname"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["lastname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                    $error["lastname"] = "La longueur du nom est incorrecte";
                }
            }
        }


        //===================== Partner Firstname : Nettoyage et validation =======================
        $partnerFirstname = trim(filter_input(INPUT_POST, 'partnerFirstname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($partnerFirstname)) {
            $error["partnerFirstname"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($partnerFirstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["partnerFirstname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($partnerFirstname) <= 2 || strlen($partnerFirstname) >= 70) {
                    $error["partnerFirstname"] = "La longueur du nom est incorrecte";
                }
            }
        }


        //===================== Partner Lastname : Nettoyage et validation =======================
        $partnerLastname = trim(filter_input(INPUT_POST, 'partnerLastname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($partnerLastname)) {
            $error["partnerLastname"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($partnerLastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["partnerLastname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($partnerLastname) <= 2 || strlen($partnerLastname) >= 70) {
                    $error["partnerLastname"] = "La longueur du nom est incorrecte";
                }
            }
        }


        //===================== email : Nettoyage et validation =======================
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
        if (empty($mail)) {
            $error["mail"] = "L'adresse mail est obligatoire!!";
        } else {
            $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            if (!$testMail) {
                $error["mail"] = "L'adresse email n'est pas au bon format!!";
            }
        }


        //===================== phone : Nettoyage et validation =======================
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($phone)) {
            $error["phone"] = "Le numéro de téléphone est obligatoire!!";
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PHONE_PATTERN . '/')));
            if (!$isOk) {
                $error["phone"] = "Le numéro de téléphone n'est pas au bon format!!";
            }
        }


        //===================== Adresse : Nettoyage =======================
        $address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($address)) {
            $error["address"] = "Vous devez entrer une adresse !";
        }


        //===================== zipCode : Nettoyage et validation =======================
        $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($zip)) {
            $isOk = filter_var($zip, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
            if (!$isOk) {
                $error["zip"] = "Vous devez entrer un code postal valide";
            }
        }


        //===================== Ville : Nettoyage  =======================
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($city)) {
            $error["city"] = "Vous devez entrer une adresse !";
        }


        //===================== Role : Nettoyage  =======================
        $role = trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));
        if ($role != 1) {
            $role = 0;
        }


        if (empty($error)) {
            if (User::isExist($mail) == NULL) {
                
                $user = new User($lastname, $firstname, $phone, $mail, $address, $zip, $city, $role, $partnerLastname, $partnerFirstname);
                var_dump($user);
                $isAdded = $user->add();
                if ($isAdded) {
                    $msg['add'] = '👍 Client ajouté';
                }
            } else {
                $msg['add'] = 'Erreur pendant l\'ajout';
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/clients/add.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';