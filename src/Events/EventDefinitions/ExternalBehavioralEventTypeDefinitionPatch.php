<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalBehavioralEventTypeDefinitionPatchShape = array{
 *   description?: string|null, label?: string|null
 * }
 */
final class ExternalBehavioralEventTypeDefinitionPatch implements BaseModel
{
    /** @use SdkModel<ExternalBehavioralEventTypeDefinitionPatchShape> */
    use SdkModel;

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
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $label && $obj['label'] = $label;

        return $obj;
    }

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }
}
