<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicInListFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_in_list_filter = array{
 *   filterType: value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   metadata?: AutomationPublicInListFilterMetadata,
 * }
 */
final class AutomationPublicInListFilter implements BaseModel
{
    /** @use SdkModel<automation_public_in_list_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api('listId')]
    public string $listID;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public ?AutomationPublicInListFilterMetadata $metadata;

    /**
     * `new AutomationPublicInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicInListFilter::with(filterType: ..., listID: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicInListFilter)
     *   ->withFilterType(...)
     *   ->withListID(...)
     *   ->withOperator(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $listID,
        string $operator,
        FilterType|string $filterType = 'IN_LIST',
        ?AutomationPublicInListFilterMetadata $metadata = null,
    ): self {
        $obj = new self;

        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;
        $obj->listID = $listID;
        $obj->operator = $operator;

        null !== $metadata && $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withMetadata(
        AutomationPublicInListFilterMetadata $metadata
    ): self {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }
}
