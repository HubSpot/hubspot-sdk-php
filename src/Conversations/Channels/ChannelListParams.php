<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Channels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ChannelsService::list()
 *
 * @phpstan-type ChannelListParamsShape = array{
 *   after?: string, defaultPageLength?: int, limit?: int, sort?: list<string>
 * }
 */
final class ChannelListParams implements BaseModel
{
    /** @use SdkModel<ChannelListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?int $defaultPageLength;

    #[Api(optional: true)]
    public ?int $limit;

    /** @var list<string>|null $sort */
    #[Api(list: 'string', optional: true)]
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
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $defaultPageLength && $obj->defaultPageLength = $defaultPageLength;
        null !== $limit && $obj->limit = $limit;
        null !== $sort && $obj->sort = $sort;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $obj = clone $this;
        $obj->defaultPageLength = $defaultPageLength;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }
}
