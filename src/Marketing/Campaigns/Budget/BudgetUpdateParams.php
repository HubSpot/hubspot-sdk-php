<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Budget;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a specific budget item by ID.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BudgetService::update()
 *
 * @phpstan-type BudgetUpdateParamsShape = array{
 *   campaignGuid: string,
 *   amount: float,
 *   name: string,
 *   order: int,
 *   description?: string,
 * }
 */
final class BudgetUpdateParams implements BaseModel
{
    /** @use SdkModel<BudgetUpdateParamsShape> */
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
     * `new BudgetUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BudgetUpdateParams::with(campaignGuid: ..., amount: ..., name: ..., order: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BudgetUpdateParams)
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

        $obj['campaignGuid'] = $campaignGuid;
        $obj['amount'] = $amount;
        $obj['name'] = $name;
        $obj['order'] = $order;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $obj = clone $this;
        $obj['campaignGuid'] = $campaignGuid;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withOrder(int $order): self
    {
        $obj = clone $this;
        $obj['order'] = $order;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
