<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MarketingFormsHubSpotFormDefinition\FormType;

/**
 * @phpstan-type marketing_forms_hub_spot_form_definition = array{
 *   id: string,
 *   archived: bool,
 *   configuration: MarketingFormsHubSpotFormConfiguration,
 *   createdAt: \DateTimeInterface,
 *   displayOptions: MarketingFormsFormDisplayOptions,
 *   fieldGroups: list<MarketingFormsFieldGroup>,
 *   formType: value-of<FormType>,
 *   legalConsentOptions: MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface,
 * }
 */
final class MarketingFormsHubSpotFormDefinition implements BaseModel
{
    /** @use SdkModel<marketing_forms_hub_spot_form_definition> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    #[Api]
    public MarketingFormsHubSpotFormConfiguration $configuration;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public MarketingFormsFormDisplayOptions $displayOptions;

    /** @var list<MarketingFormsFieldGroup> $fieldGroups */
    #[Api(list: MarketingFormsFieldGroup::class)]
    public array $fieldGroups;

    /** @var value-of<FormType> $formType */
    #[Api(enum: FormType::class)]
    public string $formType;

    #[Api]
    public MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess $legalConsentOptions;

    #[Api]
    public string $name;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * `new MarketingFormsHubSpotFormDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsHubSpotFormDefinition::with(
     *   id: ...,
     *   archived: ...,
     *   configuration: ...,
     *   createdAt: ...,
     *   displayOptions: ...,
     *   fieldGroups: ...,
     *   formType: ...,
     *   legalConsentOptions: ...,
     *   name: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsHubSpotFormDefinition)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withConfiguration(...)
     *   ->withCreatedAt(...)
     *   ->withDisplayOptions(...)
     *   ->withFieldGroups(...)
     *   ->withFormType(...)
     *   ->withLegalConsentOptions(...)
     *   ->withName(...)
     *   ->withUpdatedAt(...)
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
     *
     * @param list<MarketingFormsFieldGroup> $fieldGroups
     * @param FormType|value-of<FormType> $formType
     */
    public static function with(
        string $id,
        bool $archived,
        MarketingFormsHubSpotFormConfiguration $configuration,
        \DateTimeInterface $createdAt,
        MarketingFormsFormDisplayOptions $displayOptions,
        array $fieldGroups,
        MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
        string $name,
        \DateTimeInterface $updatedAt,
        FormType|string $formType = 'hubspot',
        ?\DateTimeInterface $archivedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->configuration = $configuration;
        $obj->createdAt = $createdAt;
        $obj->displayOptions = $displayOptions;
        $obj->fieldGroups = $fieldGroups;
        $obj['formType'] = $formType;
        $obj->legalConsentOptions = $legalConsentOptions;
        $obj->name = $name;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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

    /**
     * @param FormType|value-of<FormType> $formType
     */
    public function withFormType(FormType|string $formType): self
    {
        $obj = clone $this;
        $obj['formType'] = $formType;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }
}
