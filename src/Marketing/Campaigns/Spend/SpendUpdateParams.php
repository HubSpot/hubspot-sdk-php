<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Spend;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $campaignGuid;

    #[Api]
    public float $amount;

    #[Api]
    public string $name;

    #[Api]
    public int $order;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->campaignGuid = $campaignGuid;
        $obj->amount = $amount;
        $obj->name = $name;
        $obj->order = $order;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $obj = clone $this;
        $obj->campaignGuid = $campaignGuid;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withOrder(int $order): self
    {
        $obj = clone $this;
        $obj->order = $order;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
