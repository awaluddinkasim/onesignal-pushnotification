
# OneSignal Push Notification
A Laravel package for seamless integration with OneSignal push notification service.

[![Latest Stable Version](https://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/v)](https://packagist.org/packages/awaluddinkasim/onesignal-pushnotification) [![License](https://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/license)](https://github.com/awaluddinkasim/onesignal-pushnotification/blob/main/LICENSE.md) [![PHP Version Require](https://poser.pugx.org/awaluddinkasim/onesignal-pushnotification/require/php)](https://packagist.org/packages/awaluddinkasim/onesignal-pushnotification)

## Introduction
OneSignal is a platform that offers multiple messaging channels including mobile push notifications, web push, SMS, email, and in-app messaging. This Laravel package specifically focuses on implementing push notifications functionality from OneSignal's services into your Laravel application. Check out the [documentation](https://documentation.onesignal.com/docs) for more information about OneSignal.

## Installation
To install this package, simply run the following command:

    composer require awaluddinkasim/onesignal-pushnotification
 
Next, run the this command to publish the configuration file:

    php artisan vendor:publish --provider="AwaluddinKasim\OneSignalPushNotification\OneSignalServiceProvider"

## Usage
Add your OneSignal App ID and API Key to your `.env` file:

    ONESIGNAL_APP_ID=xxxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
    ONESIGNAL_API_KEY=xx_xx_xxx_xxxxxxxxxxxxxxxxxxxxxxxxxxxxx

Check [here](https://documentation.onesignal.com/docs/keys-and-ids#app-id) for more information about App ID and API Key.

#### Note
Starting November 14 2024, OneSignal has implemented a new Rich API key system and is deprecating legacy API keys. This package is updated to use the new Rich API key system.

### Send a push notification to all subscribers:

    use AwaluddinKasim\OneSignalPushNotification\OneSignal;
    
    OneSignal::sendToAll($your_message); 


### Send a push notification to specific segments:

    use AwaluddinKasim\OneSignalPushNotification\OneSignal;
    
    OneSignal::sendToSegments($your_segments, $your_message);
    
### Send a push notification to a user by external user ID:

    use AwaluddinKasim\OneSignalPushNotification\OneSignal;
    
    OneSignal::sendToUsers($external_user_id, $your_message);

`$external_user_id` can be a string or an array of strings. If an array is given, all the given IDs will receive the notification.

You can read more about External ID [here](https://documentation.onesignal.com/docs/users#external-id).

## License
This package is released under the [MIT License](https://github.com/awaluddinkasim/onesignal-pushnotification/blob/main/LICENSE.md).