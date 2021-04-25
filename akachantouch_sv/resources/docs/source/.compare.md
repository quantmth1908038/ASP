---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_b13834bffa96d71b68e09c9b28db5c8c -->
## Index interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/users`


<!-- END_b13834bffa96d71b68e09c9b28db5c8c -->

<!-- START_f04e1016aa4cf09c8eb42b64c9a15c98 -->
## Create interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/users/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/users/create`


<!-- END_f04e1016aa4cf09c8eb42b64c9a15c98 -->

<!-- START_04b3cb9b73e949342c4b831bafae2590 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/auth/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/auth/users`


<!-- END_04b3cb9b73e949342c4b831bafae2590 -->

<!-- START_6f2a09824ea1e997a76641dcc289cbbc -->
## Show interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/users/{user}`


<!-- END_6f2a09824ea1e997a76641dcc289cbbc -->

<!-- START_b04d5ce6e22e10ccddfbe4473bf6d190 -->
## Edit interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/users/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/users/{user}/edit`


<!-- END_b04d5ce6e22e10ccddfbe4473bf6d190 -->

<!-- START_5e2baa277692b8737972de63415607de -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/auth/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/auth/users/{user}`

`PATCH admin/auth/users/{user}`


<!-- END_5e2baa277692b8737972de63415607de -->

<!-- START_807324e2bd5eaa85b2d6d14ce6badd19 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/auth/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/auth/users/{user}`


<!-- END_807324e2bd5eaa85b2d6d14ce6badd19 -->

<!-- START_dd75e4eded4cdc79d7770bf384f71bee -->
## Index interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/roles`


<!-- END_dd75e4eded4cdc79d7770bf384f71bee -->

<!-- START_e1db9fe976d8d53aa264cbed2a7025c4 -->
## Create interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/roles/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/roles/create`


<!-- END_e1db9fe976d8d53aa264cbed2a7025c4 -->

<!-- START_0344a603a512ed81e8c63ff54de8321c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/auth/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/auth/roles`


<!-- END_0344a603a512ed81e8c63ff54de8321c -->

<!-- START_5cb17950537d44cc82a9ccd13159ada3 -->
## Show interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/roles/{role}`


<!-- END_5cb17950537d44cc82a9ccd13159ada3 -->

<!-- START_4efc4075ba5af46537db0625ad2ee9fe -->
## Edit interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/roles/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/roles/{role}/edit`


<!-- END_4efc4075ba5af46537db0625ad2ee9fe -->

<!-- START_0c466ff9c9d78e13a474da0961c395d3 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/auth/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/auth/roles/{role}`

`PATCH admin/auth/roles/{role}`


<!-- END_0c466ff9c9d78e13a474da0961c395d3 -->

<!-- START_aca33ad7346d6a62b1ae2c3745bf6719 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/auth/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/auth/roles/{role}`


<!-- END_aca33ad7346d6a62b1ae2c3745bf6719 -->

<!-- START_3a476d5fd7d8fa01d5baa03918238b70 -->
## Index interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/permissions`


<!-- END_3a476d5fd7d8fa01d5baa03918238b70 -->

<!-- START_d300f56bb564f966edfd70cf4325f6ad -->
## Create interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/permissions/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/permissions/create`


<!-- END_d300f56bb564f966edfd70cf4325f6ad -->

<!-- START_7d9171e6299e08b9d236c9a59ef2edd6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/auth/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/auth/permissions`


<!-- END_7d9171e6299e08b9d236c9a59ef2edd6 -->

<!-- START_022bb62a0b258aab9ef84b8be6637a1d -->
## Show interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/permissions/{permission}`


<!-- END_022bb62a0b258aab9ef84b8be6637a1d -->

<!-- START_d311b3112616e31de0b92dab841a1c05 -->
## Edit interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/permissions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/permissions/{permission}/edit`


<!-- END_d311b3112616e31de0b92dab841a1c05 -->

<!-- START_5b9663bbbf5d79b2c809a1702836b061 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/auth/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/auth/permissions/{permission}`

`PATCH admin/auth/permissions/{permission}`


<!-- END_5b9663bbbf5d79b2c809a1702836b061 -->

<!-- START_8038d517016f5aaa39e8bddeb4777af8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/auth/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/auth/permissions/{permission}`


<!-- END_8038d517016f5aaa39e8bddeb4777af8 -->

