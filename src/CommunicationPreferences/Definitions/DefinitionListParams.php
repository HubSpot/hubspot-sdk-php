<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a list of subscription status definitions from the account.
 *
 * @see HubspotSDK\Services\CommunicationPreferences\DefinitionsService::list()
 *
 * @phpstan-type DefinitionListParamsShape = array{
 *   businessUnitID?: int|null, includeTranslations?: bool|null
 * }
 */
final class DefinitionListParams implements BaseModel
{
    /** @use SdkModel<DefinitionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $businessUnitID;

    #[Optional]
    public ?bool $includeTranslations;

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
        ?int $businessUnitID = null,
        ?bool $includeTranslations = null
    ): self {
        $self = new self;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $includeTranslations && $self['includeTranslations'] = $includeTranslations;

        return $self;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    public function withIncludeTranslations(bool $includeTranslations): self
    {
        $self = clone $this;
        $self['includeTranslations'] = $includeTranslations;

        return $self;
    }
}
