<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Revisions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the versions of a definition by ID.
 *
 * @see HubSpotSDK\Services\Automation\Actions\RevisionsService::list()
 *
 * @phpstan-type RevisionListParamsShape = array{
 *   appID: int, after?: string|null, limit?: int|null
 * }
 */
final class RevisionListParams implements BaseModel
{
    /** @use SdkModel<RevisionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * `new RevisionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionListParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionListParams)->withAppID(...)
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
     */
    public static function with(
        int $appID,
        ?string $after = null,
        ?int $limit = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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
