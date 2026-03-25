<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubspotSDK\Marketing\Transactional\PublicSingleSendEmail
 *
 * @phpstan-type PublicSingleSendRequestEggShape = array{
 *   contactProperties: array<string,string>,
 *   customProperties: array<string,mixed>,
 *   emailID: int,
 *   message: PublicSingleSendEmail|PublicSingleSendEmailShape,
 * }
 */
final class PublicSingleSendRequestEgg implements BaseModel
{
    /** @use SdkModel<PublicSingleSendRequestEggShape> */
    use SdkModel;

    /**
     * The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a reciept you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     *
     * @var array<string,string> $contactProperties
     */
    #[Required(map: 'string')]
    public array $contactProperties;

    /**
     * The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     *
     * @var array<string,mixed> $customProperties
     */
    #[Required(map: 'mixed')]
    public array $customProperties;

    /**
     * The content ID for the transactional email, which can be found in email tool UI.
     */
    #[Required('emailId')]
    public int $emailID;

    #[Required]
    public PublicSingleSendEmail $message;

    /**
     * `new PublicSingleSendRequestEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSingleSendRequestEgg::with(
     *   contactProperties: ..., customProperties: ..., emailID: ..., message: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSingleSendRequestEgg)
     *   ->withContactProperties(...)
     *   ->withCustomProperties(...)
     *   ->withEmailID(...)
     *   ->withMessage(...)
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
     * @param PublicSingleSendEmail|PublicSingleSendEmailShape $message
     */
    public static function with(
        array $contactProperties,
        array $customProperties,
        int $emailID,
        PublicSingleSendEmail|array $message,
    ): self {
        $self = new self;

        $self['contactProperties'] = $contactProperties;
        $self['customProperties'] = $customProperties;
        $self['emailID'] = $emailID;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a reciept you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     *
     * @param array<string,string> $contactProperties
     */
    public function withContactProperties(array $contactProperties): self
    {
        $self = clone $this;
        $self['contactProperties'] = $contactProperties;

        return $self;
    }

    /**
     * The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     *
     * @param array<string,mixed> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    /**
     * The content ID for the transactional email, which can be found in email tool UI.
     */
    public function withEmailID(int $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }

    /**
     * @param PublicSingleSendEmail|PublicSingleSendEmailShape $message
     */
    public function withMessage(PublicSingleSendEmail|array $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
