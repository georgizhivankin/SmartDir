<?php
namespace Smartdir\Services\Mail;

/**
 * Mail class for Laravel
 *
 * Custom mail class that implements the mailing features needed by the application, utalising the default mail library that Laravel uses for email - SwiftMailer
 */
class Mail
{

    /**
     * sendMail function
     *
     * Implements a custom sendMail function for use in app's controllers, similar in syntax to the default sendMail PHP function
     *
     * @param string $from            
     * @param string $to            
     * @param string $cc            
     * @param string $message            
     * @param array $attachments            
     * @param string $view            
     * @param array $data            
     * @return boolean
     */
    public function sendMail($from, $to, $cc = null, $message, array $attachments = null, $view = null, array $data = null)
    {
        // Check the required variables and prepare the email message to send through
        if ((isset($from)) && (isset($to)) && (isset($message))) {
            // Check for a view passed in through the function and if no view is being passed, assume the default email view which is a blank one
            (! isset($view)) ? ($view = 'emails.default') : ('');
            // Pass a blank array if no data is being passed
            (! isset($data)) ? ($data = array()) : ('');
            // Attempt to send the message through the send method on the Laravel's Mail class
            // Note that the closure function should use the use() keyword to import the variables from the parent's function scope
            \Mail::send($view, $data, function ($emailMessage) use($from, $to, $cc, $message, $view, $data, $attachments)
            {
                $emailMessage->from($from);
                $emailMessage->to($to);
                (isset($cc)) ? ($emailMessage->cc($cc)) : ('');
                // Check if the $attachments is an array and go through all attachments
                if (is_array($attachments)) {
                    // Go through all attachments and attach all of them to the message
                    foreach ($attachments as $attachment) {
                        $emailMessage->attach($attachment);
                    }
                }
            });
            // Mail sent, return true
            return true;
        } else {
            // Stop processing as cruicial variables are missing and return false
            return false;
        }
    }
}