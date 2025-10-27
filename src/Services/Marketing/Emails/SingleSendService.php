<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Emails;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\SingleSend\SingleSendSendParams;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\PublicSingleSendEmail;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Emails\SingleSendContract;

use const HubspotSDK\Core\OMIT as omit;

final class SingleSendService implements SingleSendContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a template email to a specific recipient.
     *
     * @param int $emailID the content ID for the email, which can be found in email tool UI
     * @param PublicSingleSendEmail $message a JSON object containing anything you want to override
     * @param array<string,
     * string,> $contactProperties The contactProperties field is a map of contact property values. Each contact property value contains a name and value property. Each property will get set on the contact record and will be visible in the template under {{ contact.NAME }}. Use these properties when you want to set a contact property while you’re sending the email. For example, when sending a receipt you may want to set a last_paid_date property, as the sending of the receipt will have information about the last payment.
     * @param array<string,
     * mixed,> $customProperties The customProperties field is a map of property values. Each property value contains a name and value property. Each property will be visible in the template under {{ custom.NAME }}.
     * Note: Custom properties do not currently support arrays. To provide a listing in an email, one workaround is to build an HTML list (either with tables or ul) and specify it as a custom property.
     *
     * @throws APIException
     */
    public function send(
        $emailID,
        $message,
        $contactProperties = omit,
        $customProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): EmailSendStatusView {
        $params = [
            'emailID' => $emailID,
            'message' => $message,
            'contactProperties' => $contactProperties,
            'customProperties' => $customProperties,
        ];

        return $this->sendRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): EmailSendStatusView {
        [$parsed, $options] = SingleSendSendParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v4/email/single-send',
            body: (object) $parsed,
            options: $options,
            convert: EmailSendStatusView::class,
        );
    }
}
