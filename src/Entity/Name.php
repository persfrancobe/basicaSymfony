<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NameRepository")
 */
class Name
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $en;

    /**
     * @Gedmo\Slug(fields={"fr"})
     * @ORM\Column(type="string", length=255)
     */
    private $slugEn;

    /**
     * @Gedmo\Slug(fields={"en"})
     * @ORM\Column(type="string", length=255)
     */
    private $slugFr;

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getFr();
    }

    /**
     * @param string $locale
     * @return null|string
     */
    public function getContent(string $locale='fr'): ?string
    {
        switch ($locale){
            case 'fr':return $this->getFr();break;
            case 'en':return $this->getEn();break;
            default:return $this->getFr();break;
        }
    }

    /**
     * @param string $locale
     * @return null|string
     */
    public function getSlug(string $locale='fr'): ?string
    {
        switch ($locale){
            case 'fr':return $this->getSlugFr();break;
            case 'en':return $this->getSlugEn();break;
            default:return $this->getSlugFr();break;
        }
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getFr(): ?string
    {
        return $this->fr;
    }

    /**
     * @param string $fr
     * @return \App\Entity\Name
     */
    public function setFr(string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEn(): ?string
    {
        return $this->en;
    }

    /**
     * @param string $en
     * @return \App\Entity\Name
     */
    public function setEn(string $en): self
    {
        $this->en = $en;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSlugEn(): ?string
    {
        return $this->slugEn;
    }

    /**
     * @param string $slugEn
     * @return \App\Entity\Name
     */
    public function setSlugEn(string $slugEn): self
    {
        $this->slugEn = $slugEn;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSlugFr(): ?string
    {
        return $this->slugFr;
    }

    /**
     * @param string $slugFr
     * @return \App\Entity\Name
     */
    public function setSlugFr(string $slugFr): self
    {
        $this->slugFr = $slugFr;

        return $this;
    }
}
