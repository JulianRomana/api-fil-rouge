<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  itemOperations={"GET"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\QuestRepository")
 * @ORM\Table(name="quest")
 */
class Quest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"uq:read"})
     */
    private $id;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $duration;

    /**
     * @Groups({"uq:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserQuest", mappedBy="quest_id", orphanRemoval=true)
     */
    private $userQuests;

    public function __construct()
    {
        $this->userQuests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|UserQuest[]
     */
    public function getUserQuests(): Collection
    {
        return $this->userQuests;
    }

    public function addUserQuest(UserQuest $userQuest): self
    {
        if (!$this->userQuests->contains($userQuest)) {
            $this->userQuests[] = $userQuest;
            $userQuest->setQuestId($this);
        }

        return $this;
    }

    public function removeUserQuest(UserQuest $userQuest): self
    {
        if ($this->userQuests->contains($userQuest)) {
            $this->userQuests->removeElement($userQuest);
            // set the owning side to null (unless already changed)
            if ($userQuest->getQuestId() === $this) {
                $userQuest->setQuestId(null);
            }
        }

        return $this;
    }
}
