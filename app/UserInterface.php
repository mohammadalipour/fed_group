<?php


namespace App;


interface UserInterface
{
    public function setId(int $id);
    public function getId();
    public function setName(string $name);
    public function getName();
    public function setEmail(string $email);
    public function getEmail();
    public function setPassword(string $password);
    public function getPassword();
}
