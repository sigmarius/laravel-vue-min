<?php

namespace App\Providers;

use App\Services\TestService;
use App\Utilities\Notification\MessengerNotificationInterface;
use App\Utilities\Notification\TelegramNotificator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // что происходит под капотом Laravel, когда мы делаем инъекции классов
        $this->app->bind(TestService::class, function () {
            // Laravel создает экземпляр класса TestService и возвращает его
            return new TestService('test');
        });

        // делаем связывание интерфейса с конкретным классом
        // этот класс должен реализовывать интерфейс MessengerNotificationInterface
        $this->app->bind(MessengerNotificationInterface::class, TelegramNotificator::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        отключает обертку json ресурса по умолчанию (data)
//        JsonResource::withoutWrapping();
    }
}
