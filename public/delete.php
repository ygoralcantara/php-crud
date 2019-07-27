<?php

require_once("../includes/autoload.php");
require_once("../src/config.php");

use MyApp\Service\ContactService;

$contactService = ContactService::getInstance();

session_start();

if (isset($_GET['ID'])) {
    $contact = $contactService->getById($_GET['ID']);

    if (empty($contact)) {
        $_SESSION['error_contact_empty'] = "YES";
        $_SESSION['Contact_ID'] = $_GET['ID'];

        header('Location: read.php');
    }

} else {
    $_SESSION['error_id_empty'] = "YES";

    header('Location: read.php');
}

$contactService->delete($contact->getId());

$_SESSION['delete_success'] = "YES";
$_SESSION['name'] = $contact->getName();

header('Location: read.php');

?>
