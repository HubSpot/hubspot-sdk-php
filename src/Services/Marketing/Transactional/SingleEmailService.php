<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Transactional;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Transactional\SingleEmailContract;

final class SingleEmailService implements SingleEmailContract
{
    /**
     * @api
     */
    public SingleEmailRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SingleEmailRawService($client);
    }

    /**
     * @api
     *
     * Asynchronously send a transactional email. Returns the status of the email send with a statusId that can be used to continuously query for the status using the Email Send Status API.
     *
     * @param int $emailID the content ID for the email, which can be found in email tool UI
     * @param array{
     *   to: string,
     *   bcc?: list<string>,
     *   cc?: list<string>,
     *   from?: string,
     *   replyTo?: list<string>,
     *   sendID?: string,
     * } $message A JSON object containing anything you want to override
     * @param array<string,string> $contactProperties The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a receipt you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     * @param array<string,mixed> $customProperties The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     *
     * @throws APIException
     */
    public function send(
        int $emailID,
        array $message,
        ?array $contactProperties = null,
        ?array $customProperties = null,
        ?RequestOptions $requestOptions = null,
    ): EmailSendStatusView {
        $params = Util::removeNulls(
            [
                'emailID' => $emailID,
                'message' => $message,
                'contactProperties' => $contactProperties,
                'customProperties' => $customProperties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
