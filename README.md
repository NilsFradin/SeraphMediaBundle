SeraphMediaBundle
=================

This bundle is a solution to manage a media library, with back end system, and twig function for the front display.

How it works
------------

This bundle VichUploaderBundle to work.

The back end system use **bootstrap 4** to display all templates.

The MediaBundle provide some entities, controllers, forms and twig extension.

To read more about the using of this bundle, we invite you to check the [docs](/Resources/doc).

Installation
------------

1. Install it using composer
    
    ```console
    $ composer require seraph/media-bundle
    ```
    
2. Add SeraphMediaBundle configuration   

    ```yaml
    # app/config/packages/seraph_media.yaml
 
    seraph_media:
        user_class: App\Entity\User
        group_class: App\Entity\Group
    ```

3. Add routing of the bundle

    ```yaml
    # app/config/routes.yaml   
     
    seraph_media:
        resource: '@SeraphMediaBundle/Controller'
        type: annotation
        prefix: '/admin' 
    ``` 

4. Update your database with User, Group and UploadedFile

    ```console
    $ php bin/console doctrine:schema:update --force
    ```
    
Using
-----

In this example I use FosUserBundle but you can use another bundle or your own classes.

1. Implement UserInterface
    
    ```php
    use FOS\UserBundle\Model\User as BaseUser;
    use Doctrine\ORM\Mapping as ORM;
    use Seraph\Bundle\MediaBundle\Model\UserInterface;
    
    /**
     * @ORM\Entity
     * @ORM\Table(name="user")
     */
    class User extends BaseUser implements UserInterface
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;
    
        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        protected $firstname;
    
        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        protected $name;
    
        /**
         * @ORM\ManyToMany(targetEntity="App\Entity\Group")
         * @ORM\JoinTable(name="user_group_user",
         *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="group_user_id", referencedColumnName="id")}
         * )
         */
        protected $groups;
    
        /**
         * @ORM\OneToMany(targetEntity="Seraph\Bundle\MediaBundle\Entity\UploadedFile", mappedBy="user")
         */
        protected $files;
    
        // ...
    }
    ```    

2. Implement GroupInterface

    ```php
    use FOS\UserBundle\Model\Group as BaseGroup;
    use Doctrine\ORM\Mapping as ORM;
    use Seraph\Bundle\MediaBundle\Model\GroupInterface;
    
    /**
     * @ORM\Entity
     * @ORM\Table(name="group_user")
     */
    class Group extends BaseGroup implements GroupInterface
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;
    
        /**
         * @ORM\OneToMany(targetEntity="Seraph\Bundle\MediaBundle\Entity\UploadedFile", mappedBy="group")
         */
        protected $files;
     
        // ...
     }
    ``` 
    
Documentation
-------------

You can find in this folder, how you can use the bundle :

- [Read the documentation for Routes](/Resources/doc/Routes.md)
- [Read the documentation for Twig Functions](/Resources/doc/TwigFunction.md)
- [Read the documentation for Forms](/Resources/doc/Forms.md)
- [Read the documentation for Interfaces and Entity](/Resources/doc/Entities.md)
- [Read the documentation for Templates](/Resources/doc/Templates.md)
