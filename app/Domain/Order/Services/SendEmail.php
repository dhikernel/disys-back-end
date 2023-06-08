<?php

namespace App\Domain\Order\Services;

use App\Domain\Order\Exceptions\CustomException;
use App\Mail\SendEmailToClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail
{
    public function sendEmailToClient(array $clientData)
    {
        try {

            $sendMail = new SendEmailToClient($clientData);

            Mail::to($clientData['client']['email'], $clientData['client']['name'])
                ->cc($clientData['client']['email'])->send($sendMail);
            if (count(Mail::failures()) > 0) {
                Log::error('Failed to send accounting email recipients');
                throw new CustomException('Failed to send accounting email');
            }
        } catch (CustomException $e) {
            return $e->getMessage();
        }

        return true;
    }
}
