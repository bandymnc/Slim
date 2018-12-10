<?php

class StudentEntity
{
protected $id;
protected $firstName;
protected $lastName;
protected $email;
protected $age;
protected $postCode;

public function _consturct(array $data)
{
    if(isset($data['id'])){
        $this->id=$data['id'];
    }

    $this->firstName=$data['vezeteknev'];
    $this->lastName=$data['keresztnev'];
    $this->email=$data['email'];
    $this->age=$data['kor'];
    $this->postCode=$data['irszamid'];
}
public function getId()
{
    return $this->id;
}
public function getFirstName()
{
    return $this->firstName;
}
public function getLastName()
{
    return $this->lastName;
}
public function getEmail()
{
    return $this->email;
}
public function getAge()
{
    return $this->age;
}
public function getPostCode()
{
    return $this->getPostCode;
}
}
?>
