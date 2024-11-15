
# OneSignal Push Notification
A simple Laravel package for seamless integration with OneSignal push notification service
[![License](http://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/license)](LICENSE.md)  [![PHP Version Require](http://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/require/php)](https://packagist.org/packages/phpunit/phpunit)

## Installation
To install this package, simply run the following command:

    composer require awaluddinkasim/onesignal-pushnotification
 
Next, run the following command to publish the configuration file:

    php artisan vendor:publish --provider="AwaluddinKasim\OneSignalPushNotification\OneSignalServiceProvider"

## Usage
Add your OneSignal App ID and API Key to your `.env` file:

    ONESIGNAL_APP_ID=xxxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
    ONESIGNAL_API_KEY=xx_xx_xxx_xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

Read more about App ID and API Key [here](https://documentation.onesignal.com/docs/keys-and-ids#app-id)

### Send a push notification to all users:

    OneSignal::sendToAll('Hello, world!'); 

### Send a push notification to a user by external user ID:

    OneSignal::sendToUser('external_user_id', 'Hello, world!');

You can read more about External ID [here](https://documentation.onesignal.com/docs/users#external-id)
