<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountStagingTokenUpdateRequestShape = array{
 *   accountName: string, deliveryIdentifier: PublicDeliveryIdentifier
 * }
 */
final class PublicChannelAccountStagingTokenUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountStagingTokenUpdateRequestShape> */
    use SdkModel;

    #[Api]
    public string $accountName;

    #[Api]
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
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public static function with(
        string $accountName,
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $obj = new self;

        $obj['accountName'] = $accountName;
        $obj['deliveryIdentifier'] = $deliveryIdentifier;

        return $obj;
    }

    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj['accountName'] = $accountName;

        return $obj;
    }

    /**
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj['deliveryIdentifier'] = $deliveryIdentifier;

        return $obj;
    }
}
