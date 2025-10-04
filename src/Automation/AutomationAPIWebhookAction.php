<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIWebhookAction\Method;
use HubspotSDK\Automation\AutomationAPIWebhookAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_webhook_action = array{
 *   actionID: string,
 *   method: value-of<Method>,
 *   queryParams: list<AutomationAPIInputVariable>,
 *   type: value-of<Type>,
 *   webhookURL: string,
 *   authSettings?: AutomationAPIAuthKeyWebhookAuthSettings|AutomationAPISignatureWebhookAuthSettings,
 *   connection?: AutomationAPIConnection,
 * }
 */
final class AutomationAPIWebhookAction implements BaseModel
{
    /** @use SdkModel<automation_api_webhook_action> */
    use SdkModel;

    #[Api('actionId')]
    public string $actionID;

    /** @var value-of<Method> $method */
    #[Api(enum: Method::class)]
    public string $method;

    /** @var list<AutomationAPIInputVariable> $queryParams */
    #[Api(list: AutomationAPIInputVariable::class)]
    public array $queryParams;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api('webhookUrl')]
    public string $webhookURL;

    #[Api(optional: true)]
    public AutomationAPIAuthKeyWebhookAuthSettings|AutomationAPISignatureWebhookAuthSettings|null $authSettings;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $connection;

    /**
     * `new AutomationAPIWebhookAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIWebhookAction::with(
     *   actionID: ..., method: ..., queryParams: ..., type: ..., webhookURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIWebhookAction)
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
     * @param list<AutomationAPIInputVariable> $queryParams
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        Method|string $method,
        array $queryParams,
        string $webhookURL,
        Type|string $type = 'WEBHOOK',
        AutomationAPIAuthKeyWebhookAuthSettings|AutomationAPISignatureWebhookAuthSettings|null $authSettings = null,
        ?AutomationAPIConnection $connection = null,
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

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj['method'] = $method;

        return $obj;
    }

    /**
     * @param list<AutomationAPIInputVariable> $queryParams
     */
    public function withQueryParams(array $queryParams): self
    {
        $obj = clone $this;
        $obj->queryParams = $queryParams;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }

    public function withAuthSettings(
        AutomationAPIAuthKeyWebhookAuthSettings|AutomationAPISignatureWebhookAuthSettings $authSettings,
    ): self {
        $obj = clone $this;
        $obj->authSettings = $authSettings;

        return $obj;
    }

    public function withConnection(AutomationAPIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
