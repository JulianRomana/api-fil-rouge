<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Quest;

use Symfony\Component\Routing\Annotation\Route;

/**
 * @ApiResource()
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
