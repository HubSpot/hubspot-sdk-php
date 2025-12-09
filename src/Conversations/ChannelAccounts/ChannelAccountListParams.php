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
 *   after?: string,
 *   archived?: bool,
 *   channelID?: list<int>,
 *   defaultPageLength?: int,
 *   inboxID?: list<int>,
 *   limit?: int,
 *   sort?: list<string>,
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
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $channelID && $obj['channelID'] = $channelID;
        null !== $defaultPageLength && $obj['defaultPageLength'] = $defaultPageLength;
        null !== $inboxID && $obj['inboxID'] = $inboxID;
        null !== $limit && $obj['limit'] = $limit;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * @param list<int> $channelID
     */
    public function withChannelID(array $channelID): self
    {
        $obj = clone $this;
        $obj['channelID'] = $channelID;

        return $obj;
    }

    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $obj = clone $this;
        $obj['defaultPageLength'] = $defaultPageLength;

        return $obj;
    }

    /**
     * @param list<int> $inboxID
     */
    public function withInboxID(array $inboxID): self
    {
        $obj = clone $this;
        $obj['inboxID'] = $inboxID;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
