<?php

namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $name;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $bigTitle;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $title;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->date=new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getBigTitle()
    {
        return $this->bigTitle;
    }

    /**
     * @param mixed $bigTitle
     * @return Page
     */
    public function setBigTitle($bigTitle)
    {
        $this->bigTitle = $bigTitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     * @return Page
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
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
     * @return \App\Entity\Page
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @return \App\Entity\Page
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return \App\Entity\Page
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

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
     * @return \App\Entity\Page
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return \App\Entity\Page
     */
    public function setType(string $type): self
    {
        $this->type = $type;

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
     * @return \App\Entity\Page
     */
    public function addTxt(Txt $txt): self
    {
        if (!$this->txts->contains($txt)) {
            $this->txts[] = $txt;
            $txt->setPage($this);
        }

        return $this;
    }

    /**
     * @param \App\Entity\Txt $txt
     * @return \App\Entity\Page
     */
    public function removeTxt(Txt $txt): self
    {
        if ($this->txts->contains($txt)) {
            $this->txts->removeElement($txt);
            // set the owning side to null (unless already changed)
            if ($txt->getPage() === $this) {
                $txt->setPage(null);
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
     * @return \App\Entity\Page
     */
    public function setDescription(?Txt $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
