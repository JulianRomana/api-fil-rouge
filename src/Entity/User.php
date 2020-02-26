<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *   collectionOperations={"GET", "POST"},
 *   itemOperations={"GET", "DELETE"},
 *   normalizationContext={"groups"={"user", "user:read"}},
 *   denormalizationContext={"groups"={"user", "user:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *   "username": "exact"
 *   })
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
#@ORM\ManyToMany(targetEntity="App\Entity\Group")

  /**
   * @Groups({"user"}),
   * @ORM\JoinTable(name="fos_group",
   *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
   *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
   * )
   */
  protected $username;
  /**
   * @Groups({"user"})
   */
  protected $email;
  /**
   * @Groups({"user:write"})
   */
  protected $password;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\UserQuest", mappedBy="user_id", orphanRemoval=true)
   */
  private $userQuests;
  /**
   * @var bool
   */
  protected $enabled = 1;

  /**
   * @param mixed $enabled
   */
  public function setEnabled($enabled): void
  {
    $this->enabled = 1;
  }

  public function __construct()
  {
      parent::__construct();
      $this->userQuests = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUsername(): ?string
  {
    return $this->username;
  }

  public function __setUsername(string $username): self
  {
    $this->username = $username;
    return $this;
  }

  public function getFullName(): ?string
  {
    return $this->fullName;
  }

  public function __FullName(string $fullName): self
  {
    $this->fullName = $fullName;
    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function __setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  public function getPassword(): ?string
  {
    return $this->password;
  }

  public function __setPassword(string $password): self
  {
    $this->password = $password;

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
          $userQuest->setUserId($this);
      }

      return $this;
  }

  public function removeUserQuest(UserQuest $userQuest): self
  {
      if ($this->userQuests->contains($userQuest)) {
          $this->userQuests->removeElement($userQuest);
          // set the owning side to null (unless already changed)
          if ($userQuest->getUserId() === $this) {
              $userQuest->setUserId(null);
          }
      }

      return $this;
  }
}
