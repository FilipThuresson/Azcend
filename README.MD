# Azcend

Azcend is a mvc framework created in php 8.2. Azcend is **in pre alpha**  
Azcend is not meant to host any real projects. Feel free to star or fork this project

To get started have php 8.2 and composer installed. Docker is also required.

To set up the project run:
```
composer install
```
To start the server run:
```
docker-compose up -d
```

Azcend uses dynamic routing where each controller in the controller map is a route
for example:

``localhost:8080/`` leads to IndexController and its index method  

``localhost:8080/login`` leads to LoginController and its index method

``localhost:8080/login/logout`` leads to LoginController and its logout method  

So for the first uri part in the path points to its controller, the second to its method and the rest are arguments for the method

The folder structure of the framework:

````
.
└── Root/
    ├── public/
    │   ├── .htaccess
    │   └── index.php
    ├── src/
    │   ├── Controllers/
    │   │   ├── Basecontroller.php
    │   │   └── IndexController.php
    │   └── Views/
    │       ├── errors/
    │       │   └── 404.html
    │       └── index/
    │           └── index.php
    ├── .env
    ├── docker-compose.yml
    └── Dockerfile
````

## Controllers

Controllers extends BaseController with has the important functions to make a page.   
To show a view the $this->view(file, folder). So to render index.php in the index/ views folder
you would pass write the following command:
```php 
    $this->view('index', 'index');
```