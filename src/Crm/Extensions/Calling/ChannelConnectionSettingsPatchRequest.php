<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChannelConnectionSettingsPatchRequestShape = array{
 *   isReady?: bool|null, url?: string|null
 * }
 */
final class ChannelConnectionSettingsPatchRequest implements BaseModel
{
    /** @use SdkModel<ChannelConnectionSettingsPatchRequestShape> */
    use SdkModel;

    #[Optional]
    public ?bool $isReady;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $isReady = null, ?string $url = null): self
    {
        $self = new self;

        null !== $isReady && $self['isReady'] = $isReady;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
