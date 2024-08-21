documentation for running this project on debian clean server

1. Update and Upgrade System Packages
    sudo apt update && sudo apt upgrade -y

2. Install Apache Web Server
    sudo apt install apache2 -y
Start and enable the Apache service:
    sudo systemctl start apache2
    sudo systemctl enable apache2

3. Install MySQL Database Server
    sudo apt install mysql-server -y
    sudo mysql_secure_installation
   
4. Install PHP
    sudo apt install php libapache2-mod-php php-mysql php-xml php-mbstring php-curl php-zip php-gd php-cli -y

5. Install Composer
    sudo apt install curl -y
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer

6. Clone the Laravel Project
    cd /var/www/html
    sudo git clone https://github.com/tshragyan/auth-app.git
    cd auth-app
   
7. Set Up the Environment File
    nano .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=authentication_db
    DB_USERNAME=root
    DB_PASSWORD=

8. Install Laravel Dependencies
   composer install
   
9. Generate Application Key
    php artisan key:generate

10. Set Permissions
    sudo chown -R www-data:www-data /var/www/html/your-project-name
    sudo chmod -R 775 /var/www/html/your-project-name/storage
    sudo chmod -R 775 /var/www/html/your-project-name/bootstrap/cache
11. Configure Apache Virtual Host
    sudo nano /etc/apache2/sites-available/your-project-name.conf
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName auth.loc
    DocumentRoot /var/www/html/your-project-name/public

    <Directory /var/www/html/auth-app-name>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

12 Enable the new site and the Apache rewrite module:
    sudo a2ensite your-project-name.conf
    sudo a2enmod rewrite
    sudo systemctl restart apache2

13. Create MySQL Database
    sudo mysql -u root -p

    CREATE DATABASE your_database_name;
    CREATE USER 'root'@'localhost' IDENTIFIED BY '';
    GRANT ALL PRIVILEGES ON authentication_db.* TO 'root'@'localhost';
    FLUSH PRIVILEGES;
    EXIT;

 13. Run Database Migrations And Seeds
    php artisan migrate
    php artisan db:seed
 
    


Additional information : 

admin login: "admin@admin.com"

admin password: "admin"

for all users except admin password is : "password" 
