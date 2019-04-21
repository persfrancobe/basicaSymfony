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

    /**
     * @ORM\Column(type="string",length=55,nullable=true)
     */
    private $type;

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->fr;
    }

    /**
     * @return mixed
     */
    public function getType():string
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return string
     */
    public function setType($type): string
    {
        $this->type = $type;
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @param string $locale
     * @return null|string
     */
    public function getContent(string $locale='fr'): ?string
    {
        switch ($locale){
            case 'fr':return $this->fr;break;
            case 'en':return $this->en;break;
            case 'nl':return $this->nl;break;
            case 'it':return $this->it;break;
            case 'sp':return $this->sp;break;
            default:return $this->fr;break;
        }
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