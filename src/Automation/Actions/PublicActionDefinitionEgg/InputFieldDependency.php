<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicActionDefinitionEgg;

use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicSingleFieldDependencyShape from \HubspotSDK\Automation\Actions\PublicSingleFieldDependency
 * @phpstan-import-type PublicConditionalSingleFieldDependencyShape from \HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency
 *
 * @phpstan-type InputFieldDependencyVariants = PublicSingleFieldDependency|PublicConditionalSingleFieldDependency
 * @phpstan-type InputFieldDependencyShape = InputFieldDependencyVariants|PublicSingleFieldDependencyShape|PublicConditionalSingleFieldDependencyShape
 */
final class InputFieldDependency implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicSingleFieldDependency::class,
            PublicConditionalSingleFieldDependency::class,
        ];
    }
}
