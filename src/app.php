<?php

namespace MyApp;

use MyApp\Service\ContactService;

/**
 * Bootstrap Application
 */
class App {

    /**
     * Method to run Application
     */
    public function run() {
        $contactService = ContactService::getInstance();

        $contactService->migration();

        header('Location: ../public/read.php');
    }
}

?>
