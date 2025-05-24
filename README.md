## Credentials
        The default credentials of the script are:

### Admin Login
        URL: https://www.yourwebsite.com/admin
        Login Email: admin@gmail.com
        Login Password: 1234

### Agent/User Login
        URL: https://www.yourwebsite.com/login
        Login Email: agent@gmail.com
        Login Password: 1234


## Configuration
        Before using and run this script, you must have to change the following information.
        1. Open the .env file with a text editor and change the database settings
        2. First, set up the app_name, app_url, database name, database_username and password.

## Requirements
        You will need to make sure your server meets the following requirements:

        - PHP >= 8.0
        - BCMath PHP Extension
        - Ctype PHP Extension
        - Fileinfo PHP extension
        - JSON PHP Extension
        - Mbstring PHP Extension
        - OpenSSL PHP Extension
        - PDO PHP Extension
        - Tokenizer PHP Extension
        - XML PHP 
        
### Git command for project setup 
         1. git clone git@github.com:project2017project/homeco.git
         2. crete virtual host on local
                - Path : C:\Windows\System32\drivers\etc\hosts

                        127.0.0.1	homeco.webngigs

                - Path : C:\xampp\apache\conf\extra\http-vhosts.conf

                        <VirtualHost *:80>
                                DocumentRoot "C:/xampp/htdocs/homeco"
                                ServerName homeco.webngigs
                                <Directory "C:/xampp/htdocs/homeco">
                                        Options Indexes FollowSymLinks
                                        AllowOverride All
                                        Require all granted
                                </Directory>
                        </VirtualHost>

         3. copy media file on public/uploads
         4. composer install
         5. need to create feature branch 
                Complsory :  git pull origin master

                             git checkout -b develop

                Designer : 

                        git checkout -b feature/design
                        git checkout -b feature/design-work
                        Optional : git pull origin feature/develop

                Developer : 

                        git checkout -b feature/develop
                        git checkout -b feature/develop-work
                        optional: git pull origin feature/develop

        6. After finish the task on local merge your feature branch to develop
                git checkout develop
                git merge feature/design --no-commit --no-ff
        
        7. After test on develop branch then again merge in master branch

