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