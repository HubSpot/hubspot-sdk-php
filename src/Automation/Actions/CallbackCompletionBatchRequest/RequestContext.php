<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\CallbackCompletionBatchRequest;

use HubSpotSDK\Automation\Actions\AgentRequestContext;
use HubSpotSDK\Automation\Actions\CopilotRequestContext;
use HubSpotSDK\Automation\Actions\StandaloneRequestContext;
use HubSpotSDK\Automation\Actions\TestRequestContext;
use HubSpotSDK\Automation\Actions\WorkflowsRequestContext;
use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * Defines the context of the request, which can be one of several predefined types.
 *
 * @phpstan-import-type WorkflowsRequestContextShape from \HubSpotSDK\Automation\Actions\WorkflowsRequestContext
 * @phpstan-import-type AgentRequestContextShape from \HubSpotSDK\Automation\Actions\AgentRequestContext
 * @phpstan-import-type CopilotRequestContextShape from \HubSpotSDK\Automation\Actions\CopilotRequestContext
 * @phpstan-import-type StandaloneRequestContextShape from \HubSpotSDK\Automation\Actions\StandaloneRequestContext
 * @phpstan-import-type TestRequestContextShape from \HubSpotSDK\Automation\Actions\TestRequestContext
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
