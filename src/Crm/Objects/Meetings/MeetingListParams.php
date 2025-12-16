<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a page of meetings. Control what is returned via the `properties` query param.
 *
 * @see HubspotSDK\Services\Crm\Objects\MeetingsService::list()
 *
 * @phpstan-type MeetingListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   associations?: list<string>|null,
 *   limit?: int|null,
 *   properties?: list<string>|null,
 *   propertiesWithHistory?: list<string>|null,
 * }
 */
final class MeetingListParams implements BaseModel
{
    /** @use SdkModel<MeetingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     *
     * @var list<string>|null $associations
     */
    #[Optional(list: 'string')]
    public ?array $associations;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of meetings that can be read by a single request.
     *
     * @var list<string>|null $propertiesWithHistory
     */
    #[Optional(list: 'string')]
    public ?array $propertiesWithHistory;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $associations = null,
        ?int $limit = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $associations && $self['associations'] = $associations;
        null !== $limit && $self['limit'] = $limit;
        null !== $properties && $self['properties'] = $properties;
        null !== $propertiesWithHistory && $self['propertiesWithHistory'] = $propertiesWithHistory;

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
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     *
     * @param list<string> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

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
     * A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of meetings that can be read by a single request.
     *
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $self = clone $this;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        return $self;
    }
}
