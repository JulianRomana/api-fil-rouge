<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Quest;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   collectionOperations={"GET", "POST"},
 *   itemOperations={"GET", "PUT"},
 *   normalizationContext={"groups"={"uq", "uq:read"}},
 *   denormalizationContext={"groups"={"uq", "uq:write"}}
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
   *
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Id
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userQuests")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user_id;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Quest", inversedBy="userQuests")
   * @ORM\JoinColumn(nullable=false)
   */
  private $quest_id;

  /**
   * @Groups({"uq:read"})
   * @ORM\Column(type="string")
   */
  private $Status;

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

  public function getStatus(): ?string
  {
      return $this->Status;
  }

  public function setStatus(string $Status): self
  {
      $this->Status = $Status;

      return $this;
  }

}
