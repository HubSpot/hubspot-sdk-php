<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicBudgetTotals\CurrencyCode;

/**
 * @phpstan-type public_budget_totals = array{
 *   budgetItems: list<PublicBudgetItem>,
 *   currencyCode: value-of<CurrencyCode>,
 *   spendItems: list<PublicSpendItem>,
 *   budgetTotal?: float,
 *   remainingBudget?: float,
 *   spendTotal?: float,
 * }
 */
final class PublicBudgetTotals implements BaseModel
{
    /** @use SdkModel<public_budget_totals> */
    use SdkModel;

    /** @var list<PublicBudgetItem> $budgetItems */
    #[Api(list: PublicBudgetItem::class)]
    public array $budgetItems;

    /** @var value-of<CurrencyCode> $currencyCode */
    #[Api(enum: CurrencyCode::class)]
    public string $currencyCode;

    /** @var list<PublicSpendItem> $spendItems */
    #[Api(list: PublicSpendItem::class)]
    public array $spendItems;

    #[Api(optional: true)]
    public ?float $budgetTotal;

    #[Api(optional: true)]
    public ?float $remainingBudget;

    #[Api(optional: true)]
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
     * @param list<PublicBudgetItem> $budgetItems
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     * @param list<PublicSpendItem> $spendItems
     */
    public static function with(
        array $budgetItems,
        CurrencyCode|string $currencyCode,
        array $spendItems,
        ?float $budgetTotal = null,
        ?float $remainingBudget = null,
        ?float $spendTotal = null,
    ): self {
        $obj = new self;

        $obj->budgetItems = $budgetItems;
        $obj['currencyCode'] = $currencyCode;
        $obj->spendItems = $spendItems;

        null !== $budgetTotal && $obj->budgetTotal = $budgetTotal;
        null !== $remainingBudget && $obj->remainingBudget = $remainingBudget;
        null !== $spendTotal && $obj->spendTotal = $spendTotal;

        return $obj;
    }

    /**
     * @param list<PublicBudgetItem> $budgetItems
     */
    public function withBudgetItems(array $budgetItems): self
    {
        $obj = clone $this;
        $obj->budgetItems = $budgetItems;

        return $obj;
    }

    /**
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $obj = clone $this;
        $obj['currencyCode'] = $currencyCode;

        return $obj;
    }

    /**
     * @param list<PublicSpendItem> $spendItems
     */
    public function withSpendItems(array $spendItems): self
    {
        $obj = clone $this;
        $obj->spendItems = $spendItems;

        return $obj;
    }

    public function withBudgetTotal(float $budgetTotal): self
    {
        $obj = clone $this;
        $obj->budgetTotal = $budgetTotal;

        return $obj;
    }

    public function withRemainingBudget(float $remainingBudget): self
    {
        $obj = clone $this;
        $obj->remainingBudget = $remainingBudget;

        return $obj;
    }

    public function withSpendTotal(float $spendTotal): self
    {
        $obj = clone $this;
        $obj->spendTotal = $spendTotal;

        return $obj;
    }
}
