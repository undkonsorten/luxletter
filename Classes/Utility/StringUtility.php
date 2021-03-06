<?php
declare(strict_types=1);
namespace In2code\Luxletter\Utility;

/**
 * Class StringUtility
 */
class StringUtility
{

    /**
     * @param string $value
     * @return bool
     */
    public static function isValidUrl($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function startsWith(string $haystack, string $needle): bool
    {
        return stristr($haystack, $needle) && strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

    /**
     * @param array $arguments
     * @return string
     */
    public static function getHashFromArguments(array $arguments): string
    {
        $arguments = array_merge($arguments, [ConfigurationUtility::getEncryptionKey()]);
        return hash('sha256', implode('/', $arguments));
    }
}
