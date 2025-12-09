<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a list of subscription status definitions from the account.
 *
 * @see HubspotSDK\Services\Marketing\Subscriptions\V4\DefinitionsService::list()
 *
 * @phpstan-type DefinitionListParamsShape = array{
 *   businessUnitID?: int, includeTranslations?: bool
 * }
 */
final class DefinitionListParams implements BaseModel
{
    /** @use SdkModel<DefinitionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * Set to `true` to return subscription translations associated with each definition.
     */
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

    /**
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * Set to `true` to return subscription translations associated with each definition.
     */
    public function withIncludeTranslations(bool $includeTranslations): self
    {
        $self = clone $this;
        $self['includeTranslations'] = $includeTranslations;

        return $self;
    }
}
