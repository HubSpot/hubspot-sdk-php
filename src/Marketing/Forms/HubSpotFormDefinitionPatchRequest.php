<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type HubSpotFormConfigurationShape from \HubspotSDK\Marketing\Forms\HubSpotFormConfiguration
 * @phpstan-import-type FormDisplayOptionsShape from \HubspotSDK\Marketing\Forms\FormDisplayOptions
 * @phpstan-import-type LegalConsentOptionsShape from \HubspotSDK\Marketing\Forms\HubSpotFormDefinitionPatchRequest\LegalConsentOptions
 *
 * @phpstan-type HubSpotFormDefinitionPatchRequestShape = array{
 *   archived?: bool|null,
 *   configuration?: null|HubSpotFormConfiguration|HubSpotFormConfigurationShape,
 *   displayOptions?: null|FormDisplayOptions|FormDisplayOptionsShape,
 *   fieldGroups?: list<mixed>|null,
 *   legalConsentOptions?: LegalConsentOptionsShape|null,
 *   name?: string|null,
 * }
 */
final class HubSpotFormDefinitionPatchRequest implements BaseModel
{
    /** @use SdkModel<HubSpotFormDefinitionPatchRequestShape> */
    use SdkModel;

    /**
     * Whether this form is archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?HubSpotFormConfiguration $configuration;

    /**
     * Options for styling the form.
     */
    #[Optional]
    public ?FormDisplayOptions $displayOptions;

    /**
     * The fields in the form, grouped in rows.
     *
     * @var list<mixed>|null $fieldGroups
     */
    #[Optional(list: FieldGroup::class)]
    public ?array $fieldGroups;

    #[Optional]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions;

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    #[Optional]
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
     * @param HubSpotFormConfiguration|HubSpotFormConfigurationShape|null $configuration
     * @param FormDisplayOptions|FormDisplayOptionsShape|null $displayOptions
     * @param list<mixed>|null $fieldGroups
     * @param LegalConsentOptionsShape|null $legalConsentOptions
     */
    public static function with(
        ?bool $archived = null,
        HubSpotFormConfiguration|array|null $configuration = null,
        FormDisplayOptions|array|null $displayOptions = null,
        ?array $fieldGroups = null,
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $configuration && $self['configuration'] = $configuration;
        null !== $displayOptions && $self['displayOptions'] = $displayOptions;
        null !== $fieldGroups && $self['fieldGroups'] = $fieldGroups;
        null !== $legalConsentOptions && $self['legalConsentOptions'] = $legalConsentOptions;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Whether this form is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param HubSpotFormConfiguration|HubSpotFormConfigurationShape $configuration
     */
    public function withConfiguration(
        HubSpotFormConfiguration|array $configuration
    ): self {
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }

    /**
     * Options for styling the form.
     *
     * @param FormDisplayOptions|FormDisplayOptionsShape $displayOptions
     */
    public function withDisplayOptions(
        FormDisplayOptions|array $displayOptions
    ): self {
        $self = clone $this;
        $self['displayOptions'] = $displayOptions;

        return $self;
    }

    /**
     * The fields in the form, grouped in rows.
     *
     * @param list<mixed> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $self = clone $this;
        $self['fieldGroups'] = $fieldGroups;

        return $self;
    }

    /**
     * @param LegalConsentOptionsShape $legalConsentOptions
     */
    public function withLegalConsentOptions(
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
    ): self {
        $self = clone $this;
        $self['legalConsentOptions'] = $legalConsentOptions;

        return $self;
    }

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
