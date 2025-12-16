<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Inboxes;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\InboxesService::list()
 *
 * @phpstan-type InboxListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   defaultPageLength?: int|null,
 *   limit?: int|null,
 *   sort?: list<string>|null,
 * }
 */
final class InboxListParams implements BaseModel
{
    /** @use SdkModel<InboxListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?int $defaultPageLength;

    #[Optional]
    public ?int $limit;

    /** @var list<string>|null $sort */
    #[Optional(list: 'string')]
    public ?array $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $defaultPageLength && $self['defaultPageLength'] = $defaultPageLength;
        null !== $limit && $self['limit'] = $limit;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $self = clone $this;
        $self['defaultPageLength'] = $defaultPageLength;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
