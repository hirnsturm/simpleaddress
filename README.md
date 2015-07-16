# TYPO3 Extension *simpleaddress*

## Table of contents
- What does it do?
- Dependencies
- User manual
  - Installation
  - How to use
  - Supported languages
- Known problems
- Todo

## What does it do?
This extension offers an simple way for showing an address block with or without a Google Maps with. The address
will rendered in vCard format and the whole template is full responsive because it based on Twitter Bootstrap. 

## Dependencies
TYPO3 6.2.0-7.3.99  
Extbase 6.2.0-7.3.99  
Fluid 6.2.0-7.3.99  

## User manual

- Constants: Enter your GoogleMaps API-Key
- PlugIn *Address*:
  - Tab *Address*:
    - enter your address data and info text
  - Tab *Google Maps*: 
    - switch off/on GoogleMaps
    - enter custom lat, lng (If empty, the plugin will generate the coordinates.)
    - enter default zoom
    - enter maximum zoom
- The layout based on [Twitter Bootstrap](http://getbootstrap.com) and is full responsive.

### Installation
1. Install the extension from the TER with the extension manager.
2. Go to [Google Developer Console](https://console.developers.google.com) and create a "Google Maps API-Key"
3. Go to your template and add the TypoScript config "Simple-Address"
4. Go to "Constant Edotir", choose "PLUGIN.TX_SIMPLEADDRESS" and add your custom Google Maps API-Key ()
5. Clear the TYPO3 configuration cache
6. Now you can insert the plugin "Address" where ever you want

### How to use
You can simply insert the plugin "Address" on every page

### Supported languages
- English
- Deutsch
- Español

## Known problems
neither

## Todo
nothing
