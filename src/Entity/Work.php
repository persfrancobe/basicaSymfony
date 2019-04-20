<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkRepository")
 */
class Work
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
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="works")
     */
    private $tags;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * Work constructor.
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->date = new \DateTime();
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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \App\Entity\Work
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
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
     * @return \App\Entity\Work
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @param \App\Entity\Image $image
     * @return \App\Entity\Work
     */
    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setWork($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Image $image
     * @return \App\Entity\Work
     */
    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getWork() === $this) {
                $image->setWork(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param \App\Entity\Tag $tag
     * @return \App\Entity\Work
     */
    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    /**
     * @param \App\Entity\Tag $tag
     * @return \App\Entity\Work
     */
    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
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
     * @return \App\Entity\Work
     */
    public function addTxt(Txt $txt): self
    {
        if (!$this->txts->contains($txt)) {
            $this->txts[] = $txt;
            $txt->setWork($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Txt $txt
     * @return \App\Entity\Work
     */
    public function removeTxt(Txt $txt): self
    {
        if ($this->txts->contains($txt)) {
            $this->txts->removeElement($txt);
            // set the owning side to null (unless already changed)
            if ($txt->getWork() === $this) {
                $txt->setWork(null);
            }
        }

        return $this;
    }

    /**
     * @return null|\App\Entity\Txt
     */
    public function getDescription(): ?Txt
    {
        return $this->description;
    }

    /**
     * @param null|\App\Entity\Txt $description
     * @return \App\Entity\Work
     */
    public function setDescription(?Txt $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return null|\App\Entity\Image
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param null|\App\Entity\Image $image
     * @return \App\Entity\Work
     */
    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
