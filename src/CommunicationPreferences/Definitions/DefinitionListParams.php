<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get a list of subscription status definitions from the account.
 *
 * @see HubSpotSDK\Services\CommunicationPreferences\DefinitionsService::list()
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
