<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $housNo;

    /**
     * @ORM\Column(type="string", length=255,nullable=True)
     */
    private $postCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Work", mappedBy="user")
     */
    private $works;

    public function __construct()
    {
        parent::__construct();
        $this->works = new ArrayCollection();
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return \App\Entity\User
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return \App\Entity\User
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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
     * @return \App\Entity\User
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return \App\Entity\User
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return \App\Entity\User
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHousNo(): ?string
    {
        return $this->housNo;
    }

    /**
     * @param string $housNo
     * @return \App\Entity\User
     */
    public function setHousNo(string $housNo): self
    {
        $this->housNo = $housNo;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return \App\Entity\User
     */
    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return Collection|Work[]
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    public function addWork(Work $work): self
    {
        if (!$this->works->contains($work)) {
            $this->works[] = $work;
            $work->setUser($this);
        }

        return $this;
    }

    public function removeWork(Work $work): self
    {
        if ($this->works->contains($work)) {
            $this->works->removeElement($work);
            // set the owning side to null (unless already changed)
            if ($work->getUser() === $this) {
                $work->setUser(null);
            }
        }

        return $this;
    }
}
