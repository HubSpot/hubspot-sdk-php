<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\DefinitionsService::createLabel()
 *
 * @phpstan-type DefinitionCreateLabelParamsShape = array{
 *   fromObjectType: string, label: string, name: string, inverseLabel?: string
 * }
 */
final class DefinitionCreateLabelParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreateLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $inverseLabel;

    /**
     * `new DefinitionCreateLabelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionCreateLabelParams::with(fromObjectType: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionCreateLabelParams)
     *   ->withFromObjectType(...)
     *   ->withLabel(...)
     *   ->withName(...)
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
        string $label,
        string $name,
        ?string $inverseLabel = null,
    ): self {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->label = $label;
        $obj->name = $name;

        null !== $inverseLabel && $obj->inverseLabel = $inverseLabel;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withInverseLabel(string $inverseLabel): self
    {
        $obj = clone $this;
        $obj->inverseLabel = $inverseLabel;

        return $obj;
    }
}
