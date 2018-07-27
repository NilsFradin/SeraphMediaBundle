<?php

namespace Seraph\Bundle\MediaBundle\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Seraph\Bundle\MediaBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Seraph\Bundle\MediaBundle\Model\GroupInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="uploaded_file")
 * @Vich\Uploadable
 */
class UploadedFile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @Vich\UploadableField(mapping="uploaded_file", fileNameProperty="name")
     */
    protected $file;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity="Seraph\Bundle\MediaBundle\Model\GroupInterface")
     * @var GroupInterface

     */
    protected $group;

    /**
     * @ORM\ManyToOne(targetEntity="Seraph\Bundle\MediaBundle\Model\UserInterface")
     * @var UserInterface
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UploadedFile
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return UploadedFile
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return UploadedFile
     */
    public function setFile(File $file = null)
    {
        $this->file = $file;

        if($file){
            $this->updateAt = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param mixed $updateAt
     * @return UploadedFile
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     * @return UploadedFile
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return UploadedFile
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}