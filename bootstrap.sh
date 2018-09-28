#!/usr/bin/env bash

sudo apt-get update
sudo apt-get -y upgrade

sudo apt-get install -y apache2
sudo apt-get install -y php5

VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/public_html/"
    <Directory "/var/www/public_html/">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

sudo a2enmod rewrite
service apache2 restart

sudo apt-get -y install git
sudo apt-get -y install curl
sudo apt-get -y install nano

curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
