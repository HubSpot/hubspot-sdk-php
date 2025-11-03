<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\CustomChannelsPublicClient\ClientType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomChannelsPublicClientShape = array{
 *   clientType: value-of<ClientType>, integrationAppID?: int
 * }
 */
final class CustomChannelsPublicClient implements BaseModel
{
    /** @use SdkModel<CustomChannelsPublicClientShape> */
    use SdkModel;

    /** @var value-of<ClientType> $clientType */
    #[Api(enum: ClientType::class)]
    public string $clientType;

    #[Api('integrationAppId', optional: true)]
    public ?int $integrationAppID;

    /**
     * `new CustomChannelsPublicClient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomChannelsPublicClient::with(clientType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomChannelsPublicClient)->withClientType(...)
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
