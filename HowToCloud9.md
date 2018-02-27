# Getting Started
## Configuring Cloud 9 for the SC Codes PHP Track

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

- [ ] TODO: Explain the scripts line by line?