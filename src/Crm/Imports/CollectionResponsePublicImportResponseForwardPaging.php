<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type PublicImportResponseShape from \HubSpotSDK\Crm\Imports\PublicImportResponse
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponsePublicImportResponseForwardPagingShape = array{
 *   results: list<PublicImportResponse|PublicImportResponseShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponsePublicImportResponseForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicImportResponseForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicImportResponse> $results */
    #[Required(list: PublicImportResponse::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicImportResponseForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicImportResponseForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicImportResponseForwardPaging)->withResults(...)
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
     * @param list<PublicImportResponse|PublicImportResponseShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
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
     * @param list<PublicImportResponse|PublicImportResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
