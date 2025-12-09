<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Inboxes;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\InboxesService::get()
 *
 * @phpstan-type InboxGetParamsShape = array{archived?: bool}
 */
final class InboxGetParams implements BaseModel
{
    /** @use SdkModel<InboxGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
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
