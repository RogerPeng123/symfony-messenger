<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="r_user")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string",length=20,options={"comment":"用户昵称"})
     */
    private $nickName;

    /**
     * @var integer
     * @ORM\Column(type="integer",length=1,options={"default":2,"comment":"性别 1男 0女 2未知"})
     */
    private $sex;

    /**
     * @var double
     * @ORM\Column(type="decimal",precision=5,scale=2,options={"default":0,"comment":"虚拟金币"})
     */
    private $gold;

    /**
     * @ORM\Column(type="date",nullable=true,options={"comment":"生日日期"})
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var string
     * @ORM\Column(type="string",length=18,nullable=true,options={"comment":"身份证号码"})
     */
    private $idCard;

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

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName(string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex(int $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return float
     */
    public function getGold(): float
    {
        return $this->gold;
    }

    /**
     * @param float $gold
     */
    public function setGold(float $gold): void
    {
        $this->gold = $gold;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday(): \DateTime
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday(\DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getIdCard(): string
    {
        return $this->idCard;
    }

    /**
     * @param string $idCard
     */
    public function setIdCard(string $idCard): void
    {
        $this->idCard = $idCard;
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
