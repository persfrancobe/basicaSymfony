<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Name", cascade={"persist", "remove"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Blog", mappedBy="categories")
     */
    private $blogs;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->date=new \DateTime();
        $this->blogs = new ArrayCollection();

    }

    /**
     * @return string
     */
    public function __toString() :string
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
     * @return \App\Entity\Category
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
     * @return \App\Entity\Category
     */
    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setCategory($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Image $image
     * @return \App\Entity\Category
     */
    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getCategory() === $this) {
                $image->setCategory(null);
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
     * @return \App\Entity\Category
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
     * @return \App\Entity\Category
     */
    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Blog[]
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    /**
     * @param \App\Entity\Blog $blog
     * @return \App\Entity\Category
     */
    public function addBlog(Blog $blog): self
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs[] = $blog;
            $blog->addCategory($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Blog $blog
     * @return \App\Entity\Category
     */
    public function removeBlog(Blog $blog): self
    {
        if ($this->blogs->contains($blog)) {
            $this->blogs->removeElement($blog);
            $blog->removeCategory($this);
        }

        return $this;
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

}
