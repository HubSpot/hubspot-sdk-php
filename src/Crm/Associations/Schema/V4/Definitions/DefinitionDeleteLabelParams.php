<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\DefinitionsService::deleteLabel()
 *
 * @phpstan-type DefinitionDeleteLabelParamsShape = array{
 *   fromObjectType: string, toObjectType: string
 * }
 */
final class DefinitionDeleteLabelParams implements BaseModel
{
    /** @use SdkModel<DefinitionDeleteLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    #[Api]
    public string $toObjectType;

    /**
     * `new DefinitionDeleteLabelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionDeleteLabelParams::with(fromObjectType: ..., toObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionDeleteLabelParams)
     *   ->withFromObjectType(...)
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
        string $toObjectType
    ): self {
        $obj = new self;

        $obj['fromObjectType'] = $fromObjectType;
        $obj['toObjectType'] = $toObjectType;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj['fromObjectType'] = $fromObjectType;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj['toObjectType'] = $toObjectType;

        return $obj;
    }
}
