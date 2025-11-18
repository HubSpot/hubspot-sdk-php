<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Inboxes;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details of a single conversations inbox using the inbox ID.
 *
 * @see HubspotSDK\Services\Conversations\InboxesService::get()
 *
 * @phpstan-type InboxGetParamsShape = array{archived?: bool}
 */
final class InboxGetParams implements BaseModel
{
    /** @use SdkModel<InboxGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to include archived inboxes in the response.
     */
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

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    /**
     * Whether to include archived inboxes in the response.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
