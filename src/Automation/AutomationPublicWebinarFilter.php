<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicWebinarFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_webinar_filter = array{
 *   filterType: value-of<FilterType>, operator: string, webinarID?: string
 * }
 */
final class AutomationPublicWebinarFilter implements BaseModel
{
    /** @use SdkModel<automation_public_webinar_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api('webinarId', optional: true)]
    public ?string $webinarID;

    /**
     * `new AutomationPublicWebinarFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicWebinarFilter::with(filterType: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicWebinarFilter)->withFilterType(...)->withOperator(...)
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
        string $operator,
        FilterType|string $filterType = 'WEBINAR',
        ?string $webinarID = null,
    ): self {
        $obj = new self;

        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;
        $obj->operator = $operator;

        null !== $webinarID && $obj->webinarID = $webinarID;

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

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withWebinarID(string $webinarID): self
    {
        $obj = clone $this;
        $obj->webinarID = $webinarID;

        return $obj;
    }
}
