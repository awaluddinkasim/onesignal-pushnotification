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
  public static function sendToAll(string $message)
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
   * Send a push notification to a user by external user ID.
   *
   * @param string|array $target
   *   The external user ID(s) to be sent the notification. If an array is
   *   given, all the given IDs will receive the notification.
   *
   * @param string $message
   *   The message to be sent to the user.
   *
   * @return void
   */
  public static function sendToUser(string|array $target, string $message)
  {
    $fields = [
      'app_id' => config('onesignal.app_id'),
      'contents' => [
        'en' => $message
      ],
      'target_channel' => 'push',
      'include_aliases' => [
        'external_id' => is_array($target) ? $target : [$target]
      ],
    ];

    self::send($fields);
  }

  /**
   * Send a push notification to specified segments.
   *
   * @param string|array $segments
   *   The segment(s) to which the notification will be sent. If an array is
   *   provided, notifications will be sent to all specified segments.
   *
   * @param string $message
   *   The message to be sent to the segments.
   *
   * @return void
   */

  public static function sendToSegments(string|array $segments, string $message)
  {
    $fields = [
      'app_id' => config('onesignal.app_id'),
      'contents' => [
        'en' => $message
      ],
      'target_channel' => 'push',
      'included_segments' => is_array($segments) ? $segments : [$segments],
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
  private static function send(array $fields)
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
