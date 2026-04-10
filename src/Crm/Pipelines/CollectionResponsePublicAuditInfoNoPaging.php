<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAuditInfoShape from \HubSpotSDK\Crm\Pipelines\PublicAuditInfo
 *
 * @phpstan-type CollectionResponsePublicAuditInfoNoPagingShape = array{
 *   results: list<PublicAuditInfo|PublicAuditInfoShape>
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
     * @param list<PublicAuditInfo|PublicAuditInfoShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicAuditInfo|PublicAuditInfoShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
