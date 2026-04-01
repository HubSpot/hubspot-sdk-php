<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\PartnerClients\BatchService::createDefaultAssociation()
 *
 * @phpstan-type BatchCreateDefaultAssociationParamsShape = array{
 *   fromObjectType: string, fromObjectID: string, toObjectType: string
 * }
 */
final class BatchCreateDefaultAssociationParams implements BaseModel
{
    /** @use SdkModel<BatchCreateDefaultAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    #[Required]
    public string $fromObjectID;

    #[Required]
    public string $toObjectType;

    /**
     * `new BatchCreateDefaultAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateDefaultAssociationParams::with(
     *   fromObjectType: ..., fromObjectID: ..., toObjectType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateDefaultAssociationParams)
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
