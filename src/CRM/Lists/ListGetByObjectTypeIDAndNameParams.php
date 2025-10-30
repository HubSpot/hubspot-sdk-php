<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch a single list by list name and object type.
 *
 * @see HubspotSDK\CRM\Lists->getByObjectTypeIDAndName
 *
 * @phpstan-type ListGetByObjectTypeIDAndNameParamsShape = array{
 *   objectTypeID: string, includeFilters?: bool
 * }
 */
final class ListGetByObjectTypeIDAndNameParams implements BaseModel
{
    /** @use SdkModel<ListGetByObjectTypeIDAndNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeID;

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
     * ListGetByObjectTypeIDAndNameParams::with(objectTypeID: ...)
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
        string $objectTypeID,
        ?bool $includeFilters = null
    ): self {
        $obj = new self;

        $obj->objectTypeID = $objectTypeID;

        null !== $includeFilters && $obj->includeFilters = $includeFilters;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

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
