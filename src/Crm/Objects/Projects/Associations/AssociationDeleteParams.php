<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Projects\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Objects\Projects\AssociationsService::delete()
 *
 * @phpstan-type AssociationDeleteParamsShape = array{
 *   projectId: string, toObjectType: string, toObjectId: string
 * }
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $projectId;

    #[Api]
    public string $toObjectType;

    #[Api]
    public string $toObjectId;

    /**
     * `new AssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteParams::with(
     *   projectId: ..., toObjectType: ..., toObjectId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteParams)
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
        string $projectId,
        string $toObjectType,
        string $toObjectId
    ): self {
        $obj = new self;

        $obj['projectId'] = $projectId;
        $obj['toObjectType'] = $toObjectType;
        $obj['toObjectId'] = $toObjectId;

        return $obj;
    }

    public function withProjectID(string $projectID): self
    {
        $obj = clone $this;
        $obj['projectId'] = $projectID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj['toObjectType'] = $toObjectType;

        return $obj;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj['toObjectId'] = $toObjectID;

        return $obj;
    }
}
