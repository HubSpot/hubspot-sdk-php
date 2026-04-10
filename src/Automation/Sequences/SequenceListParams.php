<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of sequences available in your HubSpot account. This endpoint allows you to filter sequences by user ID and name, and supports pagination for large result sets. Use this endpoint to manage and review your sequences effectively.
 *
 * @see HubSpotSDK\Services\Automation\SequencesService::list()
 *
 * @phpstan-type SequenceListParamsShape = array{
 *   userID: string, after?: string|null, limit?: int|null, name?: string|null
 * }
 */
final class SequenceListParams implements BaseModel
{
    /** @use SdkModel<SequenceListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $userID;

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

    #[Optional]
    public ?string $name;

    /**
     * `new SequenceListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SequenceListParams::with(userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SequenceListParams)->withUserID(...)
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
        string $userID,
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null
    ): self {
        $self = new self;

        $self['userID'] = $userID;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
