<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\ActionCompleteParams;

use HubspotSDK\Automation\Actions\AgentRequestContext;
use HubspotSDK\Automation\Actions\CopilotRequestContext;
use HubspotSDK\Automation\Actions\StandaloneRequestContext;
use HubspotSDK\Automation\Actions\TestRequestContext;
use HubspotSDK\Automation\Actions\WorkflowsRequestContext;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * Specifies the context in which the request is made, which can be one of several predefined contexts.
 *
 * @phpstan-import-type WorkflowsRequestContextShape from \HubspotSDK\Automation\Actions\WorkflowsRequestContext
 * @phpstan-import-type AgentRequestContextShape from \HubspotSDK\Automation\Actions\AgentRequestContext
 * @phpstan-import-type CopilotRequestContextShape from \HubspotSDK\Automation\Actions\CopilotRequestContext
 * @phpstan-import-type StandaloneRequestContextShape from \HubspotSDK\Automation\Actions\StandaloneRequestContext
 * @phpstan-import-type TestRequestContextShape from \HubspotSDK\Automation\Actions\TestRequestContext
 *
 * @phpstan-type RequestContextVariants = WorkflowsRequestContext|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext
 * @phpstan-type RequestContextShape = RequestContextVariants|WorkflowsRequestContextShape|AgentRequestContextShape|CopilotRequestContextShape|StandaloneRequestContextShape|TestRequestContextShape
 */
final class RequestContext implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            WorkflowsRequestContext::class,
            AgentRequestContext::class,
            CopilotRequestContext::class,
            StandaloneRequestContext::class,
            TestRequestContext::class,
        ];
    }
}
