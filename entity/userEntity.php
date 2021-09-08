<?php

class UserEntity
{

    protected $idUser;

    protected $Nom_societe;

    protected $Abreviations;

    protected $Adresse;

    protected $Tel;

    protected $Email;

    protected $Secteur;


    protected $createdAt;

    function getIdUser()
    {
        return $this->idUser;
    }

    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    function getNom_societe()
    {
        return $this->Nom_societe;
    }

    function setNom_societe($Nom_societe)
    {
        $this->Nom_societe = $Nom_societe;
    }

    function getAbreviations()
    {
        return $this->Abreviations;
    }

    function setAbreviations($Abreviations)
    {
        $this->Abreviations = $Abreviations;
    }

    function getAdresse()
    {
        return $this->Adresse;
    }

    function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
    }

    function getTel()
    {
        return $this->Tel;
    }

    function setTel($Tel)
    {
        $this->Tel = $Tel;
    }

    function getEmail()
    {
        return $this->Email;
    }

    function setEmail($Email)
    {
        $this->Email = $Email;
    }

    function getSecteur()
    {
        return $this->Secteur;
    }

    function setSecteur($Secteur)
    {
        $this->Secteur = $Secteur;
    }

    function getCreatedAt()
    {
        return $this->createdAt;
    }

    function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}