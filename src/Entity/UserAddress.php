<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserAddressRepository")
 * @ORM\Table(name="r_user_address")
 */
class Address
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="User",fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="u_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(type="string",options={"comment":"详细地址"})
     */
    private $address;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }


}
