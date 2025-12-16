<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-import-type JoinTimeAndRecordIDShape from \HubspotSDK\Crm\Lists\JoinTimeAndRecordID
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type APICollectionResponseJoinTimeAndRecordIDShape = array{
 *   results: list<JoinTimeAndRecordIDShape>,
 *   paging?: null|Paging|PagingShape,
 *   total?: int|null,
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
     * @param list<JoinTimeAndRecordIDShape> $results
     * @param PagingShape $paging
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
     * @param list<JoinTimeAndRecordIDShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param PagingShape $paging
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
