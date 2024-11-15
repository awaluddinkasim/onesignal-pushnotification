
# OneSignal Push Notification
A Laravel package for seamless integration with OneSignal push notification service

[![License](https://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/license)](https://github.com/awaluddinkasim/onesignal-pushnotification/blob/main/README.md) [![PHP Version Require](https://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/require/php)](https://github.com/awaluddinkasim/onesignal-pushnotification)

## Introduction
OneSignal is platform that allows you to send push notifications to your users. This package provides a simple way to integrate OneSignal push notification service with your Laravel application. Check out the [documentation](https://documentation.onesignal.com/docs) for more information.

## Installation
To install this package, simply run the following command:

    composer require awaluddinkasim/onesignal-pushnotification
 
Next, run the this command to publish the configuration file:

    php artisan vendor:publish --provider="AwaluddinKasim\OneSignalPushNotification\OneSignalServiceProvider"

## Usage
Add your OneSignal App ID and API Key to your `.env` file:

    ONESIGNAL_APP_ID=xxxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
    ONESIGNAL_API_KEY=xx_xx_xxx_xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

Read more about App ID and API Key [here](https://documentation.onesignal.com/docs/keys-and-ids#app-id)

### Send a push notification to all users:

    OneSignal::sendToAll($your_message); 

### Send a push notification to a user by external user ID:

    OneSignal::sendToUser($external_user_id, $your_message);

`$external_user_id` can be a string or an array of strings. If an array is given, all the given IDs will receive the notification.

You can read more about External ID [here](https://documentation.onesignal.com/docs/users#external-id)
