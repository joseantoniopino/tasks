<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $role = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=200, nullable=true, options={"default"="NULL"})
     */
    private $surname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $password = 'NULL';

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $createdAt = 'NULL';

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="user")
     */
    private $tasks;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     * @return User
     */
    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return User
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     * @return User
     */
    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return User
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return User
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface|null $createdAt
     * @return User
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
    * @return Collection|Task[]
    */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }


    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return array (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
