<?php

declare(strict_types=1);

namespace HubspotSDK\Core\Conversion\Concerns;

use HubspotSDK\Core\Conversion;
use HubspotSDK\Core\Conversion\CoerceState;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Core\Conversion\DumpState;

/**
 * @internal
 */
trait ArrayOf
{
    private readonly Converter|ConverterSource|string|null $type;

    public function __construct(
        Converter|ConverterSource|string|null $type = null,
        Converter|ConverterSource|string|null $enum = null,
        Converter|ConverterSource|string|null $union = null,
        private readonly bool $nullable = false,
    ) {
        $this->type = $type ?? $enum ?? $union;
        assert(!is_null($this->type));
    }

    public function coerce(mixed $value, CoerceState $state): mixed
    {
        if (!is_array($value)) {
            return $value;
        }

        $acc = [];
        foreach ($value as $k => $v) {
            if ($this->nullable && null === $v) {
                ++$state->yes;
                $acc[$k] = null;
            } else {
                $acc[$k] = Conversion::coerce($this->type, value: $v, state: $state);
            }
        }

        return $acc;
    }

    public function dump(mixed $value, DumpState $state): mixed
    {
        if (!is_array($value)) {
            return Conversion::dump_unknown($value, state: $state);
        }

        if (empty($value)) {
            return $this->empty();
        }

        return array_map(fn ($v) => Conversion::dump($this->type, value: $v, state: $state), array: $value);
    }

    private function empty(): array|object // @phpstan-ignore-line
    {
        return (object) [];
    }
}
