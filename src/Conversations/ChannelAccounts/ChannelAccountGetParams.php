<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\ChannelAccounts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ChannelAccountsService::get()
 *
 * @phpstan-type ChannelAccountGetParamsShape = array{archived?: bool}
 */
final class ChannelAccountGetParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $archived = null): self
    {
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }
}
