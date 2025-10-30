<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * List all associations of an object by object type. Limit 500 per call.
 *
 * @see HubspotSDK\CRM\Associations\V4->listAssociationsByType
 *
 * @phpstan-type V4ListAssociationsByTypeParamsShape = array{
 *   objectType: string, objectID: string, after?: string, limit?: int
 * }
 */
final class V4ListAssociationsByTypeParams implements BaseModel
{
    /** @use SdkModel<V4ListAssociationsByTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $objectID;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * `new V4ListAssociationsByTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4ListAssociationsByTypeParams::with(objectType: ..., objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4ListAssociationsByTypeParams)->withObjectType(...)->withObjectID(...)
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
        string $objectType,
        string $objectID,
        ?string $after = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->objectID = $objectID;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

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

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
