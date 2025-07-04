<?php

namespace App\Helpers;

use File;
use Exception;
use Illuminate\Support\Facades\Mail;
use DateTime;
use DateTimeZone;

class Helper
{
    public static function getApiKey()
    {
        // return 'c87ea341-cb2a-499d-bc06-388253b04c6d';
        // return 'c817d386-adb5-41de-b355-5153316adc8f';
        return '5c308ca5-9f4a-4f3d-9831-f7fe11548395';
    }
    public static function getRazorpayKeyId()
    {
        return "rzp_test_f4vRcPjcfkxA5i";
    }
    public static function getRazorpayKeySecret()
    {
        return "1MPr7uqq8zXr9K95SnYwUDI5";
    }
    public static function fetchMatchInfo($externalMatchId)
    {

        $apiKey = self::getApiKey();
        $apiUrl = "https://api.cricapi.com/v1/match_info?apikey={$apiKey}&id={$externalMatchId}";
        $response = file_get_contents($apiUrl);

        if ($response === false) {
            return null;
        }
        $decodedResponse = json_decode($response, true);
        return $decodedResponse;
    }
    public static function convertGmtToIst($dateTimeGmt)
    {
        try {
            // Create a DateTime object with the GMT time
            $dateTime = new DateTime($dateTimeGmt, new DateTimeZone('GMT'));

            // Set the timezone to IST
            $dateTime->setTimezone(new DateTimeZone('Asia/Kolkata'));

            // Format the date and time in IST
            return $dateTime->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            // Handle the exception if date conversion fails
            return null;
        }
    }
    public static function sendAccountInfoChangedEmail($data)
    {
        return true;
    }
    public static function saveImageToServer($file, $dir)
    {
        $path = public_path() . $dir;
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $filename = rand(10000, 100000) . '_' . time() . '_' . $file->getClientOriginalName();
        $file->move($path, $filename);

        $baseUrl = getenv('APP_URL');
        // $baseUrl = 'http://127.0.0.1:8000';
        // $baseUrl = 'https://admin2.biotaplant.com';

        //  $baseUrl = 'https://paleturquoise-crab-208767.hostingersite.com/runskart/public';


        $filePath = $baseUrl . $dir . $filename;

        return $filePath;
    }
    public static function deleteImageFromServer($filePath)
    {
        if (File::exists(public_path($filePath))) {
            return File::delete(public_path($filePath));
        }

        return false;
    }


    public static function sendPhpEmail($to, $subject, $body, $headers)
    {
        mail($to, $subject, $body, $headers);
    }
}
