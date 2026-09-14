<?php

namespace Enigma\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleChatServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/google-chat.php',
            'google-chat'
        );
    }

    public function boot(): void
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/../../config/google-chat.php' => config_path('google-chat.php'),
            ], 'google-chat-config');
        }
    }
}
