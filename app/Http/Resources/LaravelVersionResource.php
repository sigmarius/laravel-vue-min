<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaravelVersionResource extends JsonResource
{
    /**
     * @var string $wrap меняет название обертки по умолчанию (data)
     */
//    public static $wrap = 'test';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        делаем какие-нибудь преобразования с данными
        return [
            'title' => $this->title,
            'release_date' => $this->release_date->format('d.m.Y'),
            'meta' => $this->when(
                $this->title === '10.40.0',
                function () {
                    return 'Самая последняя версия';
                }, function () {
                    return 'Есть версии и поновее';
            }),
        ];
    }
}
