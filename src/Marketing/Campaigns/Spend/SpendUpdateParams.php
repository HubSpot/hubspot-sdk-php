<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Spend;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a specific campaign spend item by ID.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\SpendService::update()
 *
 * @phpstan-type SpendUpdateParamsShape = array{
 *   campaignGuid: string,
 *   amount: float,
 *   name: string,
 *   order: int,
 *   description?: string,
 * }
 */
final class SpendUpdateParams implements BaseModel
{
    /** @use SdkModel<SpendUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $campaignGuid;

    #[Required]
    public float $amount;

    #[Required]
    public string $name;

    #[Required]
    public int $order;

    #[Optional]
    public ?string $description;

    /**
     * `new SpendUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendUpdateParams::with(campaignGuid: ..., amount: ..., name: ..., order: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendUpdateParams)
     *   ->withCampaignGuid(...)
     *   ->withAmount(...)
     *   ->withName(...)
     *   ->withOrder(...)
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
     */
    public static function with(
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
    ): self {
        $self = new self;

        $self['campaignGuid'] = $campaignGuid;
        $self['amount'] = $amount;
        $self['name'] = $name;
        $self['order'] = $order;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $self = clone $this;
        $self['campaignGuid'] = $campaignGuid;

        return $self;
    }

    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOrder(int $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
