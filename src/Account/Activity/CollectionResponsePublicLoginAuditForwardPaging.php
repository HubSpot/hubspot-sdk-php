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
 * @phpstan-type CollectionResponsePublicLoginAuditForwardPagingShape = array{
 *   results: list<PublicLoginAudit>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicLoginAuditForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicLoginAuditForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicLoginAudit> $results */
    #[Required(list: PublicLoginAudit::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicLoginAuditForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicLoginAuditForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicLoginAuditForwardPaging)->withResults(...)
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
     * @param list<PublicLoginAudit|array{
     *   id: string,
     *   loginAt: \DateTimeInterface,
     *   loginSucceeded: bool,
     *   countryCode?: string|null,
     *   email?: string|null,
     *   ipAddress?: string|null,
     *   location?: string|null,
     *   regionCode?: string|null,
     *   userAgent?: string|null,
     *   userID?: int|null,
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
     * @param list<PublicLoginAudit|array{
     *   id: string,
     *   loginAt: \DateTimeInterface,
     *   loginSucceeded: bool,
     *   countryCode?: string|null,
     *   email?: string|null,
     *   ipAddress?: string|null,
     *   location?: string|null,
     *   regionCode?: string|null,
     *   userAgent?: string|null,
     *   userID?: int|null,
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
