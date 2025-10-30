<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Deletes an association definition.
 *
 * @see HubspotSDK\CRM\Associations\Schema\V4\Definitions->delete
 *
 * @phpstan-type DefinitionDeleteParamsShape = array{
 *   fromObjectType: string, toObjectType: string
 * }
 */
final class DefinitionDeleteParams implements BaseModel
{
    /** @use SdkModel<DefinitionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    #[Api]
    public string $toObjectType;

    /**
     * `new DefinitionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionDeleteParams::with(fromObjectType: ..., toObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionDeleteParams)->withFromObjectType(...)->withToObjectType(...)
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
        string $toObjectType
    ): self {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }
}
