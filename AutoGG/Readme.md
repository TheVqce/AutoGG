# AutoGG

A simple PocketMine-MP plugin that sends "GG" automatically after games.  
Players can choose to send it only when they win or on every game end.

---

## Plugin Information
Name: AutoGG  
Version: 1.1.0  
Author: TheVqce
API: 5.0.0  
Description: Sends gg automatically after matches.  
Compatible: PM5 and PHP 8.1+

---

## Features
- Automatically sends a GG message after games.
- Players can toggle between:
  - off → disables AutoGG
  - win → sends GG only when they win
  - all → sends GG on every game end
- Saves each player's choice in data.yml.
- Customizable GG message in config.yml.


## Commands
/autogg  
Shows your current AutoGG mode and how to use the command.

/autogg off  
Disables AutoGG completely.

/autogg win  
Sends GG only when you win a game.

/autogg all  
Sends GG on every game end (win or lose).



## Permissions
autogg.command – allows players to use the /autogg command (enabled by default)


## Configuration
File: resources/config.yml

**subscribe to TheVqce**
