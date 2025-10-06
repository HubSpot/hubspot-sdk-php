<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CallingUpdateParams); // set properties as needed
 * $client->crm.extensions.calling->update(...$params->toArray());
 * ```
 * Update channel connection settings.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.extensions.calling->update(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Extensions\Calling->update
 *
 * @phpstan-type calling_update_params = array{isReady?: bool, url?: string}
 */
final class CallingUpdateParams implements BaseModel
{
    /** @use SdkModel<calling_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $isReady;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $isReady && $obj->isReady = $isReady;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
