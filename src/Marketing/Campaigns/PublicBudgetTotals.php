<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\Campaigns\PublicBudgetTotals\CurrencyCode;

/**
 * @phpstan-import-type PublicBudgetItemShape from \HubSpotSDK\Marketing\Campaigns\PublicBudgetItem
 * @phpstan-import-type PublicSpendItemShape from \HubSpotSDK\Marketing\Campaigns\PublicSpendItem
 *
 * @phpstan-type PublicBudgetTotalsShape = array{
 *   budgetItems: list<PublicBudgetItem|PublicBudgetItemShape>,
 *   currencyCode: CurrencyCode|value-of<CurrencyCode>,
 *   spendItems: list<PublicSpendItem|PublicSpendItemShape>,
 *   budgetTotal?: float|null,
 *   remainingBudget?: float|null,
 *   spendTotal?: float|null,
 * }
 */
final class PublicBudgetTotals implements BaseModel
{
    /** @use SdkModel<PublicBudgetTotalsShape> */
    use SdkModel;

    /**
     * An array of budget items associated with the campaign. Each item is represented by a PublicBudgetItem object.
     *
     * @var list<PublicBudgetItem> $budgetItems
     */
    #[Required(list: PublicBudgetItem::class)]
    public array $budgetItems;

    /**
     * The currency code used for the budget and spend amounts, following ISO 4217 standards.
     *
     * @var value-of<CurrencyCode> $currencyCode
     */
    #[Required(enum: CurrencyCode::class)]
    public string $currencyCode;

    /**
     * An array of spend items associated with the campaign. Each item is represented by a PublicSpendItem object.
     *
     * @var list<PublicSpendItem> $spendItems
     */
    #[Required(list: PublicSpendItem::class)]
    public array $spendItems;

    /**
     * The total budget allocated for the campaign.
     */
    #[Optional]
    public ?float $budgetTotal;

    /**
     * The remaining budget available for the campaign after accounting for all spend items.
     */
    #[Optional]
    public ?float $remainingBudget;

    /**
     * The total amount spent across all spend items in the campaign.
     */
    #[Optional]
    public ?float $spendTotal;

    /**
     * `new PublicBudgetTotals()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBudgetTotals::with(budgetItems: ..., currencyCode: ..., spendItems: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicBudgetTotals)
     *   ->withBudgetItems(...)
     *   ->withCurrencyCode(...)
     *   ->withSpendItems(...)
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
     * @param list<PublicBudgetItem|PublicBudgetItemShape> $budgetItems
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     * @param list<PublicSpendItem|PublicSpendItemShape> $spendItems
     */
    public static function with(
        array $budgetItems,
        CurrencyCode|string $currencyCode,
        array $spendItems,
        ?float $budgetTotal = null,
        ?float $remainingBudget = null,
        ?float $spendTotal = null,
    ): self {
        $self = new self;

        $self['budgetItems'] = $budgetItems;
        $self['currencyCode'] = $currencyCode;
        $self['spendItems'] = $spendItems;

        null !== $budgetTotal && $self['budgetTotal'] = $budgetTotal;
        null !== $remainingBudget && $self['remainingBudget'] = $remainingBudget;
        null !== $spendTotal && $self['spendTotal'] = $spendTotal;

        return $self;
    }

    /**
     * An array of budget items associated with the campaign. Each item is represented by a PublicBudgetItem object.
     *
     * @param list<PublicBudgetItem|PublicBudgetItemShape> $budgetItems
     */
    public function withBudgetItems(array $budgetItems): self
    {
        $self = clone $this;
        $self['budgetItems'] = $budgetItems;

        return $self;
    }

    /**
     * The currency code used for the budget and spend amounts, following ISO 4217 standards.
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $self = clone $this;
        $self['currencyCode'] = $currencyCode;

        return $self;
    }

    /**
     * An array of spend items associated with the campaign. Each item is represented by a PublicSpendItem object.
     *
     * @param list<PublicSpendItem|PublicSpendItemShape> $spendItems
     */
    public function withSpendItems(array $spendItems): self
    {
        $self = clone $this;
        $self['spendItems'] = $spendItems;

        return $self;
    }

    /**
     * The total budget allocated for the campaign.
     */
    public function withBudgetTotal(float $budgetTotal): self
    {
        $self = clone $this;
        $self['budgetTotal'] = $budgetTotal;

        return $self;
    }

    /**
     * The remaining budget available for the campaign after accounting for all spend items.
     */
    public function withRemainingBudget(float $remainingBudget): self
    {
        $self = clone $this;
        $self['remainingBudget'] = $remainingBudget;

        return $self;
    }

    /**
     * The total amount spent across all spend items in the campaign.
     */
    public function withSpendTotal(float $spendTotal): self
    {
        $self = clone $this;
        $self['spendTotal'] = $spendTotal;

        return $self;
    }
}
