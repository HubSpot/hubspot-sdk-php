<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Associations\BatchService::create()
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   fromObjectType: string, fromObjectID: string, toObjectType: string
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    #[Required]
    public string $fromObjectID;

    #[Required]
    public string $toObjectType;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(
     *   fromObjectType: ..., fromObjectID: ..., toObjectType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)
     *   ->withFromObjectType(...)
     *   ->withFromObjectID(...)
     *   ->withToObjectType(...)
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
    public static function with(
        string $fromObjectType,
        string $fromObjectID,
        string $toObjectType
    ): self {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['fromObjectID'] = $fromObjectID;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withFromObjectID(string $fromObjectID): self
    {
        $self = clone $this;
        $self['fromObjectID'] = $fromObjectID;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }
}
