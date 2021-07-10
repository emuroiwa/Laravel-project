# Shoparize PHP Challenge

Application made with Laravel 7.29

# Requirements

-   Docker
-   Docker composer

**OR**

-   PHP 7.2 +

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-linux/install/) on your system, and then clone this repository.

# Setup

You need to clone the project to create a local copy on your system.
Run the following on your terminal:

```
git clone https://github.com/emuroiwa/shoparize-EM
```

Then change into the project's directory by running the following on your terminal:

```
cd shoparize-EM

```

You containers should be up and running hopefully. Now we have to set directory permissions
Navigate out of the root folder

```shell
cd ..
```

Then run these commands

```shell
sudo chown -R $USER:www-data shoparize-EM/ -R
chmod 775 shoparize-EM/ -R
git config core.fileMode false
```

Return back to the root folder

```shell
cd ./shoparize-EM
```

You need to run `composer install` to install application dependencies

```shell
docker-compose exec app composer install
```

# PHPUnit Tests

In the app root folder run this command in the terminal

```shell
docker-compose exec app ./vendor/bin/phpunit
```

# Test Endpoint

```shell
curl --location --request POST 'http://127.0.0.1:9009/api/v1/add-distance' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "unit1" : "yard",
    "unit2" : "metre",
    "value1" : 22,
    "value2" : 2,
    "return_unit" : "inch"
}'
```

# Files Changed

<h2>Environment</h2>
<h2>docker-compose</h2>

```shell
docker-compose.yml
```

Defines docker services i.e the app and the nginx containers

<h3>Dockerfile</h3>

```shell
Dockerfile
```

Has configure settings for the PHP container


<h3>shoparize.conf</h3>

```shell
docker-compose/nginx/myapi.conf
```

Nginx config file

<hr>
<h2>Application</h2>
<h3>RouteServiceProvider.php</h3>

```shell
app/Providers/RouteServiceProvider.php
```

simple way to make API versions in Laravel by prefixing v1 to the mapApiRoutes method
<h3>api.php</h3>

```shell
routes/api.php
```

Removed boilerplate code and added add-distance endpoint


<h3>AddDistanceRequest.php</h3>

```shell
app/Http/Requests/AddDistanceFormRequest.php
```

Laravel form request to validate the incoming request from my endpoint. Added rules and authorize() returns true now

<h3>AddDistanceController.php</h3>

```shell
app/Http/Controllers/v1/AddDistanceController.php
```

Added a addDistance method taking the request and ProcessDistanceAddition instance  as arguments. In file i imported AddDistanceFormRequest, ProcessDistanceAddition and RespondsWithHttpStatus. With in the the method there is a try catch block and a call to the ProcessDistanceAddition process method

<h3>enums.php</h3>

```shell
config/enums.php
```

 all measurement constants added to the file in an array

<h3>RespondsWithHttpStatus.php</h3>

```shell
app/Traits/RespondsWithHttpStatus.php
```

Response trait clas that has two methods success and failure, these methods wrap json responses
