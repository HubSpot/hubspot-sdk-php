<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Batch;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput;

/**
 * Retrieve a batch of campaigns with specified properties and date range. This endpoint allows you to filter campaigns by start and end dates and specify which properties to include in the response.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BatchService::get()
 *
 * @phpstan-import-type PublicCampaignReadInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   inputs: list<PublicCampaignReadInput|PublicCampaignReadInputShape>,
 *   endDate?: string|null,
 *   properties?: list<string>|null,
 *   startDate?: string|null,
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     *
     * @var list<PublicCampaignReadInput> $inputs
     */
    #[Required(list: PublicCampaignReadInput::class)]
    public array $inputs;

    /**
     * The end date for filtering campaigns, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * A comma-separated list of property names to include in the response.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * The start date for filtering campaigns, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)->withInputs(...)
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
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs
     * @param list<string>|null $properties
     */
    public static function with(
        array $inputs,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        $self['inputs'] = $inputs;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $properties && $self['properties'] = $properties;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     *
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * The end date for filtering campaigns, in YYYY-MM-DD format.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * A comma-separated list of property names to include in the response.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The start date for filtering campaigns, in YYYY-MM-DD format.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
