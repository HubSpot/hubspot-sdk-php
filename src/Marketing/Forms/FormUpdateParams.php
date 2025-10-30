<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update some of the form definition components.
 *
 * @see HubspotSDK\Marketing\Forms->update
 *
 * @phpstan-type FormUpdateParamsShape = array{
 *   archived?: bool,
 *   configuration?: HubSpotFormConfiguration,
 *   displayOptions?: FormDisplayOptions,
 *   fieldGroups?: list<FieldGroup>,
 *   legalConsentOptions?: LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess,
 *   name?: string,
 * }
 */
final class FormUpdateParams implements BaseModel
{
    /** @use SdkModel<FormUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether this form is archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?HubSpotFormConfiguration $configuration;

    /**
     * Options for styling the form.
     */
    #[Api(optional: true)]
    public ?FormDisplayOptions $displayOptions;

    /**
     * The fields in the form, grouped in rows.
     *
     * @var list<FieldGroup>|null $fieldGroups
     */
    #[Api(list: FieldGroup::class, optional: true)]
    public ?array $fieldGroups;

    #[Api(optional: true)]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions;

    /**
     * The name of the form. Expected to be unique for a hub.
     */
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
     * @param list<FieldGroup> $fieldGroups
     */
    public static function with(
        ?bool $archived = null,
        ?HubSpotFormConfiguration $configuration = null,
        ?FormDisplayOptions $displayOptions = null,
        ?array $fieldGroups = null,
        LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions = null,
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

    /**
     * Whether this form is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withConfiguration(
        HubSpotFormConfiguration $configuration
    ): self {
        $obj = clone $this;
        $obj->configuration = $configuration;

        return $obj;
    }

    /**
     * Options for styling the form.
     */
    public function withDisplayOptions(FormDisplayOptions $displayOptions): self
    {
        $obj = clone $this;
        $obj->displayOptions = $displayOptions;

        return $obj;
    }

    /**
     * The fields in the form, grouped in rows.
     *
     * @param list<FieldGroup> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $obj = clone $this;
        $obj->fieldGroups = $fieldGroups;

        return $obj;
    }

    public function withLegalConsentOptions(
        LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
    ): self {
        $obj = clone $this;
        $obj->legalConsentOptions = $legalConsentOptions;

        return $obj;
    }

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
