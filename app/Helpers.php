<?php

namespace App;

class Helpers
{
    public static function emailExists(array $contacts, string $email): bool
    {
        foreach ($contacts as $contact) {
            if ($contact['email'] === $email) {
                return true;
            }
        }
        return false;
    }
}
