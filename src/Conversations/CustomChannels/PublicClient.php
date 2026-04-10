<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\PublicClient\ClientType;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicClientShape = array{
 *   clientType: ClientType|value-of<ClientType>, integrationAppID?: int|null
 * }
 */
final class PublicClient implements BaseModel
{
    /** @use SdkModel<PublicClientShape> */
    use SdkModel;

    /** @var value-of<ClientType> $clientType */
    #[Required(enum: ClientType::class)]
    public string $clientType;

    #[Optional('integrationAppId')]
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
        $self = new self;

        $self['clientType'] = $clientType;

        null !== $integrationAppID && $self['integrationAppID'] = $integrationAppID;

        return $self;
    }

    /**
     * @param ClientType|value-of<ClientType> $clientType
     */
    public function withClientType(ClientType|string $clientType): self
    {
        $self = clone $this;
        $self['clientType'] = $clientType;

        return $self;
    }

    public function withIntegrationAppID(int $integrationAppID): self
    {
        $self = clone $this;
        $self['integrationAppID'] = $integrationAppID;

        return $self;
    }
}
