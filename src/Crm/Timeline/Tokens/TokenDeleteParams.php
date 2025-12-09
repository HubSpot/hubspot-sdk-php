<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Tokens;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing token from a specific event type template.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TokensService::delete()
 *
 * @phpstan-type TokenDeleteParamsShape = array{
 *   appID: int, eventTemplateID: string
 * }
 */
final class TokenDeleteParams implements BaseModel
{
    /** @use SdkModel<TokenDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $eventTemplateID;

    /**
     * `new TokenDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenDeleteParams::with(appID: ..., eventTemplateID: ...)
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
    public static function with(int $appID, string $eventTemplateID): self
    {
        $obj = new self;

        $obj['appID'] = $appID;
        $obj['eventTemplateID'] = $eventTemplateID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj['eventTemplateID'] = $eventTemplateID;

        return $obj;
    }
}
