# PHP Code Challenge

## Installation

### Setup your development environment(Homestead)
```
Install Homestead using the official documentation
https://laravel.com/docs/5.5/homestead
```
### Clone this repository
```
git clone git@github.com:moneyfx/php-code-challenge-a.git
```
### Modify the Homestead.yaml
`cd Homestead` and modify the Homestead.yaml file using this example(you can select any domain name that you want:
```
sites:
    - map: homestead.test
      to: /home/vagrant/code/php-code-challenge-a/public
```

### Install composer dependencies
run `vagrant up`(from Homestead directory) and then ssh to you vagrant machine by running `vagrant ssh` and go to project directory and run `composer install`

### Setup .env file
`cp .env.example .env`

### Generate your Laravel App Key
run `php artisan key:generate`

### Modify your local hosts file
Add the hostnames to your local `/etc/hosts` file using this example:
```
192.168.10.10   homestead.test

```
### Endpoints

##### `GET /api/v1/geolocation`

##### `GET /api/v1/geolocation/:ip_address`

##### `GET /api/v1/weather`

##### `GET /api/v1/weather/:ip_address`


### Sample Requests And Responses
 
```
GET /api/v1/geolocation/1014.163.1170.485
```
```
{
  "ip": "1014.163.1170.485",
  "error_message": "City not found! IP is not valid!"
}
```
```
GET /api/v1/geolocation/104.163.170.48
```
```
{
  "ip": "104.163.170.48",
  "geo": {
    "service": "ip-api",
    "city": "Montreal",
    "region": "Quebec",
    "country": "Canada"
  }
}
```
```
GET /api/v1/geolocation/104.163.170.48?service=freegeoip
```

```
{
  "ip": "104.163.170.48",
  "geo": {
    "service": "freegeoip",
    "city": "Montreal",
    "region": "Quebec",
    "country": "Canada"
  }
}
```
```
GET /api/v1/weather/104.163.170.48
```
```
{
  "ip": "104.163.170.48",
  "city": "Montreal",
  "temperature": {
    "current": -0.67,
    "low": -1,
    "high": 0
  },
  "wind": {
    "speed": 6.2,
    "direction": 150
  }
}
```
