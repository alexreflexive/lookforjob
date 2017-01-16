<?php

namespace Tools\LookingForJobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Source
 *
 * @ORM\Table(name="source")
 * @ORM\Entity(repositoryClass="Tools\LookingForJobBundle\Repository\SourceRepository")
 */
class Source
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var bool
     *
     * @ORM\Column(name="cv_document", type="boolean")
     */
    private $cvDocument;

    /**
     * @var bool
     *
     * @ORM\Column(name="cv_formulaire", type="boolean")
     */
    private $cvFormulaire;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Source
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Source
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set cvDocument
     *
     * @param boolean $cvDocument
     *
     * @return Source
     */
    public function setCvDocument($cvDocument)
    {
        $this->cvDocument = $cvDocument;

        return $this;
    }

    /**
     * Get cvDocument
     *
     * @return bool
     */
    public function getCvDocument()
    {
        return $this->cvDocument;
    }

    /**
     * Set cvFormulaire
     *
     * @param boolean $cvFormulaire
     *
     * @return Source
     */
    public function setCvFormulaire($cvFormulaire)
    {
        $this->cvFormulaire = $cvFormulaire;

        return $this;
    }

    /**
     * Get cvFormulaire
     *
     * @return bool
     */
    public function getCvFormulaire()
    {
        return $this->cvFormulaire;
    }
}

