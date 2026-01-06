<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Revisions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the versions of a definition by ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\RevisionsService::list()
 *
 * @phpstan-type RevisionListParamsShape = array{
 *   appID: int, after?: string, limit?: int
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
        $obj = new self;

        $obj['appID'] = $appID;

        null !== $after && $obj['after'] = $after;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
