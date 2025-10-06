<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FormUpdateParams); // set properties as needed
 * $client->marketing.forms->update(...$params->toArray());
 * ```
 * Partially update a form definition.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.forms->update(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Forms->update
 *
 * @phpstan-type form_update_params = array{
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
    /** @use SdkModel<form_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?HubSpotFormConfiguration $configuration;

    #[Api(optional: true)]
    public ?FormDisplayOptions $displayOptions;

    /** @var list<FieldGroup>|null $fieldGroups */
    #[Api(list: FieldGroup::class, optional: true)]
    public ?array $fieldGroups;

    #[Api(optional: true)]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions;

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

    public function withDisplayOptions(FormDisplayOptions $displayOptions): self
    {
        $obj = clone $this;
        $obj->displayOptions = $displayOptions;

        return $obj;
    }

    /**
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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
