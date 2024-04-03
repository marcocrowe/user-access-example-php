<?php

namespace UserAccessExample\Utilities;

/**
 * Utility class for Password Hashing and Verification
 */
class PasswordUtility
{
    public const HASH_ALGORITHM = "ripemd160";

    /**
     * Hashes a password
     * @param string $password The password to hash
     * @return string The hashed password
     */
    public static function hashPassword(string $password): string
    {
        //TODO: MC: Verify works
        return hash(self::HASH_ALGORITHM, $password);
    }
}
