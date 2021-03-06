<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ApiResource(
 *   collectionOperations={"POST", "GET"},
 *   itemOperations={"GET", "PUT"},
 *   normalizationContext={"groups"={"uq", "uq:read"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *   "user_id": "exact"
 *   })
 * @ORM\Entity(repositoryClass="App\Repository\UserQuestRepository")
 */
class UserQuest
{
  /**
   * @var int
   * @Groups({"uq:read"})
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Id
   */
  private $id;

  /**
   * @Groups({"uq:read, uq:write"})
   * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userQuests")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user_id;

  /**
   * @Groups({"uq:read, uq:write"})
   * @ORM\ManyToOne(targetEntity="App\Entity\Quest", inversedBy="userQuests")
   * @ORM\JoinColumn(nullable=false)
   */
  private $quest_id;

  /**
   * @Groups({"uq:read, uq:write"})
   * @ORM\Column(type="string")
   */
  private $Status;

  /**
   * @Groups({"uq:read"})
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $date;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUserId(): ?User
  {
      return $this->user_id;
  }

  public function setUserId(?User $user_id): self
  {
      $this->user_id = $user_id;

      return $this;
  }

  /**
   * @Groups({"uq:read"})
   */
  public function getQuestId(): ?Quest
  {
      return $this->quest_id;
  }

  public function setQuestId(?Quest $quest_id): self
  {
      $this->quest_id = $quest_id;

      return $this;
  }

  /**
   * @Groups({"uq:read"})
   */
  public function getStatus(): ?string
  {
      return $this->Status;
  }

  public function setStatus(string $Status): self
  {
      $this->Status = $Status;

      return $this;
  }

  /**
   * @Groups({"uq:read"})
   */
  public function getDate(): ?string
  {
      return $this->date;
  }

  public function setDate(?string $date): self
  {
      $this->date = $date;

      return $this;
  }
}
