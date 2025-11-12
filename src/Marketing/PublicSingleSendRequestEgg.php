<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A request to send a single email asynchronously.
 *
 * @phpstan-type PublicSingleSendRequestEggShape = array{
 *   emailId: int,
 *   message: PublicSingleSendEmail,
 *   contactProperties?: array<string,string>|null,
 *   customProperties?: array<string,mixed>|null,
 * }
 */
final class PublicSingleSendRequestEgg implements BaseModel
{
    /** @use SdkModel<PublicSingleSendRequestEggShape> */
    use SdkModel;

    /**
     * The content ID for the email, which can be found in email tool UI.
     */
    #[Api]
    public int $emailId;

    /**
     * A JSON object containing anything you want to override.
     */
    #[Api]
    public PublicSingleSendEmail $message;

    /**
     * The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a receipt you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     *
     * @var array<string,string>|null $contactProperties
     */
    #[Api(map: 'string', optional: true)]
    public ?array $contactProperties;

    /**
     * The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     *
     * @var array<string,mixed>|null $customProperties
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $customProperties;

    /**
     * `new PublicSingleSendRequestEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSingleSendRequestEgg::with(emailId: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSingleSendRequestEgg)->withEmailID(...)->withMessage(...)
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
     * @param array<string,string> $contactProperties
     * @param array<string,mixed> $customProperties
     */
    public static function with(
        int $emailId,
        PublicSingleSendEmail $message,
        ?array $contactProperties = null,
        ?array $customProperties = null,
    ): self {
        $obj = new self;

        $obj->emailId = $emailId;
        $obj->message = $message;

        null !== $contactProperties && $obj->contactProperties = $contactProperties;
        null !== $customProperties && $obj->customProperties = $customProperties;

        return $obj;
    }

    /**
     * The content ID for the email, which can be found in email tool UI.
     */
    public function withEmailID(int $emailID): self
    {
        $obj = clone $this;
        $obj->emailId = $emailID;

        return $obj;
    }

    /**
     * A JSON object containing anything you want to override.
     */
    public function withMessage(PublicSingleSendEmail $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a receipt you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     *
     * @param array<string,string> $contactProperties
     */
    public function withContactProperties(array $contactProperties): self
    {
        $obj = clone $this;
        $obj->contactProperties = $contactProperties;

        return $obj;
    }

    /**
     * The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     *
     * @param array<string,mixed> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

        return $obj;
    }
}
