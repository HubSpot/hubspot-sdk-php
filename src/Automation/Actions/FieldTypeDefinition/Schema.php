<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\FieldTypeDefinition;

use HubspotSDK\Automation\Actions\ArrayFieldSchema;
use HubspotSDK\Automation\Actions\BooleanFieldSchema;
use HubspotSDK\Automation\Actions\DoubleFieldSchema;
use HubspotSDK\Automation\Actions\IntegerFieldSchema;
use HubspotSDK\Automation\Actions\LongFieldSchema;
use HubspotSDK\Automation\Actions\ObjectFieldSchema;
use HubspotSDK\Automation\Actions\StringFieldSchema;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type IntegerFieldSchemaShape from \HubspotSDK\Automation\Actions\IntegerFieldSchema
 * @phpstan-import-type LongFieldSchemaShape from \HubspotSDK\Automation\Actions\LongFieldSchema
 * @phpstan-import-type DoubleFieldSchemaShape from \HubspotSDK\Automation\Actions\DoubleFieldSchema
 * @phpstan-import-type StringFieldSchemaShape from \HubspotSDK\Automation\Actions\StringFieldSchema
 * @phpstan-import-type BooleanFieldSchemaShape from \HubspotSDK\Automation\Actions\BooleanFieldSchema
 * @phpstan-import-type ArrayFieldSchemaShape from \HubspotSDK\Automation\Actions\ArrayFieldSchema
 * @phpstan-import-type ObjectFieldSchemaShape from \HubspotSDK\Automation\Actions\ObjectFieldSchema
 *
 * @phpstan-type SchemaVariants = IntegerFieldSchema|LongFieldSchema|DoubleFieldSchema|StringFieldSchema|BooleanFieldSchema|ArrayFieldSchema|ObjectFieldSchema
 * @phpstan-type SchemaShape = SchemaVariants|IntegerFieldSchemaShape|LongFieldSchemaShape|DoubleFieldSchemaShape|StringFieldSchemaShape|BooleanFieldSchemaShape|ArrayFieldSchemaShape|ObjectFieldSchemaShape
 */
final class Schema implements ConverterSource
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
