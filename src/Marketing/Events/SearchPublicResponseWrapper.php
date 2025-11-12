<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SearchPublicResponseWrapperShape = array{
 *   appId: int,
 *   externalAccountId: string,
 *   externalEventId: string,
 *   objectId: string,
 * }
 */
final class SearchPublicResponseWrapper implements BaseModel
{
    /** @use SdkModel<SearchPublicResponseWrapperShape> */
    use SdkModel;

    #[Api]
    public int $appId;

    #[Api]
    public string $externalAccountId;

    #[Api]
    public string $externalEventId;

    #[Api]
    public string $objectId;

    /**
     * `new SearchPublicResponseWrapper()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SearchPublicResponseWrapper::with(
     *   appId: ..., externalAccountId: ..., externalEventId: ..., objectId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SearchPublicResponseWrapper)
     *   ->withAppID(...)
     *   ->withExternalAccountID(...)
     *   ->withExternalEventID(...)
     *   ->withObjectID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        int $appId,
        string $externalAccountId,
        string $externalEventId,
        string $objectId,
    ): self {
        $obj = new self;

        $obj->appId = $appId;
        $obj->externalAccountId = $externalAccountId;
        $obj->externalEventId = $externalEventId;
        $obj->objectId = $objectId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountId = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventId = $externalEventID;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }
}
