<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams\DeliveryIdentifierType;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of accounts for a custom channel.
 *
 * @see HubSpotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::list()
 *
 * @phpstan-type ChannelAccountListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   defaultPageLength?: int|null,
 *   deliveryIdentifierType?: list<DeliveryIdentifierType|value-of<DeliveryIdentifierType>>|null,
 *   deliveryIdentifierValue?: list<string>|null,
 *   limit?: int|null,
 *   sort?: list<string>|null,
 * }
 */
final class ChannelAccountListParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountListParamsShape> */
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

    #[Optional]
    public ?int $defaultPageLength;

    /** @var list<value-of<DeliveryIdentifierType>>|null $deliveryIdentifierType */
    #[Optional(list: DeliveryIdentifierType::class)]
    public ?array $deliveryIdentifierType;

    /** @var list<string>|null $deliveryIdentifierValue */
    #[Optional(list: 'string')]
    public ?array $deliveryIdentifierValue;

    /**
     * The maximum number of results to display per page.
     */
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
     * @param list<DeliveryIdentifierType|value-of<DeliveryIdentifierType>>|null $deliveryIdentifierType
     * @param list<string>|null $deliveryIdentifierValue
     * @param list<string>|null $sort
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
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $defaultPageLength && $self['defaultPageLength'] = $defaultPageLength;
        null !== $deliveryIdentifierType && $self['deliveryIdentifierType'] = $deliveryIdentifierType;
        null !== $deliveryIdentifierValue && $self['deliveryIdentifierValue'] = $deliveryIdentifierValue;
        null !== $limit && $self['limit'] = $limit;
        null !== $sort && $self['sort'] = $sort;

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

    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $self = clone $this;
        $self['defaultPageLength'] = $defaultPageLength;

        return $self;
    }

    /**
     * @param list<DeliveryIdentifierType|value-of<DeliveryIdentifierType>> $deliveryIdentifierType
     */
    public function withDeliveryIdentifierType(
        array $deliveryIdentifierType
    ): self {
        $self = clone $this;
        $self['deliveryIdentifierType'] = $deliveryIdentifierType;

        return $self;
    }

    /**
     * @param list<string> $deliveryIdentifierValue
     */
    public function withDeliveryIdentifierValue(
        array $deliveryIdentifierValue
    ): self {
        $self = clone $this;
        $self['deliveryIdentifierValue'] = $deliveryIdentifierValue;

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
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
