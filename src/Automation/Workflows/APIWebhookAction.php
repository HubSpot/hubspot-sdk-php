<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIWebhookAction\Method;
use HubspotSDK\Automation\Workflows\APIWebhookAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_webhook_action = array{
 *   actionID: string,
 *   method: value-of<Method>,
 *   queryParams: list<APIInputVariable>,
 *   type: value-of<Type>,
 *   webhookURL: string,
 *   authSettings?: APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings,
 *   connection?: APIConnection,
 * }
 */
final class APIWebhookAction implements BaseModel
{
    /** @use SdkModel<api_webhook_action> */
    use SdkModel;

    /**
     * The ID for this action.
     */
    #[Api('actionId')]
    public string $actionID;

    /**
     * The HTTP method to use when calling the webhook URL.
     *
     * @var value-of<Method> $method
     */
    #[Api(enum: Method::class)]
    public string $method;

    /** @var list<APIInputVariable> $queryParams */
    #[Api(list: APIInputVariable::class)]
    public array $queryParams;

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The URL to call each time this action is executed.
     */
    #[Api('webhookUrl')]
    public string $webhookURL;

    /**
     * The type of auth to use when calling the webhook endpoint.
     */
    #[Api(optional: true)]
    public APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings|null $authSettings;

    #[Api(optional: true)]
    public ?APIConnection $connection;

    /**
     * `new APIWebhookAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIWebhookAction::with(
     *   actionID: ..., method: ..., queryParams: ..., type: ..., webhookURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIWebhookAction)
     *   ->withActionID(...)
     *   ->withMethod(...)
     *   ->withQueryParams(...)
     *   ->withType(...)
     *   ->withWebhookURL(...)
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
     * @param Method|value-of<Method> $method
     * @param list<APIInputVariable> $queryParams
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        Method|string $method,
        array $queryParams,
        string $webhookURL,
        Type|string $type = 'WEBHOOK',
        APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings|null $authSettings = null,
        ?APIConnection $connection = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj['method'] = $method;
        $obj->queryParams = $queryParams;
        $obj['type'] = $type;
        $obj->webhookURL = $webhookURL;

        null !== $authSettings && $obj->authSettings = $authSettings;
        null !== $connection && $obj->connection = $connection;

        return $obj;
    }

    /**
     * The ID for this action.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * The HTTP method to use when calling the webhook URL.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj['method'] = $method;

        return $obj;
    }

    /**
     * @param list<APIInputVariable> $queryParams
     */
    public function withQueryParams(array $queryParams): self
    {
        $obj = clone $this;
        $obj->queryParams = $queryParams;

        return $obj;
    }

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The URL to call each time this action is executed.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * The type of auth to use when calling the webhook endpoint.
     */
    public function withAuthSettings(
        APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings $authSettings
    ): self {
        $obj = clone $this;
        $obj->authSettings = $authSettings;

        return $obj;
    }

    public function withConnection(APIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
