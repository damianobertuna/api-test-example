<?php


class Contact
{
    /**
     * @var void
     */
    private $dbconn;

    /**
     * Contact constructor.
     * @param void $dbconn
     */
    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function getAllContacts()
    {
        $query = "SELECT name, lastname, phone_number, email FROM contacts";
        return mysqli_query($this->dbconn, $query);
    }

    public function createContact($name, $lastname, $phonenumber, $email)
    {
        if ($name == "" || $lastname == "" || $phonenumber == "" || $email == "")
            return "all fields are required";

        $name = mysqli_real_escape_string($this->dbconn, $name);
        $lastname = mysqli_real_escape_string($this->dbconn, $lastname);
        $phonenumber = mysqli_real_escape_string($this->dbconn, $phonenumber);
        $email = mysqli_real_escape_string($this->dbconn, $email);
        $query = "INSERT INTO contacts (name, lastname, phone_number, email) VALUES ('$name', '$lastname', '$phonenumber', '$email')";

        if ($this->dbconn->query($query)) {
            return "Insert ok";
        }
        return "an error occurred creating new contact";
    }
}