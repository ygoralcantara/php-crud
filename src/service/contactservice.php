<?php

namespace MyApp\Service;

use PDO;
use PDOException;
use MyApp\Model\Contact;
/**
 * Contact Service class
 */
class ContactService {

    /**
     * PDO Connection
     * @var PDO
     */
    private $conn;

    /**
     * ContactService Instace - Singleton Pattern
     * @var object
     */
    private static $instance;

    /**
     * Contact Service Construct
     */
    private function __construct() {
        try {
            $this->conn = Database::getConnection();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Singleton Pattern
     * @return object return only one instance of Contact Service
     */
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new ContactService();
        }
        return self::$instance;
    }

    /**
     * Get All Contacts from database
     * @return array all contacts
     */
    public function getAll() {
        $contacts = array();

        try {
            $result = $this->conn->query("select * from contacts;")->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        foreach ($result as $row) {
            $contact = new Contact($row['id'], $row['name'], $row['email'], $row['cellphone'], $row['created_on'], $row['update_on']);

            array_push($contacts, $contact);
        }

        return $contacts;
    }

    /**
     * Get One Contact By Column ID from Database
     * @param  int $id Contact ID to search in database
     * @return object Contact Object
     */
    public function getById($id) {
        $stmt = $this->conn->prepare("select * from contacts where id = :id");

        try {
            $stmt->execute(array('id' => $id));
            $result = $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return (empty($result)) ? null : new Contact($result['id'], $result['name'], $result['email'], $result['cellphone'], $result['created_on'], $result['update_on']);
    }

    /**
     * Create a Contact row in Database
     * @param  Contact $contact
     * @return Contact Return Contact with Generated ID from Database
     */
    public function create(Contact $contact) {
        $stmt = $this->conn->prepare("insert into contacts (name, email, cellphone, created_on, update_on) values (:name, :email, :cellphone, :created_on, :update_on)");

        try {
            $stmt->execute(array(
                ':name' => $contact->getName(),
                ':email' => $contact->getEmail(),
                ':cellphone' => $contact->getCellphone(),
                ':created_on' => $contact->getCreatedOn(),
                ':update_on' => $contact->getUpdateOn()
            ));

            $contact->setId($this->conn->lastInsertId());

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $contact;
    }

    /**
     * Update a Contact row in Database
     * @param  Contact $contact
     */
    public function update(Contact $contact) {
        $stmt = $this->conn->prepare("update contacts set name = :name, email = :email, cellphone = :cellphone, update_on = :update_on where id = :id");

        try {
            $stmt->execute(array(
                ':name' => $contact->getName(),
                ':email' => $contact->getEmail(),
                ':cellphone' => $contact->getCellphone(),
                ':update_on' => $contact->getUpdateOn(),
                ':id' => $contact->getId()
            ));

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Delete a Contact row in Database
     * @param  int    $id Column ID Contact
     */
    public function delete(int $id) {
        $stmt = $this->conn->prepare("delete from contacts where id = :id");

        try {
            $stmt->execute(array(':id' => $id));

        } catch (PDOException $e) {
            $e->getMessage();
        }

    }

    /**
     * Execute SQL Migration to Database
     */
    public function migration() {
        $sql_create_schema = file_get_contents(__DIR__ . "/../../sql/create_schema.sql");
        $sql_insert_data = file_get_contents(__DIR__ . "/../../sql/insert_data.sql");

        try {
            $this->conn->exec($sql_create_schema);
            $this->conn->exec($sql_insert_data);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
