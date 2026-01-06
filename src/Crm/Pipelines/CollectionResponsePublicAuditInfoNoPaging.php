<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponsePublicAuditInfoNoPagingShape = array{
 *   results: list<PublicAuditInfo>
 * }
 */
final class CollectionResponsePublicAuditInfoNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicAuditInfoNoPagingShape> */
    use SdkModel;

    /** @var list<PublicAuditInfo> $results */
    #[Required(list: PublicAuditInfo::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicAuditInfoNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAuditInfoNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAuditInfoNoPaging)->withResults(...)
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
     * @param list<PublicAuditInfo|array{
     *   action: string,
     *   identifier: string,
     *   portalID: int,
     *   fromUserID?: int|null,
     *   message?: string|null,
     *   rawObject?: mixed,
     *   timestamp?: \DateTimeInterface|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<PublicAuditInfo|array{
     *   action: string,
     *   identifier: string,
     *   portalID: int,
     *   fromUserID?: int|null,
     *   message?: string|null,
     *   rawObject?: mixed,
     *   timestamp?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
