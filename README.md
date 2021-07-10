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
