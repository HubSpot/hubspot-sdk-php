<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Templates;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve an event type template by ID.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TemplatesService::get()
 *
 * @phpstan-type TemplateGetParamsShape = array{appId: int}
 */
final class TemplateGetParams implements BaseModel
{
    /** @use SdkModel<TemplateGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    /**
     * `new TemplateGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateGetParams::with(appId: ...)
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
