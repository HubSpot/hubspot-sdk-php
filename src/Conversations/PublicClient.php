<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicClient\ClientType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicClientShape = array{
 *   clientType?: value-of<ClientType>, integrationAppID?: int
 * }
 */
final class PublicClient implements BaseModel
{
    /** @use SdkModel<PublicClientShape> */
    use SdkModel;

    /**
     * The type of the client.
     *
     * @var value-of<ClientType>|null $clientType
     */
    #[Api(enum: ClientType::class, optional: true)]
    public ?string $clientType;

    /**
     * The ID of the client if the client is an integration.
     */
    #[Api('integrationAppId', optional: true)]
    public ?int $integrationAppID;

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
        ClientType|string|null $clientType = null,
        ?int $integrationAppID = null
    ): self {
        $obj = new self;

        null !== $clientType && $obj['clientType'] = $clientType;
        null !== $integrationAppID && $obj->integrationAppID = $integrationAppID;

        return $obj;
    }

    /**
     * The type of the client.
     *
     * @param ClientType|value-of<ClientType> $clientType
     */
    public function withClientType(ClientType|string $clientType): self
    {
        $obj = clone $this;
        $obj['clientType'] = $clientType;

        return $obj;
    }

    /**
     * The ID of the client if the client is an integration.
     */
    public function withIntegrationAppID(int $integrationAppID): self
    {
        $obj = clone $this;
        $obj->integrationAppID = $integrationAppID;

        return $obj;
    }
}
