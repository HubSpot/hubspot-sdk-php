<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Exports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Filter;

/**
 * @phpstan-type PublicCRMSearchRequestShape = array{
 *   filters: list<Filter>, query: string, sorts: list<string>
 * }
 */
final class PublicCRMSearchRequest implements BaseModel
{
    /** @use SdkModel<PublicCRMSearchRequestShape> */
    use SdkModel;

    /** @var list<Filter> $filters */
    #[Api(list: Filter::class)]
    public array $filters;

    #[Api]
    public string $query;

    /** @var list<string> $sorts */
    #[Api(list: 'string')]
    public array $sorts;

    /**
     * `new PublicCRMSearchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCRMSearchRequest::with(filters: ..., query: ..., sorts: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCRMSearchRequest)->withFilters(...)->withQuery(...)->withSorts(...)
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
     * @param list<Filter> $filters
     * @param list<string> $sorts
     */
    public static function with(
        array $filters,
        string $query,
        array $sorts
    ): self {
        $obj = new self;

        $obj->filters = $filters;
        $obj->query = $query;
        $obj->sorts = $sorts;

        return $obj;
    }

    /**
     * @param list<Filter> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }

    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj->query = $query;

        return $obj;
    }

    /**
     * @param list<string> $sorts
     */
    public function withSorts(array $sorts): self
    {
        $obj = clone $this;
        $obj->sorts = $sorts;

        return $obj;
    }
}
