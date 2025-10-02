<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_forms_hub_spot_form_definition_patch_request = array{
 *   archived?: bool,
 *   configuration?: MarketingFormsHubSpotFormConfiguration,
 *   displayOptions?: MarketingFormsFormDisplayOptions,
 *   fieldGroups?: list<MarketingFormsFieldGroup>,
 *   legalConsentOptions?: MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess,
 *   name?: string,
 * }
 */
final class MarketingFormsHubSpotFormDefinitionPatchRequest implements BaseModel
{
    /** @use SdkModel<marketing_forms_hub_spot_form_definition_patch_request> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?MarketingFormsHubSpotFormConfiguration $configuration;

    #[Api(optional: true)]
    public ?MarketingFormsFormDisplayOptions $displayOptions;

    /** @var list<MarketingFormsFieldGroup>|null $fieldGroups */
    #[Api(list: MarketingFormsFieldGroup::class, optional: true)]
    public ?array $fieldGroups;

    #[Api(optional: true)]
    public MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions;

    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MarketingFormsFieldGroup> $fieldGroups
     */
    public static function with(
        ?bool $archived = null,
        ?MarketingFormsHubSpotFormConfiguration $configuration = null,
        ?MarketingFormsFormDisplayOptions $displayOptions = null,
        ?array $fieldGroups = null,
        MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $configuration && $obj->configuration = $configuration;
        null !== $displayOptions && $obj->displayOptions = $displayOptions;
        null !== $fieldGroups && $obj->fieldGroups = $fieldGroups;
        null !== $legalConsentOptions && $obj->legalConsentOptions = $legalConsentOptions;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withConfiguration(
        MarketingFormsHubSpotFormConfiguration $configuration
    ): self {
        $obj = clone $this;
        $obj->configuration = $configuration;

        return $obj;
    }

    public function withDisplayOptions(
        MarketingFormsFormDisplayOptions $displayOptions
    ): self {
        $obj = clone $this;
        $obj->displayOptions = $displayOptions;

        return $obj;
    }

    /**
     * @param list<MarketingFormsFieldGroup> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $obj = clone $this;
        $obj->fieldGroups = $fieldGroups;

        return $obj;
    }

    public function withLegalConsentOptions(
        MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
    ): self {
        $obj = clone $this;
        $obj->legalConsentOptions = $legalConsentOptions;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
