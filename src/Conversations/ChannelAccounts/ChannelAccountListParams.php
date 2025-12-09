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
 *   channelId?: list<int>,
 *   defaultPageLength?: int,
 *   inboxId?: list<int>,
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

    /** @var list<int>|null $channelId */
    #[Optional(list: 'int')]
    public ?array $channelId;

    #[Optional]
    public ?int $defaultPageLength;

    /** @var list<int>|null $inboxId */
    #[Optional(list: 'int')]
    public ?array $inboxId;

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
     * @param list<int> $channelId
     * @param list<int> $inboxId
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?array $channelId = null,
        ?int $defaultPageLength = null,
        ?array $inboxId = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $channelId && $obj['channelId'] = $channelId;
        null !== $defaultPageLength && $obj['defaultPageLength'] = $defaultPageLength;
        null !== $inboxId && $obj['inboxId'] = $inboxId;
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
        $obj['channelId'] = $channelID;

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
        $obj['inboxId'] = $inboxID;

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
