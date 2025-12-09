<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicDeliveryIdentifierShape = array{type: string, value: string}
 */
final class PublicDeliveryIdentifier implements BaseModel
{
    /** @use SdkModel<PublicDeliveryIdentifierShape> */
    use SdkModel;

    #[Required]
    public string $type;

    #[Required]
    public string $value;

    /**
     * `new PublicDeliveryIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDeliveryIdentifier::with(type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDeliveryIdentifier)->withType(...)->withValue(...)
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
    public static function with(string $type, string $value): self
    {
        $obj = new self;

        $obj['type'] = $type;
        $obj['value'] = $value;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
