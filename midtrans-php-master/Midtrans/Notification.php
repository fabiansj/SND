<?php

namespace Midtrans;

use Illuminate\Support\Facades\Log;

/**
 * Read raw post input and parse as JSON. Provide getters for fields in notification object
 *
 * Example:
 *
 * ```php
 * 
 *   namespace Midtrans;
 * 
 *   $notif = new Notification();
 *   echo $notif->order_id;
 *   echo $notif->transaction_status;
 * ```
 */
class Notification
{
    private $response;

    public function __construct($input_source = "php://input")
    {
        $raw_input = file_get_contents($input_source);

        // Logging data mentah untuk debugging
        Log::info('Raw Notification Data:', ['data' => $raw_input]);
                
        parse_str($raw_input, $raw_notification);        

        // Periksa error decoding JSON
        if (!isset($raw_notification['transaction_id'])) {
            Log::error('Transaction ID not found in URL-encoded data, switching to JSON decoding', [
                'raw_input' => $raw_input
            ]);

            $raw_notification = json_decode($raw_input, true);

            // Periksa error decoding JSON
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON decoding error:', ['error' => json_last_error_msg(), 'raw_input' => $raw_input]);
                throw new \Exception('Invalid JSON format.');
            }
        }

        // Periksa apakah field transaction_id ada
        if (!isset($raw_notification['transaction_id'])) {
            Log::error('Transaction ID not found in notification.', ['data' => $raw_notification]);
            throw new \Exception('Transaction ID not found in notification.');
        }

        // Mendapatkan status transaksi menggunakan ID transaksi
        $status_response = Transaction::status($raw_notification['transaction_id']);
                
        $this->response = $status_response;
    }

    public function __get($name)
    {
        if (isset($this->response->$name)) {
            return $this->response->$name;
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
