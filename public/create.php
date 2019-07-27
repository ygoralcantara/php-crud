<?php

require_once("../includes/autoload.php");
require_once("../src/config.php");

use MyApp\Model\Contact;
use MyApp\Service\ContactService;

if (isset($_POST['submit-btn'])) {
    $contactService = ContactService::getInstance();

    $timestamp = date("Y-m-d H:i:s", time());

    $contact = new Contact(null, $_POST['name'], $_POST['email'], $_POST['cellphone'], $timestamp, $timestamp);

    $contact = $contactService->create($contact);

    session_start();

    $_SESSION['create_success'] = "YES";
    $_SESSION['name'] = $contact->getName();

    header('Location: read.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Create Contact</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow-lg mt-5 rounded">
                        <div class="card-body">
                            <h4 class="card-title text-center mt-3">New Contact</h4>
                            <!-- Form Input Contact -->
                            <form action="" method="post" class="mt-5" id="form1">
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-sm-2">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-form-label col-sm-2">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cellphone" class="col-form-label col-sm-2">Cellphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="cellphone" class="form-control" placeholder="Format: (00) 90000-0000" name="cellphone" required>
                                    </div>
                                </div>
                            </form>
                            <div class="mx-auto" style="width: 150px;">
                                <a href="read.php" type="button" class="btn btn-danger">Go Back</a>
                                <button type="submit" name="submit-btn" form="form1" class="btn btn-primary mx-auto">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
