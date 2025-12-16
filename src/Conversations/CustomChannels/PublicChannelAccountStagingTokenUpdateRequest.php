<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 *
 * @phpstan-type PublicChannelAccountStagingTokenUpdateRequestShape = array{
 *   accountName: string,
 *   deliveryIdentifier: PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 * }
 */
final class PublicChannelAccountStagingTokenUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountStagingTokenUpdateRequestShape> */
    use SdkModel;

    #[Required]
    public string $accountName;

    #[Required]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new PublicChannelAccountStagingTokenUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelAccountStagingTokenUpdateRequest::with(
     *   accountName: ..., deliveryIdentifier: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelAccountStagingTokenUpdateRequest)
     *   ->withAccountName(...)
     *   ->withDeliveryIdentifier(...)
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
     * @param PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public static function with(
        string $accountName,
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = new self;

        $self['accountName'] = $accountName;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }

    public function withAccountName(string $accountName): self
    {
        $self = clone $this;
        $self['accountName'] = $accountName;

        return $self;
    }

    /**
     * @param PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
