<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type APICollectionResponseJoinTimeAndRecordIDShape = array{
 *   results: list<JoinTimeAndRecordID>, paging?: Paging|null, total?: int|null
 * }
 */
final class APICollectionResponseJoinTimeAndRecordID implements BaseModel
{
    /** @use SdkModel<APICollectionResponseJoinTimeAndRecordIDShape> */
    use SdkModel;

    /** @var list<JoinTimeAndRecordID> $results */
    #[Required(list: JoinTimeAndRecordID::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    #[Optional]
    public ?int $total;

    /**
     * `new APICollectionResponseJoinTimeAndRecordID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICollectionResponseJoinTimeAndRecordID::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APICollectionResponseJoinTimeAndRecordID)->withResults(...)
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
     * @param list<JoinTimeAndRecordID|array{
     *   membershipTimestamp: \DateTimeInterface, recordID: string
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null,
        ?int $total = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<JoinTimeAndRecordID|array{
     *   membershipTimestamp: \DateTimeInterface, recordID: string
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
