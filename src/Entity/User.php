<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   normalizationContext={"groups"={"user", "user:read"}},
 *   denormalizationContext={"groups"={"user", "user:write"}}
 * )
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
   * @Groups({"user"})
   * @ORM\JoinTable(name="fos_group",
   *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
   *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
   * )
   */
  protected $username;/**
   * @Groups({"user"})
   */
  protected $fullName;
  /**
   * @Groups({"user"})
   */
  protected $email;
  /**
   * @Groups({"user:write"})
   */
  protected $password;


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
}
