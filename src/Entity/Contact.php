<?php

namespace App\Entity;

class Contact
{
    private $nom;

    private $telefon;

    private $email;

    private $missatge;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param mixed $telefon
     * @return Contact
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMissatge()
    {
        return $this->missatge;
    }

    /**
     * @param mixed $missatge
     * @return Contact
     */
    public function setMissatge($missatge)
    {
        $this->missatge = $missatge;
        return $this;
    }

}