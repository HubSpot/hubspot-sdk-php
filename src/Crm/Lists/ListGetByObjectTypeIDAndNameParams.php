<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch a single list by list name and object type.
 *
 * @see HubspotSDK\Crm\Lists->getByObjectTypeIDAndName
 *
 * @phpstan-type ListGetByObjectTypeIDAndNameParamsShape = array{
 *   objectTypeId: string, includeFilters?: bool
 * }
 */
final class ListGetByObjectTypeIDAndNameParams implements BaseModel
{
    /** @use SdkModel<ListGetByObjectTypeIDAndNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeId;

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeFilters;

    /**
     * `new ListGetByObjectTypeIDAndNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListGetByObjectTypeIDAndNameParams::with(objectTypeId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListGetByObjectTypeIDAndNameParams)->withObjectTypeID(...)
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
        string $objectTypeId,
        ?bool $includeFilters = null
    ): self {
        $obj = new self;

        $obj->objectTypeId = $objectTypeId;

        null !== $includeFilters && $obj->includeFilters = $includeFilters;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    public function withIncludeFilters(bool $includeFilters): self
    {
        $obj = clone $this;
        $obj->includeFilters = $includeFilters;

        return $obj;
    }
}
