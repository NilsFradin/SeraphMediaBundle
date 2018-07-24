Entities
========

In this bundle you can find 3 types of entities

User
----

User extend the User class of FOSUserBundle

Attributes :

- __parent()
- \# id : int
- \# firstname : string(255)
- \# name : string(255)
- \# groups : ArrayCollection + ManyToMany Group
- \# files : ArrayCollection + OneToMany UploadedFile

Functions :

- \+ __construct()
- \+ get() and set()
- \+ getFullName()
- \+ removeFile(UploadedFile)
- \+ addFile(UploadedFile)

Group
-----

Group extend the Group class of FOSUserBundle

Attributes :

- \# __parent()
- \# id : int
- \# files : OneToMany UploadedFile

Functions :

- \+ __construct()
- \+ get() and set()
- \+ removeFile(UploadedFile)
- \+ addFile(UploadedFile)

UploadedFile
------------

- \# id : int
- \# name : string(255)
- \# file : UploadableField
- \# updateAt : Datetime
- \# group : ManyToOne Group
- \# user : ManyToOne User

Functions :

- \+ get() and set()