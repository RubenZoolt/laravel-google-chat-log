<?php

declare(strict_types=1);

namespace {
    $autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';

    if (is_file($autoloadPath)) {
        require_once $autoloadPath;
    }

    foreach (spl_autoload_functions() as $autoloadFunction) {
        if (
            is_array($autoloadFunction)
            && $autoloadFunction[0] instanceof \Composer\Autoload\ClassLoader
        ) {
            $autoloadFunction[0]->setPsr4('Enigma\\', [dirname(__DIR__) . '/src']);
            break;
        }
    }
}

namespace Enigma {
    class_alias(\DateTimeImmutable::class, __NAMESPACE__ . '\\DateTimeImmutable');
    class_alias(\DateTimeZone::class, __NAMESPACE__ . '\\DateTimeZone');

    function dd(mixed ...$values): void
    {
    }

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
