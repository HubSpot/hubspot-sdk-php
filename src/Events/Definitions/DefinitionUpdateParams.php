<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Events\DefinitionsService::update()
 *
 * @phpstan-type DefinitionUpdateParamsShape = array{
 *   description?: string|null, label?: string|null
 * }
 */
final class DefinitionUpdateParams implements BaseModel
{
    /** @use SdkModel<DefinitionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    #[Optional]
    public ?string $label;

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
        ?string $description = null,
        ?string $label = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
