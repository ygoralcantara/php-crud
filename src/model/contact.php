<?php

namespace MyApp\Model;

/**
 * Contact Model
 */
class Contact {

    /**
     * Contact ID - Primary Key
     * @var int
     */
    private $id;

    /**
     * Contact name
     * @var string
     */
    private $name;

    /**
     * Contact email
     * @var string
     */
    private $email;

    /**
     * Contact Cellphone
     * @var string
     */
    private $cellphone;

    /**
     * Timestamp contact created on
     * @var string
     */
    private $created_on;

    /**
     * Timestamp contact update on
     * @var string
     */
    private $update_on;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $cellphone
     * @param string $created_on
     * @param string $update_on
     */
    public function __construct($id = null, $name, $email, $cellphone, $created_on, $update_on)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->cellphone = $cellphone;
        $this->created_on = $created_on;
        $this->update_on = $update_on;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * @param string $cellphone
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    /**
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }

    /**
     * @param string $created_on
     */
    public function setCreatedOn($created_on)
    {
        $this->created_on = $created_on;
    }

    /**
     * @return string
     */
    public function getUpdateOn(): string
    {
        return $this->update_on;
    }

    /**
     * @param string $update_on
     */
    public function setUpdateOn(string $update_on)
    {
        $this->update_on = $update_on;
    }


}

?>
