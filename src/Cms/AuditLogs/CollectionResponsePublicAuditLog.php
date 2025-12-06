<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs;

use HubspotSDK\Cms\AuditLogs\PublicAuditLog\Event;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog\ObjectType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * The collection of audit logs.
 *
 * @phpstan-type CollectionResponsePublicAuditLogShape = array{
 *   results: list<PublicAuditLog>, paging?: Paging|null
 * }
 */
final class CollectionResponsePublicAuditLog implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicAuditLogShape> */
    use SdkModel;

    /** @var list<PublicAuditLog> $results */
    #[Api(list: PublicAuditLog::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponsePublicAuditLog()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAuditLog::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAuditLog)->withResults(...)
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
     * @param list<PublicAuditLog|array{
     *   event: value-of<Event>,
     *   fullName: string,
     *   objectId: string,
     *   objectName: string,
     *   objectType: value-of<ObjectType>,
     *   timestamp: \DateTimeInterface,
     *   userId: string,
     *   meta?: mixed,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<PublicAuditLog|array{
     *   event: value-of<Event>,
     *   fullName: string,
     *   objectId: string,
     *   objectName: string,
     *   objectType: value-of<ObjectType>,
     *   timestamp: \DateTimeInterface,
     *   userId: string,
     *   meta?: mixed,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

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
