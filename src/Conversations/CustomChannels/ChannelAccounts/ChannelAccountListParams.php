<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of accounts for a custom channel.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::list()
 *
 * @phpstan-type ChannelAccountListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   defaultPageLength?: int,
 *   deliveryIdentifierType?: list<string>,
 *   deliveryIdentifierValue?: list<string>,
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

    #[Optional]
    public ?int $defaultPageLength;

    /** @var list<string>|null $deliveryIdentifierType */
    #[Optional(list: 'string')]
    public ?array $deliveryIdentifierType;

    /** @var list<string>|null $deliveryIdentifierValue */
    #[Optional(list: 'string')]
    public ?array $deliveryIdentifierValue;

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
     * @param list<string> $deliveryIdentifierType
     * @param list<string> $deliveryIdentifierValue
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?int $defaultPageLength = null,
        ?array $deliveryIdentifierType = null,
        ?array $deliveryIdentifierValue = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $defaultPageLength && $obj['defaultPageLength'] = $defaultPageLength;
        null !== $deliveryIdentifierType && $obj['deliveryIdentifierType'] = $deliveryIdentifierType;
        null !== $deliveryIdentifierValue && $obj['deliveryIdentifierValue'] = $deliveryIdentifierValue;
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

    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $obj = clone $this;
        $obj['defaultPageLength'] = $defaultPageLength;

        return $obj;
    }

    /**
     * @param list<string> $deliveryIdentifierType
     */
    public function withDeliveryIdentifierType(
        array $deliveryIdentifierType
    ): self {
        $obj = clone $this;
        $obj['deliveryIdentifierType'] = $deliveryIdentifierType;

        return $obj;
    }

    /**
     * @param list<string> $deliveryIdentifierValue
     */
    public function withDeliveryIdentifierValue(
        array $deliveryIdentifierValue
    ): self {
        $obj = clone $this;
        $obj['deliveryIdentifierValue'] = $deliveryIdentifierValue;

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
