<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings\Location;
use HubspotSDK\Automation\Workflows\APIWebhookAction\Method;
use HubspotSDK\Automation\Workflows\APIWebhookAction\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIWebhookActionShape = array{
 *   actionID: string,
 *   method: value-of<Method>,
 *   queryParams: list<APIInputVariable>,
 *   type: value-of<Type>,
 *   webhookURL: string,
 *   authSettings?: null|APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings,
 *   connection?: APIConnection|null,
 * }
 */
final class APIWebhookAction implements BaseModel
{
    /** @use SdkModel<APIWebhookActionShape> */
    use SdkModel;

    #[Required('actionId')]
    public string $actionID;

    /** @var value-of<Method> $method */
    #[Required(enum: Method::class)]
    public string $method;

    /** @var list<APIInputVariable> $queryParams */
    #[Required(list: APIInputVariable::class)]
    public array $queryParams;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required('webhookUrl')]
    public string $webhookURL;

    #[Optional]
    public APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings|null $authSettings;

    #[Optional]
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
     * @param list<APIInputVariable|array{
     *   name: string,
     *   value: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
     * }> $queryParams
     * @param Type|value-of<Type> $type
     * @param APIAuthKeyWebhookAuthSettings|array{
     *   location: value-of<Location>,
     *   name: string,
     *   secretName: string,
     *   type: value-of<APIAuthKeyWebhookAuthSettings\Type>,
     * }|APISignatureWebhookAuthSettings|array{
     *   appID: int,
     *   type: value-of<APISignatureWebhookAuthSettings\Type>,
     * } $authSettings
     * @param APIConnection|array{edgeType: string, nextActionID: string} $connection
     */
    public static function with(
        string $actionID,
        Method|string $method,
        array $queryParams,
        string $webhookURL,
        Type|string $type = 'WEBHOOK',
        APIAuthKeyWebhookAuthSettings|array|APISignatureWebhookAuthSettings|null $authSettings = null,
        APIConnection|array|null $connection = null,
    ): self {
        $obj = new self;

        $obj['actionID'] = $actionID;
        $obj['method'] = $method;
        $obj['queryParams'] = $queryParams;
        $obj['type'] = $type;
        $obj['webhookURL'] = $webhookURL;

        null !== $authSettings && $obj['authSettings'] = $authSettings;
        null !== $connection && $obj['connection'] = $connection;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionID'] = $actionID;

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
     * @param list<APIInputVariable|array{
     *   name: string,
     *   value: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
     * }> $queryParams
     */
    public function withQueryParams(array $queryParams): self
    {
        $obj = clone $this;
        $obj['queryParams'] = $queryParams;

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
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * @param APIAuthKeyWebhookAuthSettings|array{
     *   location: value-of<Location>,
     *   name: string,
     *   secretName: string,
     *   type: value-of<APIAuthKeyWebhookAuthSettings\Type>,
     * }|APISignatureWebhookAuthSettings|array{
     *   appID: int,
     *   type: value-of<APISignatureWebhookAuthSettings\Type>,
     * } $authSettings
     */
    public function withAuthSettings(
        APIAuthKeyWebhookAuthSettings|array|APISignatureWebhookAuthSettings $authSettings,
    ): self {
        $obj = clone $this;
        $obj['authSettings'] = $authSettings;

        return $obj;
    }

    /**
     * @param APIConnection|array{edgeType: string, nextActionID: string} $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $obj = clone $this;
        $obj['connection'] = $connection;

        return $obj;
    }
}
