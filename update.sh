sudo rm -r /var/www/profpills
sudo mkdir /var/www/profpills
sudo cp -r ./*.php /var/www/profpills
sudo cp -r ./*.css /var/www/profpills
sudo mkdir /var/www/profpills/API
sudo cp -r ./API/* /var/www/profpills/API
sudo mkdir /var/www/profpills/admin
sudo cp -r ./admin/* /var/www/profpills/admin
sudo mkdir /var/www/profpills/Helper
sudo cp -r ./Helper/*.php /var/www/profpills/Helper

sudo mysql -u root < ./Helper/database.sql

sudo rm /etc/apache2/sites-available/profpills.conf
sudo cp apache.conf /etc/apache2/sites-available/profpills.conf

apachctl configtest
apache2 -k restart