<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicClient\ClientType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_client = array{
 *   clientType: value-of<ClientType>, integrationAppID?: int
 * }
 */
final class PublicClient implements BaseModel
{
    /** @use SdkModel<public_client> */
    use SdkModel;

    /** @var value-of<ClientType> $clientType */
    #[Api(enum: ClientType::class)]
    public string $clientType;

    #[Api('integrationAppId', optional: true)]
    public ?int $integrationAppID;

    /**
     * `new PublicClient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicClient::with(clientType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicClient)->withClientType(...)
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
     *
     * @param ClientType|value-of<ClientType> $clientType
     */
    public static function with(
        ClientType|string $clientType,
        ?int $integrationAppID = null
    ): self {
        $obj = new self;

        $obj['clientType'] = $clientType;

        null !== $integrationAppID && $obj->integrationAppID = $integrationAppID;

        return $obj;
    }

    /**
     * @param ClientType|value-of<ClientType> $clientType
     */
    public function withClientType(ClientType|string $clientType): self
    {
        $obj = clone $this;
        $obj['clientType'] = $clientType;

        return $obj;
    }

    public function withIntegrationAppID(int $integrationAppID): self
    {
        $obj = clone $this;
        $obj->integrationAppID = $integrationAppID;

        return $obj;
    }
}
