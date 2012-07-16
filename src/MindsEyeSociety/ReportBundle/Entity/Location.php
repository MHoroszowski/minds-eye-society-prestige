<?php

namespace MindsEyeSociety\ReportBundle\Entity;

use MindsEyeSociety\ReportBundle\Entity\Member;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * MindsEyeSociety\ReportBundle\Entity\Location
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MindsEyeSociety\ReportBundle\Entity\LocationRepository")
 */
class Location
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
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $code;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"world", "nation", "region", "domain", "chapter"}, message = "Please choose a valid location type.")
     */
    private $type;

    /**
     * @var Location $parentLocation
     *
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="childLocations")
     * @ORM\JoinColumn(name="parent_location_id", referencedColumnName="id")
     */
    private $parentLocation;

    /**
     * @var ArrayCollection $childLocations
     *
     * @ORM\OneToMany(targetEntity="Location", mappedBy="parentLocation")
     */
    private $childLocations;

    /**
     * @var ArrayCollection $members
     *
     * @ORM\OneToMany(targetEntity="Member", mappedBy="homeLocation")
     */
    private $members;

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
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
    public function __construct()
    {
        $this->childLocations = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set parentLocation
     *
     * @param Location $parentLocation
     */
    public function setParentLocation(\MindsEyeSociety\ReportBundle\Entity\Location $parentLocation)
    {
        $this->parentLocation = $parentLocation;
    }

    /**
     * Get parentLocation
     *
     * @return Location
     */
    public function getParentLocation()
    {
        return $this->parentLocation;
    }

    /**
     * Add childLocations
     *
     * @param Location $childLocations
     */
    public function addLocation(\MindsEyeSociety\ReportBundle\Entity\Location $childLocations)
    {
        $this->childLocations[] = $childLocations;
    }

    /**
     * Get childLocations
     *
     * @return Collection
     */
    public function getChildLocations()
    {
        return $this->childLocations;
    }

    /**
     * Add members
     *
     * @param Member $members
     */
    public function addMember(Member $members)
    {
        $this->members[] = $members;
    }

    /**
     * Get members
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }
}