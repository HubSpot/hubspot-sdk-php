<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\ChannelAccounts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ChannelAccountsService::list()
 *
 * @phpstan-type ChannelAccountListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   channelID?: list<int>|null,
 *   defaultPageLength?: int|null,
 *   inboxID?: list<int>|null,
 *   limit?: int|null,
 *   sort?: list<string>|null,
 * }
 */
final class ChannelAccountListParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $archived;

    /** @var list<int>|null $channelID */
    #[Optional(list: 'int')]
    public ?array $channelID;

    #[Optional]
    public ?int $defaultPageLength;

    /** @var list<int>|null $inboxID */
    #[Optional(list: 'int')]
    public ?array $inboxID;

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
     * @param list<int> $channelID
     * @param list<int> $inboxID
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $channelID = null,
        ?int $defaultPageLength = null,
        ?array $inboxID = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $channelID && $self['channelID'] = $channelID;
        null !== $defaultPageLength && $self['defaultPageLength'] = $defaultPageLength;
        null !== $inboxID && $self['inboxID'] = $inboxID;
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

    /**
     * @param list<int> $channelID
     */
    public function withChannelID(array $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }

    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $self = clone $this;
        $self['defaultPageLength'] = $defaultPageLength;

        return $self;
    }

    /**
     * @param list<int> $inboxID
     */
    public function withInboxID(array $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

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
