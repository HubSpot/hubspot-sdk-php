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
 * This endpoint reads a batch of campaigns based on the provided input data and returns the campaigns along with their associated assets.
 * The maximum number of items in a batch request is 50.
 * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
 * If duplicate campaign IDs are provided in the request, duplicates will be ignored. The response will include only unique IDs and will be returned without duplicates.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BatchService::get()
 *
 * @phpstan-import-type PublicCampaignReadInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   inputs: list<PublicCampaignReadInputShape>,
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

    /** @var list<PublicCampaignReadInput> $inputs */
    #[Required(list: PublicCampaignReadInput::class)]
    public array $inputs;

    /**
     * End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
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
     * @param list<PublicCampaignReadInputShape> $inputs
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
     * @param list<PublicCampaignReadInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
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
     * Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
