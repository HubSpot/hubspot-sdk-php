<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIConnectionShape = array{edgeType: string, nextActionId: string}
 */
final class APIConnection implements BaseModel
{
    /** @use SdkModel<APIConnectionShape> */
    use SdkModel;

    #[Required]
    public string $edgeType;

    #[Required]
    public string $nextActionId;

    /**
     * `new APIConnection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIConnection::with(edgeType: ..., nextActionId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIConnection)->withEdgeType(...)->withNextActionID(...)
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
    public static function with(string $edgeType, string $nextActionId): self
    {
        $obj = new self;

        $obj['edgeType'] = $edgeType;
        $obj['nextActionId'] = $nextActionId;

        return $obj;
    }

    public function withEdgeType(string $edgeType): self
    {
        $obj = clone $this;
        $obj['edgeType'] = $edgeType;

        return $obj;
    }

    public function withNextActionID(string $nextActionID): self
    {
        $obj = clone $this;
        $obj['nextActionId'] = $nextActionID;

        return $obj;
    }
}
