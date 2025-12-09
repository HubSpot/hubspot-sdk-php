<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\TaxRates;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of all tax rates set up in the account tax rate library.
 *
 * @see HubspotSDK\Services\Settings\TaxRatesService::list()
 *
 * @phpstan-type TaxRateListParamsShape = array{
 *   active?: bool, after?: string, limit?: int
 * }
 */
final class TaxRateListParams implements BaseModel
{
    /** @use SdkModel<TaxRateListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Include inactive rates.
     */
    #[Optional]
    public ?bool $active;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the paging.next.after JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

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
        ?bool $active = null,
        ?string $after = null,
        ?int $limit = null
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * Include inactive rates.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the paging.next.after JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
