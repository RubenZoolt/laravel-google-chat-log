<?php

declare(strict_types=1);

namespace Enigma {
    function curl_init(): \stdClass
    {
        return new \stdClass();
    }

    function curl_setopt_array(object $handle, array $options): bool
    {
        $handle->options = $options;

        return true;
    }
}

namespace Monolog\Handler\Curl {
    final class Util
    {
        /** @var array<int, array<int, mixed>> */
        public static array $executions = [];

        public static function execute(object $handle): void
        {
            self::$executions[] = $handle->options;
        }
    }
}
