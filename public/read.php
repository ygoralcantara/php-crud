<?php

require_once("../includes/autoload.php");
require_once("../src/config.php");

use MyApp\Service\ContactService;

$contactService = ContactService::getInstance();

$contacts = $contactService->getAll();

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Home</title>

    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2 class="text-center mt-5">Contacts Agenda</h2>

                <?php include_once('alerts.php') ?>

                <a type="button" class="btn btn-primary" href="create.php" role="button">Add Contact</a>

                <table class="table table-bordered table-striped text-center mt-5 shadow-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Cellphone</th>
                            <th>Email</th>
                            <th>Created on</th>
                            <th>Update on</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td> <?php echo $contact->getId() ?> </td>
                            <td> <?php echo $contact->getName() ?> </td>
                            <td> <?php echo $contact->getCellphone() ?> </td>
                            <td> <?php echo $contact->getEmail() ?> </td>
                            <td> <?php echo date('d/m/Y', strtotime($contact->getCreatedOn())) ?> </td>
                            <td> <?php echo date('d/m/Y', strtotime($contact->getUpdateOn())) ?> </td>
                            <td> <a href="update.php?ID=<?php echo $contact->getId() ?>" type="button" class="btn btn-info btn-sm"><i class="material-icons">create</i></a> </td>
                            <td> <a href="delete.php?ID=<?php echo $contact->getId() ?>" type="button" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a> </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </body>
</html>
