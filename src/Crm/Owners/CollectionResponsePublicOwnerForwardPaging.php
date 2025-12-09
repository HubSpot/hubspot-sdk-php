<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Owners\PublicOwner\Type;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;
use HubspotSDK\Settings\Users\PublicTeam;

/**
 * @phpstan-type CollectionResponsePublicOwnerForwardPagingShape = array{
 *   results: list<PublicOwner>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicOwnerForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicOwnerForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicOwner> $results */
    #[Required(list: PublicOwner::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicOwnerForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicOwnerForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicOwnerForwardPaging)->withResults(...)
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
     * @param list<PublicOwner|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   type: value-of<Type>,
     *   updatedAt: \DateTimeInterface,
     *   email?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   teams?: list<PublicTeam>|null,
     *   userId?: int|null,
     *   userIdIncludingInactive?: int|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<PublicOwner|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   type: value-of<Type>,
     *   updatedAt: \DateTimeInterface,
     *   email?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   teams?: list<PublicTeam>|null,
     *   userId?: int|null,
     *   userIdIncludingInactive?: int|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
