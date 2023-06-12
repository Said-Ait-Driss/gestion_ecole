# Gestion ecole ( School management system )
### is an app writen using php ( v 8.1.1 ) using last and best practices and recommended approaches.

## project structure :
- root
    - app
        - app.php
    - config
        - Database.php
        - config.php
    - controller
        - UserController.php
    - helpers
        - getenv.php
    -logs
    - middleware
    - models
        - User.model.php
    - public
        - index.php
        - assets
            - index.js
            - styles.css
            - dist
                ( contains webpack bundle files )
    - routes
        - global routes
    - test
        - unit tests
    - views
        -layout.php
        - shared
            - header.php
            - footer.php

## tech stuck and eco system :
### in this app I tried to combine multiple technologies from different industry tech stuck to implement and perform a best reliability and flexibility possible during for both the dev cycle and production as well. and these is the ecosystem I tried to implement :  

## Dependencies :
### php Dependencies :
    - vlucas/phpdotenv
### npm Dependencies :
    - fortawesome ^6.4.0
    - bootstrap ^5.3.0
    - mini-css-extract-plugin ^2.7.6
    - webpack  ^5.1.2
    - babel ^7.22.1
    - css-loader ^6.8.1


## Building and Running :
1. Clone the repository: `git clone https://github.com/Said-Ait-Driss/gestion_ecole`
2. Install the dependencies: 
    a - npm install
    b - php composer install
3. Build the project: `npm run build`
3. Run the project: `past the folder to your htdocs & go to your navigator and visite localhost:PORT/ecole/` 


