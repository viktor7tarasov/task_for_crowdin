<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

$host = 'http://localhost:4444/wd/hub';

$capabilities = DesiredCapabilities::chrome();

$driver = RemoteWebDriver::create($host, $capabilities);

// navigate to Crowdin page for login
$driver->get('https://accounts.crowdin.com/');

// find button element 'cc-compliance a' (cookies button), click
$driver->findElement(WebDriverBy::cssSelector('.cc-compliance a'))->click();

// find link element with text 'Add another organization' and click
$driver->findElement(WebDriverBy::id('workspace_choose'))->click();

// find input element 'Enter your organization's URL' enter name of organization
$driver->findElement(WebDriverBy::id('workspace_url'))->click();
$driver->getKeyboard()->sendKeys('helloworld01');

// find button element 'Continue' and click
$driver->findElement(WebDriverBy::xpath('//*[@id="choose-workspace"]/form/fieldset/button'))->click();

// find input element 'username or email', click and enter username
$driver->findElement(WebDriverBy::id('login_login'))->click();
$driver->getKeyboard()->sendKeys('hello_world_01');

// find input element 'password', click and enter password
$driver->findElement(WebDriverBy::id('login_password'))->click();
$driver->getKeyboard()->sendKeys('HeLLoWorLd123');

// find button element "Log In" and click
$driver->findElement(
    WebDriverBy::xpath('//*[@id="login-container"]/button')
)->click();

// find button element "Not Now" and click
$driver->findElement(WebDriverBy::id('remember-not-now'))->click();

// increase timeout
ini_set('max_execution_time', 50); // from 30 sec (default) to 50 sec
// wait for a page to load fully
$driver->wait()->until(
    WebDriverExpectedCondition::titleIs('Overview | Helloworld01 · Crowdin')
);

// find link element with text "User management" and click
$driver->findElement(
    WebDriverBy::xpath('//*[@id="root"]/div[2]/div[1]/div[1]/div[2]/div[16]/span/a')
)->click();

// find link element with text "User management" and click
$driver->findElement(
    WebDriverBy::xpath('//*[@id="CreateMenu"]/div/i')
)->click();

// find icon element "Add users" and click
$driver->wait(5)->until(
    WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::cssSelector('.ce-few-lines-title__title'))
);

// find input element and click
$driver->findElement(
    WebDriverBy::xpath('//*[@id="root"]/div[2]/div[2]/div[3]/div[3]/div/div/div[2]/div/div[2]/div/input')
)->click();

// enter email
$driver->getKeyboard()->sendKeys('qwerty@qwrt.io');

// find button "Send invite" and click
$driver->findElement(
    WebDriverBy::xpath('//*[@id="root"]/div[2]/div[2]/div[3]/div[3]/div/div/div[3]/button[1]')
)->click();

// terminate the session and close the browser
//$driver->quit();