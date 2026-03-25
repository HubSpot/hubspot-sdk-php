<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of sequences available in your HubSpot account. This endpoint allows you to filter sequences by user ID and name, and supports pagination for large result sets. Use this endpoint to manage and review your sequences effectively.
 *
 * @see HubspotSDK\Services\Automation\SequencesService::list()
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

    /**
     * The unique identifier of the user whose sequences are to be retrieved. This parameter is required.
     */
    #[Required]
    public string $userID;

    /**
     * The paging cursor token of the last successfully read resource. Use this for pagination to retrieve the next set of results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The name of the sequence to filter results by.
     */
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

    /**
     * The unique identifier of the user whose sequences are to be retrieved. This parameter is required.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource. Use this for pagination to retrieve the next set of results.
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

    /**
     * The name of the sequence to filter results by.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
