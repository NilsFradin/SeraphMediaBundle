Entities and Interfaces
=======================

In this bundle you can find 2 interfaces and 1 entity 

UserInterface
-------------

UserInterface was implement by your Entity.

Functions :

- \+ getFiles()
- \+ setFiles(UploadedFile)
- \+ removeFile(UploadedFile)
- \+ addFile(UploadedFile)

GroupInterface
--------------

GroupInterface was implement by your Entity.

Functions :

- \+ getFiles()
- \+ setFiles(UploadedFile)
- \+ removeFile(UploadedFile)
- \+ addFile(UploadedFile)

UploadedFile
------------

Attributes :

- \# id : int
- \# name : string(255)
- \# file : UploadableField
- \# updateAt : Datetime
- \# group : ManyToOne GroupInterface
- \# user : ManyToOne UserInterface

Functions :

- \+ get() and set()