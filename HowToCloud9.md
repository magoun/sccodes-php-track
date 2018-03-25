# Getting Started
## Configuring Cloud 9 for the SC Codes PHP Track

IDEA: Create a standard C9 workspace that can be cloned at the start of the advanced track. ReadMe.md can explain all of the features that are in placed currently (software versions, global installs, etc.) and HowToCloud9.md can explain the steps to get create the stock C9 workspace from scratch.

The HowTo may also be useful in setting up a VM profile (Docker / Homestead) image for later on.

-----
# Bits and Pieces
Installing Composer:
* Requires PHP first.
* Install script from [composer website](https://getcomposer.org/download/):
    ```
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"  
    ```
* Make the install global (mirrors the CodeSchool usage): 
    ```
    sudo mv composer.phar /usr/local/bin/composer
    ```

Installing Laravel:
* Requires composer first.
* Use composer to install Laravel: 
    ```
    composer global require laravel/installer
    ```
* Add Laravel install location to PATH for ease of use:
    ```
    sed -i -e '$a\' ~/.bashrc
    echo "" >> ~/.bashrc
    echo '# Add composer packages to global PATH (mainly for Laravel)' >> ~/.bashrc
    echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc
    source ~/.bashrc
    ```

# TODO list
- [ ] Explain the scripts line by line?
- [ ] Write explanation for cloning this workspace
- [ ] Create 'stock' workspace for future students to clone and start with?
- [ ] Update description for workspace:
        This is my main workspace for the SC Codes Advanced Track for PHP. 
        PHP is updated to version 7.2, with Composer and Laravel installed globally for ease of use. 
        More details can be found in README.md.
- [ ] Add info on using the standard php -S server and php artisan serve on C9 (0.0.0.0:8080)