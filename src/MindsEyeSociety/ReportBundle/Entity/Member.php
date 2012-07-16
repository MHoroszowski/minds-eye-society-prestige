<?php

namespace MindsEyeSociety\ReportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * MindsEyeSociety\ReportBundle\Entity\Member
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MindsEyeSociety\ReportBundle\Entity\MemberRepository")
 */
class Member
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string $number
     *
     * @ORM\Column(name="number", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @var Location $homeLocation
     *
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="members")
     * @ORM\JoinColumn(name="home_location_id", referencedColumnName="id")
     *
     * @Assert\NotBlank()
     */
    private $homeLocation;

    /**
     * @var ArrayCollection $receivedAwards
     *
     * @ORM\OneToMany(targetEntity="Award", mappedBy="receivingMember")
     */
    private $receivedAwards;

    /**
     * @var ArrayCollection $approvedAwards
     *
     * @ORM\OneToMany(targetEntity="Award", mappedBy="approvingMember")
     */
    private $approvedAwards;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set homeLocation
     *
     * @param MindsEyeSociety\ReportBundle\Entity\Location $homeLocation
     */
    public function setHomeLocation(\MindsEyeSociety\ReportBundle\Entity\Location $homeLocation)
    {
        $this->homeLocation = $homeLocation;
    }

    /**
     * Get homeLocation
     *
     * @return MindsEyeSociety\ReportBundle\Entity\Location 
     */
    public function getHomeLocation()
    {
        return $this->homeLocation;
    }
    public function __construct()
    {
        $this->receivedAwards = new \Doctrine\Common\Collections\ArrayCollection();
    $this->approvedAwards = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add receivedAwards
     *
     * @param MindsEyeSociety\ReportBundle\Entity\Award $receivedAwards
     */
    public function addAward(\MindsEyeSociety\ReportBundle\Entity\Award $receivedAwards)
    {
        $this->receivedAwards[] = $receivedAwards;
    }

    /**
     * Get receivedAwards
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReceivedAwards()
    {
        return $this->receivedAwards;
    }

    /**
     * Get approvedAwards
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getApprovedAwards()
    {
        return $this->approvedAwards;
    }
}