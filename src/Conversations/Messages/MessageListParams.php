<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Messages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   limit?: int,
 *   property?: string,
 *   sort?: list<string>,
 * }
 */
final class MessageListParams implements BaseModel
{
    /** @use SdkModel<MessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $property;

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
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $limit && $obj['limit'] = $limit;
        null !== $property && $obj['property'] = $property;
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

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

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
