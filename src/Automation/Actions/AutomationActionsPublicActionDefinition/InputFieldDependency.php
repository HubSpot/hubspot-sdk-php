<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\AutomationActionsPublicActionDefinition;

use HubspotSDK\Automation\Actions\AutomationActionsPublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\AutomationActionsPublicSingleFieldDependency;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class InputFieldDependency implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationActionsPublicSingleFieldDependency::class,
            AutomationActionsPublicConditionalSingleFieldDependency::class,
        ];
    }
}
