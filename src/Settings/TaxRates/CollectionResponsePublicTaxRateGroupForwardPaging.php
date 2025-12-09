<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\TaxRates;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponsePublicTaxRateGroupForwardPagingShape = array{
 *   results: list<PublicTaxRateGroup>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicTaxRateGroupForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicTaxRateGroupForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicTaxRateGroup> $results */
    #[Required(list: PublicTaxRateGroup::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicTaxRateGroupForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicTaxRateGroupForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicTaxRateGroupForwardPaging)->withResults(...)
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
     * @param list<PublicTaxRateGroup|array{
     *   id: string,
     *   active: bool,
     *   createdAt: \DateTimeInterface,
     *   label: string,
     *   name: string,
     *   percentageRate: float,
     *   updatedAt: \DateTimeInterface,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<PublicTaxRateGroup|array{
     *   id: string,
     *   active: bool,
     *   createdAt: \DateTimeInterface,
     *   label: string,
     *   name: string,
     *   percentageRate: float,
     *   updatedAt: \DateTimeInterface,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
