# pokecard_webAPI

A small php project linked to pokecard_android / Managing Http requests

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installing

You can use apache to call this API on your local machine, only using [GET] parameters ;
Just install PHP 7
For Windows : https://windows.php.net/download/
For Mac : https://php-osx.liip.ch/
For Linux : https://www.thoughtco.com/installing-php-on-linux-2693997

### What do i do with apache & php ?

Just create a road to the location of the files or target your root to it

### What can i $_GET ?

-- All the results will be into a Json header --

http://[YOUR ROAD]/?action=pokedex
Returns list of available pokemon's ID

http://[YOUR ROAD]/?action=cardlist&user=[USER_KEY]
Create an account with your USER_KEY if it doesn't already exist
Returns your pokemon list created randomly

http://[YOUR ROAD]/?action=details&card=[CARD_ID]
Returns details of a pokemon card

http://[YOUR_ROAD]/?action=trade&trade=[create||accept||destroy]
                   &userFrom=[USER_ID]
                   &userTo=[USER_ID]
                   &card=[CARD_ID]

userFrom = User ID who create the exchange
userTo = User ID who receive the exchange
card = Card ID exchanged

Enjoy!

## Authors

* **Antoine Cervo** - *Mobile Dev* - [c-antoine](https://github.com/c-antoine)
* **Clement Burellier** - *Mobile Dev* - [burellierc](https://github.com/burellierc)
