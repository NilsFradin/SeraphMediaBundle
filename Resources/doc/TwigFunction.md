Twig Function
=============
 
Whe have one type of twig function but you can call then with 3 different parameters.

This function return an **array of UploadedFile**

For User
--------

```html.twig
{{ seraph_get_media(Group, User) }}
```

With this using you get the array of UploadedFile with de file that you provide for one user

For Group
---------

```html.twig
{{ seraph_get_media(Group) }}
```

With this using you get the array of UploadedFile with de file that you provide for one Group

For All
-------

```html.twig
{{ seraph_get_media() }}
```

With this using you get the array of UploadedFile with de file that you provide for alle