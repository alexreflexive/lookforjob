<?php

namespace Tools\LookingForJobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="Tools\LookingForJobBundle\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @ORM\ManyToOne(targetEntity="Tools\LookingForJobBundle\Entity\Annonceur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonceur;

    /**
     * @ORM\ManyToOne(targetEntity="Tools\LookingForJobBundle\Entity\Source")
     * @ORM\JoinColumn(nullable=false)
     */
    private $source;

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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="text")
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="date")
     */
    private $datePublication;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_dernier_contact", type="date")
     */
    private $dateDernierContact;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text")
     */
    private $commentaires;

    /**
     * @var int
     *
     * @ORM\Column(name="metier", type="integer")
     */
    private $metier;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    public function __construct()
    {
      // Par défaut, la date de l'annonce est la date d'aujourd'hui
      $date = new \Datetime();
      $this->datePublication = $date ;
      $this->dateDernierContact = $date ;
      $this->statut = 0 ;
    }

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Offre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Offre
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return Offre
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Offre
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set dateDernierContact
     *
     * @param \DateTime $dateDernierContact
     *
     * @return Offre
     */
    public function setDateDernierContact($dateDernierContact)
    {
        $this->dateDernierContact = $dateDernierContact;

        return $this;
    }

    /**
     * Get dateDernierContact
     *
     * @return \DateTime
     */
    public function getDateDernierContact()
    {
        return $this->dateDernierContact;
    }

    /**
     * Set metier
     *
     * @param integer $metier
     *
     * @return Offre
     */
    public function setMetier($metier)
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * Get metier
     *
     * @return int
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Offre
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Offre
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
     * Set commentaires
     *
     * @param string $commentaires
     *
     * @return Offre
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

    /**
     * Set annonceur
     *
     * @param \Tools\LookingForJobBundle\Entity\Annonceur $annonceur
     *
     * @return Offre
     */
    public function setAnnonceur(\Tools\LookingForJobBundle\Entity\Annonceur $annonceur)
    {
        $this->annonceur = $annonceur;

        return $this;
    }

    /**
     * Get annonceur
     *
     * @return \Tools\LookingForJobBundle\Entity\Annonceur
     */
    public function getAnnonceur()
    {
        return $this->annonceur;
    }

    /**
     * Set source
     *
     * @param \Tools\LookingForJobBundle\Entity\Source $source
     *
     * @return Offre
     */
    public function setSource(\Tools\LookingForJobBundle\Entity\Source $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return \Tools\LookingForJobBundle\Entity\Source
     */
    public function getSource()
    {
        return $this->source;
    }
}
