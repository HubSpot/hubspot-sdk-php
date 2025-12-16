<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\DefinitionsService::createLabel()
 *
 * @phpstan-type DefinitionCreateLabelParamsShape = array{
 *   fromObjectType: string,
 *   label: string,
 *   name: string,
 *   inverseLabel?: string|null,
 * }
 */
final class DefinitionCreateLabelParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreateLabelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Optional]
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
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['label'] = $label;
        $self['name'] = $name;

        null !== $inverseLabel && $self['inverseLabel'] = $inverseLabel;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withInverseLabel(string $inverseLabel): self
    {
        $self = clone $this;
        $self['inverseLabel'] = $inverseLabel;

        return $self;
    }
}
