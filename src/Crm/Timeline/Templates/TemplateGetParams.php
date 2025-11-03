<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Templates;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve an event type template by ID.
 *
 * @see HubspotSDK\Crm\Timeline\Templates->get
 *
 * @phpstan-type TemplateGetParamsShape = array{appID: int}
 */
final class TemplateGetParams implements BaseModel
{
    /** @use SdkModel<TemplateGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * `new TemplateGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateGetParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateGetParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
