# Azcend

Azcend is a mvc framework created in php 8.2. Azcend is **in pre alpha**  
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
├── public/
│   ├── .htaccess
│   └── index.php
├── src/
│   ├── App/
│   │   └── Database.php
│   ├── Controllers/
│   │   ├── Basecontroller.php
│   │   └── IndexController.php
│   ├── Views/
│   │   ├── errors/
│   │   │   └── 404.html
│   │   └── index/
│   │       └── index.php
│   └── Models/
│       └── Model.php
├── .env
├── docker-compose.yml
└── Dockerfile
````

## Controllers

Controllers extends BaseController with has the important functions to make a page.   
To show a view the $this->view(filepath). So to render index.php in the index/ views folder
you would pass write the following command:
```php 
    $this->view('index.index');
```
To create a controller class run the script in the app.php file:
```
php app.php create:controller controllername
```
The controller will be namned controllernameController and will have and index method thats render a view in 
`views/controllername/index.php`

