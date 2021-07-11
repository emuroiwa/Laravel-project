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

Copy `.env.example` as `.env`

```shell
cp .env.example .env
```
Span up your containers

```shell
docker-compose up -d
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

To generate key please run this:

```
docker-compose exec app php artisan key:generate
```

# PHPUnit Tests

In the app root folder run this command in the terminal

```shell
docker-compose exec app ./vendor/bin/phpunit
```

# Test Endpoint
In the terminal run this curl request
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

Added a addDistance method taking the request and ProcessDistanceAddition instance  as arguments. In file, i imported AddDistanceFormRequest, ProcessDistanceAddition and RespondsWithHttpStatus. With in the the method there is a try catch block and a call to the ProcessDistanceAddition process method

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

<hr>

<h3>ProcessMeasurementInterface.php</h3>

```shell
app/Domain/ProcessMeasurement/Contracts/ProcessMeasurementInterface.php
```

Interface with process function


<h3>ProcessDistanceAddition.php</h3>

```shell
app/Domain/ProcessMeasurement/Services/ProcessDistanceAddition.php
```

Class dependent on DistanceConvertor and Addition. implements ProcessMeasurementInterface.

Process method
units and values are mapped together and loop through the new array. While looping through i am buidling an oprerands.
The new operands array is sent to the Addition setOperands methods. The result is formated to 2 decimal places. 
The value is push into a new array which is returned

<hr>
<h3>OperationInterface.php</h3>

```shell
app/Domain/Calculator/Contracts/OperationInterface.php
```

Interface with setOperands and calculate function


<h3>Addition.php</h3>

```shell
app/Domain/Calculator/Services/Addition.php
```

setOperands method, that sets array values to  protected $operands variables.
calculate method checks if operands are set and throws an exception. Returns summation of array elements

<hr>
<h3>UnitConvertorInterface.php</h3>

```shell
app/Domain/UnitConvertor/Contracts/UnitConvertorInterface.php
```

Interface with convert and getUnitValue function

<h3>DistanceConvertor.php</h3>

```shell
app/Domain/UnitConvertor/Services/DistanceConvertor.php
```

Implements UnitConvertorInterface.  The constructor intialises protected $value, protected $baseUnit and protected $fromUnit.
Method convert() returns a product of value and a result of the to and from SI unit value
Method getUnitValue() calculate method checks if unit are set and throws an exception. Returns unit value

<hr>
<h2>Tests</h2>
<h3>CalculateDistanceTest</h3>

```shell
tests/Unit/CalculateDistance/CalculateDistanceTest.php
```

methods
test_when_calculating_distance_some_fields_are_required()
test_response_when_there_is_a_successful_calculation()
test_response_when_there_is_an_error_in_calculation()

<h3>ProcessMeasurementTest.php</h3>

```shell
tests/Unit/ProcessMeasurement/ProcessMeasurementTest.php
```

Methods 
test_calculate_distance_when_units_are_the_same()


<h3>AdditionTest.php</h3>

```shell
tests/Unit/Calculator/AdditionTest.php
```

Methods
test_adds_up_given_operands()
test_no_given_operands_throws_exception_when_calculating()

<h3>DistanceConvertorTest.php</h3>

```shell
tests/Unit/Calculator/DistanceConvertorTest.php
```

Methods
test_converts_given_operands_with_units()
test_wrong_units_are_given_throws_exception_when_calculating()


