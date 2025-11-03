<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set association labels between two records.
 *
 * @see HubspotSDK\Crm\Associations\V4->update
 *
 * @phpstan-type V4UpdateParamsShape = array{
 *   objectType: string,
 *   objectID: string,
 *   toObjectType: string,
 *   body: list<AssociationSpec>,
 * }
 */
final class V4UpdateParams implements BaseModel
{
    /** @use SdkModel<V4UpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $objectID;

    #[Api]
    public string $toObjectType;

    /** @var list<AssociationSpec> $body */
    #[Api(list: AssociationSpec::class)]
    public array $body;

    /**
     * `new V4UpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4UpdateParams::with(
     *   objectType: ..., objectID: ..., toObjectType: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4UpdateParams)
     *   ->withObjectType(...)
     *   ->withObjectID(...)
     *   ->withToObjectType(...)
     *   ->withBody(...)
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
     *
     * @param list<AssociationSpec> $body
     */
    public static function with(
        string $objectType,
        string $objectID,
        string $toObjectType,
        array $body
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->objectID = $objectID;
        $obj->toObjectType = $toObjectType;
        $obj->body = $body;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    /**
     * @param list<AssociationSpec> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