<!-- START_8008d5c11b12d2bd240d206942b6a2ca -->
## Index interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/menu" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/menu"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/menu`


<!-- END_8008d5c11b12d2bd240d206942b6a2ca -->

<!-- START_748de8644fdd01f58922d8ea5c44c8b3 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/auth/menu" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/menu"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/auth/menu`


<!-- END_748de8644fdd01f58922d8ea5c44c8b3 -->

<!-- START_c104d21f864e4db63c28959e16b03400 -->
## Redirect to edit page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/menu/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/menu/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/menu/{menu}`


<!-- END_c104d21f864e4db63c28959e16b03400 -->

<!-- START_a0241f812b4268de127f41295621aa6f -->
## Edit interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/menu/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/menu/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/menu/{menu}/edit`


<!-- END_a0241f812b4268de127f41295621aa6f -->

<!-- START_5a85144df9e540682bbc26805a554751 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/auth/menu/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/menu/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/auth/menu/{menu}`

`PATCH admin/auth/menu/{menu}`


<!-- END_5a85144df9e540682bbc26805a554751 -->

<!-- START_3bc7148d7c7c57e110453424fa0ccb07 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/auth/menu/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/menu/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/auth/menu/{menu}`


<!-- END_3bc7148d7c7c57e110453424fa0ccb07 -->

<!-- START_f8af6b9e3fcaabd4329c42a964ea85bf -->
## Index interface.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/logs`


<!-- END_f8af6b9e3fcaabd4329c42a964ea85bf -->

<!-- START_b24121b98a2b0c0fb536530124b45676 -->
## admin/auth/logs/{log}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/auth/logs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/logs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/auth/logs/{log}`


<!-- END_b24121b98a2b0c0fb536530124b45676 -->

<!-- START_eb9d8b55a02dc41d572ef89dd9d8e610 -->
## admin/_handle_form_
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/_handle_form_" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/_handle_form_"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/_handle_form_`


<!-- END_eb9d8b55a02dc41d572ef89dd9d8e610 -->

<!-- START_80dfe4e86d75cc4855af818dc5fd408d -->
## admin/_handle_action_
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/_handle_action_" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/_handle_action_"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/_handle_action_`


<!-- END_80dfe4e86d75cc4855af818dc5fd408d -->

<!-- START_6b345afc80a280f831cc62bd17c0ab4e -->
## admin/_handle_selectable_
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/_handle_selectable_" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/_handle_selectable_"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET admin/_handle_selectable_`


<!-- END_6b345afc80a280f831cc62bd17c0ab4e -->

<!-- START_ad80a0ea8bf195a5b89e26ad820fa08d -->
## admin/_handle_renderable_
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/_handle_renderable_" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/_handle_renderable_"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET admin/_handle_renderable_`


<!-- END_ad80a0ea8bf195a5b89e26ad820fa08d -->

<!-- START_02a639926464df5daa54d369305cd1dd -->
## Show the login page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET admin/auth/login`


<!-- END_02a639926464df5daa54d369305cd1dd -->

<!-- START_b4c5ff8b3f821683638e1a90d5abbadb -->
## Handle a login request.

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/auth/login`


<!-- END_b4c5ff8b3f821683638e1a90d5abbadb -->

<!-- START_7724d646c1e325129a7a3b0a86ba9586 -->
## User logout.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/logout`


<!-- END_7724d646c1e325129a7a3b0a86ba9586 -->

<!-- START_876c3b61de16aaae717b56e02c7e3a65 -->
## User setting page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/auth/setting" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/setting"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/auth/setting`


<!-- END_876c3b61de16aaae717b56e02c7e3a65 -->

<!-- START_fe7ba177cc9b63cf9fa99add14ad0c04 -->
## Update user setting.

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/auth/setting" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/auth/setting"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/auth/setting`


<!-- END_fe7ba177cc9b63cf9fa99add14ad0c04 -->

<!-- START_e40bc60a458a9740730202aaec04f818 -->
## admin
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin`


<!-- END_e40bc60a458a9740730202aaec04f818 -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## api/auth/login
> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_b19e2ecbb41b5fa6802edaf581aab5f6 -->
## api/me
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/me`


<!-- END_b19e2ecbb41b5fa6802edaf581aab5f6 -->

<!-- START_d131f717df7db546af1657d1e7ce10f6 -->
## api/me
> Example request:

```bash
curl -X POST \
    "http://localhost/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/me`


<!-- END_d131f717df7db546af1657d1e7ce10f6 -->


