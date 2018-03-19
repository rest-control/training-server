## Training server for RestControl
TrainingServer contains several REST endpoints e.q. with oAuth/basic authentication, which you can use for learning RestControl.

##Installation
```
 make build
 make start
```

##Endpoints

####-> Plain api(without any authorization)
**(GET) http://IP_ADDR/plain/users**

Sample response:
```php
[
  [
      "id": 1,
      "name": "Sample name",
      "email": "sample@email.com",
      "password": "sample_long_password_string",
      "remember_token": null,
      "created_at": "2018-01-01 10:00:00",
      "updated_at": "2018-01-01 10:00:00",
  ],
  [
      "id": 2,
      "name": "Sample name",
      "email": "another@email.com",
      "password": "sample_long_password_string",
      "remember_token": null,
      "created_at": "2018-01-01 10:00:00",
      "updated_at": "2018-01-01 10:00:00",
  ],
]
```

####-> Basic auth
**(GET) http://IP_ADDR/basi-auth**

Sample response:
```php
 [
    "status": "ok"
 ]
```
####-> oAuth2 Endpoints
**(POST) http://IP_ADDR/oauth2/token**

> Form params:
> - grant_type(optional): password, client_credentials 
> - client_id: string
> - client_secret: string
> - username: string
> - password: string
> - scope(optional): string
> 
> Seeds:
> - Password grant client
>     - client_id: 10
>     - client_secret: F0NVue12qNwayx3pKJLHfJmQouOZg40YZafjjdHZ
   
**(GET) http://ID_ADDR/oauth2/users - Return list of users.**

>Headers:
> - Content-Type: application/json
> - Authorization: Bearer ACCESS_TOKEN  
>
>

Sample response:
```php
[
  [
      "id": 1,
      "name": "Sample name",
      "email": "sample@email.com",
      "password": "sample_long_password_string",
      "remember_token": null,
      "created_at": "2018-01-01 10:00:00",
      "updated_at": "2018-01-01 10:00:00",
  ],
  [
      "id": 2,
      "name": "Sample name",
      "email": "another@email.com",
      "password": "sample_long_password_string",
      "remember_token": null,
      "created_at": "2018-01-01 10:00:00",
      "updated_at": "2018-01-01 10:00:00",
  ],
]
```
