<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Transactional\EmailSendStatusView;
use HubspotSDK\Marketing\Transactional\PublicSingleSendEmail;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\TransactionalContract;

/**
 * @phpstan-import-type PublicSingleSendEmailShape from \HubspotSDK\Marketing\Transactional\PublicSingleSendEmail
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TransactionalService implements TransactionalContract
{
    /**
     * @api
     */
    public TransactionalRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TransactionalRawService($client);
    }

    /**
     * @api
     *
     * @param array<string,string> $contactProperties The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a reciept you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     * @param array<string,mixed> $customProperties The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     * @param int $emailID the content ID for the transactional email, which can be found in email tool UI
     * @param PublicSingleSendEmail|PublicSingleSendEmailShape $message
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        array $contactProperties,
        array $customProperties,
        int $emailID,
        PublicSingleSendEmail|array $message,
        RequestOptions|array|null $requestOptions = null,
    ): EmailSendStatusView {
        $params = Util::removeNulls(
            [
                'contactProperties' => $contactProperties,
                'customProperties' => $customProperties,
                'emailID' => $emailID,
                'message' => $message,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
