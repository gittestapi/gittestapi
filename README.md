# gittestapi
this is a REST api for gittest.com testing management

# Design Version 1.0

Database:https://github.com/gittestapi/gittest/blob/master/mysql.txt
Code sample:https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/

Get KeyToken
```
Action: Get
url: http://api.gittest.com/api.php/getkeytoken
```
Note: keytoken is sha512(md5(username+password))
md5(user001pass)=22a580e3544ec977a130234faa57549e
sha512(22a580e3544ec977a130234faa57549e)=be4b422b980b2987ad74efca766a7db3d8a13ee87a7f24185d255ccd1b4f8706
value online checker:http://www.miraclesalad.com/webtools/sha256.php
php function calling: http://php.net/manual/en/function.hash.php

```
Aciton: Post
url: http://api.gittest.com/api.php/getmytestplans
Request:
{
    username : "user001",
    keytoken : "be4b422b980b2987ad74efca766a7db3d8a13ee87a7f24185d255ccd1b4f8706"
}
Response:
{
    [
     {
       tpid : 1 ,
       tpname: "my test plan 001"
     }
     {
       tpid : 6 ,
       tpname: "my test plan 006"
     }
    ]
}
```

```
Aciton: Post
url: http://api.gittest.com/api.php/gettestresults/{$tpid}
Request:
{
    username : "user001",
    keytoken : "be4b422b980b2987ad74efca766a7db3d8a13ee87a7f24185d255ccd1b4f8706"
}
Response:
{
    [
     {
       trid : 3 ,
       tctitle: "this is test title 003 in test plan 001"
     }
     {
       trid : 4 ,
       tctitle: "this is test title 004 in test plan 001"
     }
    ]
}
```

```
Aciton: Post
url: http://api.gittest.com/api.php/updatetestresult/{$trid}
Request:
{
    username : "user001",
    keytoken : "be4b422b980b2987ad74efca766a7db3d8a13ee87a7f24185d255ccd1b4f8706"
    testresults : {
                      status: "pass"
                  }
}
Response:
{
    trid : 3 ,
    updateresult: "update testresult successfully!"
}
```

```
Aciton: Post
url: http://api.gittest.com/api.php/updatetestresults
Request:
{
    username : "user001",
    keytoken : "be4b422b980b2987ad74efca766a7db3d8a13ee87a7f24185d255ccd1b4f8706"
    testresults : [
                    {
                      trid : 3 ,
                      status: "pass"
                    }
                    {
                      trid : 4 ,
                      status: "fail"
                    }
                 ]
}
Response:
{
    [
     {
       trid : 3 ,
       updateresult: "update testresult successfully!"
     }
     {
       trid : 4 ,
       updateresult: "update testresult successfully!"
     }
    ]
}
```

```
Aciton: Post
url: http://api.gittest.com/api.php/getmyteststepresults
```

```
Aciton: Post
url: http://api.gittest.com/api.php/updateteststepresult/{tsrid}
```

```
Aciton: Post
url: http://api.gittest.com/api.php/updateteststepresults
```

The easy fast way is using the sample way as following:

# Tips
## How to Design
https://restfulapi.net/rest-api-design-tutorial-with-example/

## Sample way
https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/

## Powerful way
http://www.django-rest-framework.org/
