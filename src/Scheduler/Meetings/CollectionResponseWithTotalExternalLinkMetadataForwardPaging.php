<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseWithTotalExternalLinkMetadataForwardPagingShape = array{
 *   results: list<ExternalLinkMetadata>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalExternalLinkMetadataForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseWithTotalExternalLinkMetadataForwardPagingShape>
     */
    use SdkModel;

    /** @var list<ExternalLinkMetadata> $results */
    #[Required(list: ExternalLinkMetadata::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalExternalLinkMetadataForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalExternalLinkMetadataForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalExternalLinkMetadataForwardPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<ExternalLinkMetadata|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   defaultLink: bool,
     *   link: string,
     *   organizerUserID: string,
     *   slug: string,
     *   type: string,
     *   userIDsOfLinkMembers: list<string>,
     *   name?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<ExternalLinkMetadata|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   defaultLink: bool,
     *   link: string,
     *   organizerUserID: string,
     *   slug: string,
     *   type: string,
     *   userIDsOfLinkMembers: list<string>,
     *   name?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

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
