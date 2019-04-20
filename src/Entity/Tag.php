<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Work", mappedBy="tags")
     */
    private $works;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $Description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     */
    private $Image;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->works = new ArrayCollection();
        $this->date=new  \DateTime();
    }

    /**
     * @return mixed
     */
    public function __toString()  : string
    {
        return $this->name;
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|\DateTimeInterface
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return \App\Entity\Tag
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return \App\Entity\Tag
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Work[]
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    /**
     * @param \App\Entity\Work $work
     * @return \App\Entity\Tag
     */
    public function addWork(Work $work): self
    {
        if (!$this->works->contains($work)) {
            $this->works[] = $work;
            $work->addTag($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Work $work
     * @return \App\Entity\Tag
     */
    public function removeWork(Work $work): self
    {
        if ($this->works->contains($work)) {
            $this->works->removeElement($work);
            $work->removeTag($this);
        }

        return $this;
    }

    /**
     * @return Collection|Txt[]
     */
    public function getTxts(): Collection
    {
        return $this->txts;
    }

    /**
     * @param \App\Entity\Txt $txt
     * @return \App\Entity\Tag
     */
    public function addTxt(Txt $txt): self
    {
        if (!$this->txts->contains($txt)) {
            $this->txts[] = $txt;
            $txt->setTag($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Txt $txt
     * @return \App\Entity\Tag
     */
    public function removeTxt(Txt $txt): self
    {
        if ($this->txts->contains($txt)) {
            $this->txts->removeElement($txt);
            // set the owning side to null (unless already changed)
            if ($txt->getTag() === $this) {
                $txt->setTag(null);
            }
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \App\Entity\Tag
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|\App\Entity\Txt
     */
    public function getDescription(): ?Txt
    {
        return $this->Description;
    }

    /**
     * @param null|\App\Entity\Txt $Description
     * @return \App\Entity\Tag
     */
    public function setDescription(?Txt $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return null|\App\Entity\Image
     */
    public function getImage(): ?Image
    {
        return $this->Image;
    }

    /**
     * @param null|\App\Entity\Image $Image
     * @return \App\Entity\Tag
     */
    public function setImage(?Image $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
}
