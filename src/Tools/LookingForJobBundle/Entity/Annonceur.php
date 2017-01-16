<?php

namespace Tools\LookingForJobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonceur
 *
 * @ORM\Table(name="annonceur")
 * @ORM\Entity(repositoryClass="Tools\LookingForJobBundle\Repository\AnnonceurRepository")
 */
class Annonceur
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
     * @ORM\Column(name="Entreprise", type="string", length=255)
     */
    private $entreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_nom_prenom", type="string", length=255, nullable=true)
     */
    private $contactNomPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=255, nullable=true)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_fixe", type="string", length=255, nullable=true)
     */
    private $contactFixe;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_portable", type="string", length=255, nullable=true)
     */
    private $contactPortable;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text", nullable=true)
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text", nullable=true)
     */
    private $commentaires;


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
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Annonceur
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Annonceur
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
     * Set contactNomPrenom
     *
     * @param string $contactNomPrenom
     *
     * @return Annonceur
     */
    public function setContactNomPrenom($contactNomPrenom)
    {
        $this->contactNomPrenom = $contactNomPrenom;

        return $this;
    }

    /**
     * Get contactNomPrenom
     *
     * @return string
     */
    public function getContactNomPrenom()
    {
        return $this->contactNomPrenom;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return Annonceur
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set contactFixe
     *
     * @param string $contactFixe
     *
     * @return Annonceur
     */
    public function setContactFixe($contactFixe)
    {
        $this->contactFixe = $contactFixe;

        return $this;
    }

    /**
     * Get contactFixe
     *
     * @return string
     */
    public function getContactFixe()
    {
        return $this->contactFixe;
    }

    /**
     * Set contactPortable
     *
     * @param string $contactPortable
     *
     * @return Annonceur
     */
    public function setContactPortable($contactPortable)
    {
        $this->contactPortable = $contactPortable;

        return $this;
    }

    /**
     * Get contactPortable
     *
     * @return string
     */
    public function getContactPortable()
    {
        return $this->contactPortable;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Annonceur
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set commentaires
     *
     * @param string $commentaires
     *
     * @return Annonceur
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return string
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}

