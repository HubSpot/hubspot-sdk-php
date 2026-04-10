<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\ArrayFieldSchema;

use HubSpotSDK\Automation\Actions\ArrayFieldSchema;
use HubSpotSDK\Automation\Actions\BooleanFieldSchema;
use HubSpotSDK\Automation\Actions\DoubleFieldSchema;
use HubSpotSDK\Automation\Actions\IntegerFieldSchema;
use HubSpotSDK\Automation\Actions\LongFieldSchema;
use HubSpotSDK\Automation\Actions\ObjectFieldSchema;
use HubSpotSDK\Automation\Actions\StringFieldSchema;
use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * Defines the type of elements contained within the array, which can be an integer, long, double, string, boolean, another array, or an object.
 *
 * @phpstan-import-type IntegerFieldSchemaShape from \HubSpotSDK\Automation\Actions\IntegerFieldSchema
 * @phpstan-import-type LongFieldSchemaShape from \HubSpotSDK\Automation\Actions\LongFieldSchema
 * @phpstan-import-type DoubleFieldSchemaShape from \HubSpotSDK\Automation\Actions\DoubleFieldSchema
 * @phpstan-import-type StringFieldSchemaShape from \HubSpotSDK\Automation\Actions\StringFieldSchema
 * @phpstan-import-type BooleanFieldSchemaShape from \HubSpotSDK\Automation\Actions\BooleanFieldSchema
 * @phpstan-import-type ArrayFieldSchemaShape from \HubSpotSDK\Automation\Actions\ArrayFieldSchema
 * @phpstan-import-type ObjectFieldSchemaShape from \HubSpotSDK\Automation\Actions\ObjectFieldSchema
 *
 * @phpstan-type ItemsVariants = mixed|IntegerFieldSchema|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ObjectFieldSchema
 * @phpstan-type ItemsShape = ItemsVariants|IntegerFieldSchemaShape|LongFieldSchemaShape|DoubleFieldSchemaShape|StringFieldSchemaShape|BooleanFieldSchemaShape|ArrayFieldSchemaShape|ObjectFieldSchemaShape
 */
final class Items implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            IntegerFieldSchema::class,
            LongFieldSchema::class,
            DoubleFieldSchema::class,
            StringFieldSchema::class,
            BooleanFieldSchema::class,
            ArrayFieldSchema::class,
            ObjectFieldSchema::class,
        ];
    }
}
