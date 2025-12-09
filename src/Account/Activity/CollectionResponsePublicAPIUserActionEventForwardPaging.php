<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponsePublicAPIUserActionEventForwardPagingShape = array{
 *   results: list<PublicAPIUserActionEvent>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicAPIUserActionEventForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicAPIUserActionEventForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicAPIUserActionEvent> $results */
    #[Required(list: PublicAPIUserActionEvent::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicAPIUserActionEventForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAPIUserActionEventForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAPIUserActionEventForwardPaging)->withResults(...)
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
     * @param list<PublicAPIUserActionEvent|array{
     *   id: string,
     *   actingUser: ActingUser,
     *   action: string,
     *   category: string,
     *   occurredAt: \DateTimeInterface,
     *   subCategory?: string|null,
     *   targetObjectID?: string|null,
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
     * @param list<PublicAPIUserActionEvent|array{
     *   id: string,
     *   actingUser: ActingUser,
     *   action: string,
     *   category: string,
     *   occurredAt: \DateTimeInterface,
     *   subCategory?: string|null,
     *   targetObjectID?: string|null,
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
