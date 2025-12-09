<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Projects\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\Projects\AssociationsService::update()
 *
 * @phpstan-type AssociationUpdateParamsShape = array{
 *   projectID: string, toObjectType: string, toObjectID: string
 * }
 */
final class AssociationUpdateParams implements BaseModel
{
    /** @use SdkModel<AssociationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $projectID;

    #[Required]
    public string $toObjectType;

    #[Required]
    public string $toObjectID;

    /**
     * `new AssociationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationUpdateParams::with(
     *   projectID: ..., toObjectType: ..., toObjectID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationUpdateParams)
     *   ->withProjectID(...)
     *   ->withToObjectType(...)
     *   ->withToObjectID(...)
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
        string $projectID,
        string $toObjectType,
        string $toObjectID
    ): self {
        $self = new self;

        $self['projectID'] = $projectID;
        $self['toObjectType'] = $toObjectType;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }

    public function withProjectID(string $projectID): self
    {
        $self = clone $this;
        $self['projectID'] = $projectID;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $self = clone $this;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }
}
