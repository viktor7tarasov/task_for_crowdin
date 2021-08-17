<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

$host = 'http://localhost:4444/wd/hub';

$capabilities = DesiredCapabilities::chrome();

$driver = RemoteWebDriver::create($host, $capabilities);

// navigate to Crowdin page for create a new organization
$driver->get('https://accounts.crowdin.com/workspace/create');

// find input element 'domain', click and enter name (domain) of organization
$driver->findElement(WebDriverBy::id('domain'))->click();
$driver->getKeyboard()->sendKeys('helloworld01');

// find input element 'email', click and enter email
$driver->findElement(WebDriverBy::id('email'))->click();
$driver->getKeyboard()->sendKeys('helloworld@mail.com');

// find button element 'cc-compliance a' (cookies button), click
$driver->findElement(WebDriverBy::cssSelector('.cc-compliance a'))->click();

// find input element 'first-name', click and enter first name
$driver->findElement(WebDriverBy::cssSelector('#first-name'))->click();
$driver->getKeyboard()->sendKeys('Hello');

// find input element 'last-name', click and enter last name
$driver->findElement(WebDriverBy::id('last-name'))->click();
$driver->getKeyboard()->sendKeys('World');

// find input element 'username', click and enter username
$driver->findElement(WebDriverBy::id('username'))->click();
$driver->getKeyboard()->sendKeys('hello_world_01');

// find input element 'password', click and enter password
$driver->findElement(WebDriverBy::id('password'))->click();
$driver->getKeyboard()->sendKeys('HeLLoWorLd123');

// find checkbox element 'join_agree_terms' and click
$driver->findElement(WebDriverBy::id('join_agree_terms'))->click();

// find button element "Create Organization" and click
$driver->findElement(
    WebDriverBy::xpath('/html/body/div[2]/div/div/section[2]/div[1]/form/fieldset/button')
)->click();

// terminate the session and close the browser
//$driver->quit();