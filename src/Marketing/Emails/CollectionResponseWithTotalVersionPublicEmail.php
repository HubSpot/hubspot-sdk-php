<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;
use HubspotSDK\VersionUser;

/**
 * Response object for collections of marketing emails with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionPublicEmailShape = array{
 *   results: list<VersionPublicEmail>, total: int, paging?: Paging|null
 * }
 */
final class CollectionResponseWithTotalVersionPublicEmail implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionPublicEmailShape> */
    use SdkModel;

    /**
     * Collection of emails.
     *
     * @var list<VersionPublicEmail> $results
     */
    #[Required(list: VersionPublicEmail::class)]
    public array $results;

    /**
     * Total number of emails.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalVersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionPublicEmail::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionPublicEmail)
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
     * @param list<VersionPublicEmail|array{
     *   id: string,
     *   object: PublicEmail,
     *   updatedAt: \DateTimeInterface,
     *   user: VersionUser,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * Collection of emails.
     *
     * @param list<VersionPublicEmail|array{
     *   id: string,
     *   object: PublicEmail,
     *   updatedAt: \DateTimeInterface,
     *   user: VersionUser,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Total number of emails.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
