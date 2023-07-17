<?php
class User {

    private ?int $id;
    private string $email;
    private string $firstName;
    private string $lastName;
    
    public function __construct(string $firstName, string $lastName, string $email){
        $this->id = null;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->lastName = $lastName;
    }
    public function getId() :? int
    {
        return $this->id;
    }
    public function getFirstName() : string
    {
        return $this->firstName;
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    public function getLastName() : string
    {
        return $this->lastName;
    }
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }
}

?>