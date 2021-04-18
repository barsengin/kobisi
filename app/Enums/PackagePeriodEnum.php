<?php
namespace App\Enums;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Spatie\Enum\Enum;

final class PackagePeriodEnum extends  Enum
{
    const   WEEKLY   = 1;
    const   MONTHLY  = 2;
    const   YEARLY   = 3;

    /**
     * Return label list
     *
     * @return array
     */
    #[ArrayShape([self::WEEKLY => "string", self::MONTHLY => "string", self::YEARLY => "string"])]
    public static function labels(): array
    {
        return [
            self::WEEKLY  => 'weekly',
            self::MONTHLY => 'monthly',
            self::YEARLY  => 'yearly',
        ];
    }

    /**
     * Return label of the given value
     *
     * @param string|int|null $value
     *
     * @return string
     */
    #[Pure] public static function label(string | int | null $value): string
    {
        $values = static::labels();

        return $values[$value] ?? '';
    }

}
