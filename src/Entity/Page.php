<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     * @Assert\Regex(pattern="/[a-z][a-z0-9\-]*$/")
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
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $bigTitle;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $title;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Txt", cascade={"persist", "remove"})
     */
    private $subtitle;

    /**
     * @ORM\Column(type="text",nullable=true)
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

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return null|Page
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

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
