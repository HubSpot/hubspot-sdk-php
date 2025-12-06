<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Tokens;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing token from a specific event type template.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TokensService::delete()
 *
 * @phpstan-type TokenDeleteParamsShape = array{
 *   appId: int, eventTemplateId: string
 * }
 */
final class TokenDeleteParams implements BaseModel
{
    /** @use SdkModel<TokenDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    #[Api]
    public string $eventTemplateId;

    /**
     * `new TokenDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenDeleteParams::with(appId: ..., eventTemplateId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenDeleteParams)->withAppID(...)->withEventTemplateID(...)
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
    public static function with(int $appId, string $eventTemplateId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['eventTemplateId'] = $eventTemplateId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj['eventTemplateId'] = $eventTemplateID;

        return $obj;
    }
}
