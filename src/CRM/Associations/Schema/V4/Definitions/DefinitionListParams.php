<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns all association types between two object types.
 *
 * @see HubspotSDK\CRM\Associations\Schema\V4\Definitions->list
 *
 * @phpstan-type DefinitionListParamsShape = array{fromObjectType: string}
 */
final class DefinitionListParams implements BaseModel
{
    /** @use SdkModel<DefinitionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /**
     * `new DefinitionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionListParams::with(fromObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionListParams)->withFromObjectType(...)
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
    public static function with(string $fromObjectType): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }
}
