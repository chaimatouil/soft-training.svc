<?php


class ProductEntity
{

    protected $idProduct;

    protected $name;

    protected $domaine_realise;

    protected $tache_realisee;

    protected $image;

    protected $createdAt;

    function getIdProduct()
    {
        return $this->idProduct;
    }

    function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getDomaine_realise()
    {
        return $this->domaine_realise;
    }

    function setDomaine_realise($domaine_realise)
    {
        $this->domaine_realise = $domaine_realise;
    }

    function getTache_realisee()
    {
        return $this->tache_realisee;
    }

    function setTache_realisee($tache_realisee)
    {
        $this->tache_realisee = $tache_realisee;
    }


    function getImage()
    {
        return $this->image;
    }

    function setImage($image)
    {
        $this->image = $image;
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