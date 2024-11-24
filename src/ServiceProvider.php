<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\CollectionPowerPack;

use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        Collection::macro('groupByFirstCharacter', function (string $property): Collection {
            return $this
                ->groupBy(fn ($value) => \mb_substr($value[$property], 0, 1))
                ->sortKeys();
        });

        Collection::macro('groupByLastCharacter', function (string $property): Collection {
            return $this
                ->groupBy(fn ($value) => \mb_substr($value[$property], -1, 1))
                ->sortKeys();
        });

        Collection::macro('toLower', function () {
            return $this->map(fn (string $value): string => Str::lower($value));
        });

        Collection::macro('toUpper', function () {
            return $this->map(fn (string $value): string => Str::upper($value));
        });

        Collection::macro('toLocale', function (string $locale) {
            return $this->map(fn (string $value): string => Lang::get($value, [], $locale));
        });
    }
}
