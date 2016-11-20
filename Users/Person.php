<?php
namespace Users;

interface Person{
    public function getName();
    public function setName($name);
    public function getAge();
    public function setAge($age);
}