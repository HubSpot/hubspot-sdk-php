<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::listRevisions()
 *
 * @phpstan-type EmailListRevisionsParamsShape = array{
 *   after?: string|null, before?: string|null, limit?: int|null
 * }
 */
final class EmailListRevisionsParams implements BaseModel
{
    /** @use SdkModel<EmailListRevisionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The cursor token value to get the previous set of results. You can get this from the `paging.prev.before` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $before;

    /**
     * The maximum number of results to return. Default is 10.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The cursor token value to get the previous set of results. You can get this from the `paging.prev.before` JSON property of a paged response containing more results.
     */
    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * The maximum number of results to return. Default is 10.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
