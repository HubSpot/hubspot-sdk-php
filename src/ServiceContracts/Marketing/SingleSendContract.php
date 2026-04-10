<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\EmailSendStatusView;
use HubSpotSDK\Marketing\PublicSingleSendEmail;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubSpotSDK\Marketing\PublicSingleSendEmail
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SingleSendContract
{
    /**
     * @api
     *
     * @param array<string,string> $contactProperties The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a receipt you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     * @param array<string,mixed> $customProperties The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     * @param int $emailID the content ID for the email, which can be found in email tool UI
     * @param PublicSingleSendEmail|PublicSingleSendEmailShape $message
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $contactProperties,
        array $customProperties,
        int $emailID,
        PublicSingleSendEmail|array $message,
        RequestOptions|array|null $requestOptions = null,
    ): EmailSendStatusView;
}
