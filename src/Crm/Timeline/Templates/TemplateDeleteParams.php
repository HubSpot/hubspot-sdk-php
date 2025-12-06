<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Templates;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an event type template by ID.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TemplatesService::delete()
 *
 * @phpstan-type TemplateDeleteParamsShape = array{appId: int}
 */
final class TemplateDeleteParams implements BaseModel
{
    /** @use SdkModel<TemplateDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * `new TemplateDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateDeleteParams::with(appId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateDeleteParams)->withAppID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $appId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }
}
