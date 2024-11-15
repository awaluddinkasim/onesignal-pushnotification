<?php

namespace AwaluddinKasim\OneSignalPushNotification;

class OneSignal
{
  /**
   * Send a push notification to all users.
   *
   * @param string $message
   *   The message to be sent to all users.
   *
   * @return void
   */
  public static function sendToAll($message)
  {
    $fields = [
      'app_id' => config('onesignal.app_id'),
      'contents' => [
        'en' => $message
      ],
      'target_channel' => 'push',
      'included_segments' => ['All'],
    ];

    self::send($fields);
  }

  /**
   * Send push notification to a user by external user ID.
   *
   * @param string|int $user external user ID
   * @param string $message
   * @return void
   */
  public static function sendToUser($user, $message)
  {
    $fields = [
      'app_id' =>  config('onesignal.app_id'),
      'contents' => [
        'en' => $message
      ],
      'target_channel' => 'push',
      'include_aliases' => [
        'external_id' => [$user]
      ],
    ];

    self::send($fields);
  }

  /**
   * Send a OneSignal notification based on the given fields.
   *
   * @param array $fields
   *   The fields to be sent to the OneSignal API.
   *
   * @throws \Exception
   *   If the request to the OneSignal API fails.
   */
  private static function send($fields)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.onesignal.com/notifications');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
      'Authorization: Key ' . config('onesignal.api_key'),
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    $response = curl_exec($ch);

    if ($response === false) {
      echo 'Curl error: ' . curl_error($ch);
    } else {
      $responseData = json_decode($response, true);
      print_r($responseData);
    }

    curl_close($ch);
  }
}
