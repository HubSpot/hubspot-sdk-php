<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
 *
 * @see HubSpotSDK\Services\Marketing\EmailsService::listRevisions()
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
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    /**
     * The maximum number of results to display per page.
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
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
