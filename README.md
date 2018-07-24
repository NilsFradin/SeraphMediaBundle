SeraphMediaBundle
=================

This bundle is a solution to manage a media library, with back end systeme, and twig function for the front display.

How it works
------------

This bundle need FOSUserBundle and VichUploaderBundle to work.

The back end system use **bootstrap 4** to display all templates.

The MediaBundle provide some entities, controllers, forms and twig extension.

To read more about the using of this bundle, we invite you to check the [docs](/Resources/doc).

Installation
------------

1. Install it using composer
    
    ```console
    $ composer require seraph/media-bundle
    ```
    
2. Follow the FOSUSerBundle [documentation](https://symfony.com/doc/current/bundles/FOSUserBundle/index.html) to allow the **routes**, and the config the `security.yaml` file.
    
    ```yaml
    # app/config/packages/fos_user.yaml   
 
    fos_user:
        db_driver: orm # other valid values are 'mongodb' and 'couchdb'
        firewall_name: main
        user_class: Seraph\Bundle\MediaBundle\Entity\User
        group:
            group_class: Seraph\Bundle\MediaBundle\Entity\Group
        from_email:
            address: "%mailer_user%"
            sender_name: "%mailer_user%"
    ```
     If you want to allow the FOSUserBundle routes you need to write this  :
    ```yaml
    # app/config/routes.yaml
 
    fos_user:
        resource: "@FOSUserBundle/Resources/config/routing/all.xml"
    fos_user_group:
        resource: "@FOSUserBundle/Resources/config/routing/group.xml"
        prefix: /group 
    ```
    
    Don't forget to check the group documentation, because this bundle work with de FOSUser groups.

3. Add routing of the bundle

    ```yaml
    # app/config/routes.yaml   
     
    seraph_menu:
        resource: '@SeraphMediaBundle/Controller'
        type: annotation
        prefix: '/admin' 
    ``` 

4. Update your database with User, Group and UploadedFile

    ```console
    $ php bin/console doctrine:schema:update --force
    ```
    
Documentation
-------------

You can find in this folder, how you can use the bundle :

- [Read the documentation for Routes](/Resources/doc/Routes.md)
- [Read the documentation for Twig Functions](/Resources/doc/TwigFunction.md)
- [Read the documentation for Forms](/Resources/doc/Forms.md)
- [Read the documentation for Entities](/Resources/doc/Entities.md)
- [Read the documentation for Templates](/Resources/doc/Templates.md)
