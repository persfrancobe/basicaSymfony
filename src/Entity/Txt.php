<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TxtRepository")
 */
class Txt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locale;

    /**
     * @ORM\Column(type="text")
     */
    private $en;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $nl;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ge;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $it;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sp;

    public function __toString()
    {
        return $this->fr;
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
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return \App\Entity\Txt
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

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
     * @return \App\Entity\Txt
     */
    public function setEn(string $en): self
    {
        $this->en = $en;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFr(): ?string
    {
        return $this->fr;
    }

    /**
     * @param null|string $fr
     * @return \App\Entity\Txt
     */
    public function setFr(?string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNl(): ?string
    {
        return $this->nl;
    }

    /**
     * @param null|string $nl
     * @return \App\Entity\Txt
     */
    public function setNl(?string $nl): self
    {
        $this->nl = $nl;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getGe(): ?string
    {
        return $this->ge;
    }

    /**
     * @param null|string $ge
     * @return \App\Entity\Txt
     */
    public function setGe(?string $ge): self
    {
        $this->ge = $ge;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getIt(): ?string
    {
        return $this->it;
    }

    /**
     * @param null|string $it
     * @return \App\Entity\Txt
     */
    public function setIt(?string $it): self
    {
        $this->it = $it;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSp(): ?string
    {
        return $this->sp;
    }

    /**
     * @param null|string $sp
     * @return \App\Entity\Txt
     */
    public function setSp(?string $sp): self
    {
        $this->sp = $sp;

        return $this;
    }
}