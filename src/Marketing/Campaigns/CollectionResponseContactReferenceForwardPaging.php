<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type ContactReferenceShape from \HubSpotSDK\Marketing\Campaigns\ContactReference
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseContactReferenceForwardPagingShape = array{
 *   results: list<ContactReference|ContactReferenceShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseContactReferenceForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseContactReferenceForwardPagingShape> */
    use SdkModel;

    /**
     * An array of contact references, each containing an identifier for a contact.
     *
     * @var list<ContactReference> $results
     */
    #[Required(list: ContactReference::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseContactReferenceForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseContactReferenceForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseContactReferenceForwardPaging)->withResults(...)
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
     * @param list<ContactReference|ContactReferenceShape> $results
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
     * An array of contact references, each containing an identifier for a contact.
     *
     * @param list<ContactReference|ContactReferenceShape> $results
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
