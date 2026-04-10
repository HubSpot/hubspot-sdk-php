<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams;

use HubSpotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubSpotSDK\Automation\Actions\PublicSingleFieldDependency;
use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicSingleFieldDependencyShape from \HubSpotSDK\Automation\Actions\PublicSingleFieldDependency
 * @phpstan-import-type PublicConditionalSingleFieldDependencyShape from \HubSpotSDK\Automation\Actions\PublicConditionalSingleFieldDependency
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
