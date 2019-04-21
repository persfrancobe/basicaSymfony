<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
 */
class Blog
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $suiteText;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="blogs")
     */
    private $categories;

    /**
     * Blog constructor.
     */
    public function __construct()
    {
        $this->comments = rand(2,45);
        $this->Categories = new ArrayCollection();
        $this->date=new \DateTime();
        $this->categories = new ArrayCollection();
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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \App\Entity\Blog
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
     * @return \App\Entity\Blog
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments): void
    {
        $this->comments = $comments;
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
     * @return \App\Entity\Blog
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return \App\Entity\Blog
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

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
     * @return \App\Entity\Blog
     */
    public function setDescription(?Txt $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return null|\App\Entity\Txt
     */
    public function getSuiteText(): ?Txt
    {
        return $this->suiteText;
    }

    /**
     * @param null|\App\Entity\Txt $suiteText
     * @return \App\Entity\Blog
     */
    public function setSuiteText(?Txt $suiteText): self
    {
        $this->suiteText = $suiteText;

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
     * @return \App\Entity\Blog
     */
    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }
}
