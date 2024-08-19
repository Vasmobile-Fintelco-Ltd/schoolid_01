<?php

namespace App\Helpers;

class GeneralHelper
{
    public static function phoneNumberToInternational(?string $phoneNumber): string
    {
        if ($phoneNumber === null || empty($phoneNumber)) {
            return '';
        }

        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        if (strlen($phoneNumber) === 10) {
            $phoneNumber = '254' . substr($phoneNumber, -9);
        }

        return $phoneNumber;
    }

    function maskEmail($email) {
        $emailParts = explode('@', $email);
        $name = $emailParts[0];
        $domain = $emailParts[1];
    
        // Mask the name part, keeping the first and last character
        $maskedName = substr($name, 0, 1) . str_repeat('*', strlen($name) - 2) . substr($name, -1);
    
        return $maskedName . '@' . $domain;
    }
    

}
