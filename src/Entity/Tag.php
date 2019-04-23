<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     *  @Assert\NotBlank()
     * @Assert\Regex(pattern="/[a-z][a-z0-9\-]*$/",message="slug peut contenir que des lettre et des chifres et tire merci")
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Work", mappedBy="tags")
     */
    private $works;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
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
        return $this->getName();
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

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}
