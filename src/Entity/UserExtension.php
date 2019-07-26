<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserExtensionRepository")
 * @ORM\Table(name="r_user_extension")
 */
class UserExtension
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="u_id",referencedColumnName="id")
     */
    private $uId;

    /**
     * @var integer
     * @ORM\Column(type="integer",length=3,options={"comment":"身高"})
     */
    private $uHeight;

    /**
     * @var integer
     * @ORM\Column(type="integer",length=3,options={"comment":"体重"})
     */
    private $uWeight;

    /**
     * @var double
     * @ORM\Column(type="decimal",precision=5,scale=2,options={"comment":"胸围"})
     */
    private $bust;

    /**
     * @var double
     * @ORM\Column(type="decimal",precision=5,scale=2,options={"comment":"腰围"})
     */
    private $waist;

    /**
     * @var double
     * @ORM\Column(type="decimal",precision=5,scale=2,options={"comment":"臀围"})
     */
    private $hips;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUId(): User
    {
        return $this->uId;
    }

    public function setUId(User $uId): void
    {
        $this->uId = $uId;
    }

    /**
     * @return int
     */
    public function getUHeight(): int
    {
        return $this->uHeight;
    }

    /**
     * @param int $uHeight
     */
    public function setUHeight(int $uHeight): void
    {
        $this->uHeight = $uHeight;
    }

    /**
     * @return int
     */
    public function getUWeight(): int
    {
        return $this->uWeight;
    }

    /**
     * @param int $uWeight
     */
    public function setUWeight(int $uWeight): void
    {
        $this->uWeight = $uWeight;
    }

    /**
     * @return float
     */
    public function getBust(): float
    {
        return $this->bust;
    }

    /**
     * @param float $bust
     */
    public function setBust(float $bust): void
    {
        $this->bust = $bust;
    }

    /**
     * @return float
     */
    public function getWaist(): float
    {
        return $this->waist;
    }

    /**
     * @param float $waist
     */
    public function setWaist(float $waist): void
    {
        $this->waist = $waist;
    }

    /**
     * @return float
     */
    public function getHips(): float
    {
        return $this->hips;
    }

    /**
     * @param float $hips
     */
    public function setHips(float $hips): void
    {
        $this->hips = $hips;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


}
