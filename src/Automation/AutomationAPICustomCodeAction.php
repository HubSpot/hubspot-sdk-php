<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPICustomCodeAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_custom_code_action = array{
 *   actionID: string,
 *   inputFields: list<AutomationAPIInputVariable>,
 *   outputFields: list<AutomationAPIEnumerationOutputField>,
 *   runtime: string,
 *   secretNames: list<string>,
 *   sourceCode: string,
 *   type: value-of<Type>,
 *   connection?: AutomationAPIConnection,
 * }
 */
final class AutomationAPICustomCodeAction implements BaseModel
{
    /** @use SdkModel<automation_api_custom_code_action> */
    use SdkModel;

    #[Api('actionId')]
    public string $actionID;

    /** @var list<AutomationAPIInputVariable> $inputFields */
    #[Api(list: AutomationAPIInputVariable::class)]
    public array $inputFields;

    /** @var list<AutomationAPIEnumerationOutputField> $outputFields */
    #[Api(list: AutomationAPIEnumerationOutputField::class)]
    public array $outputFields;

    #[Api]
    public string $runtime;

    /** @var list<string> $secretNames */
    #[Api(list: 'string')]
    public array $secretNames;

    #[Api]
    public string $sourceCode;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $connection;

    /**
     * `new AutomationAPICustomCodeAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPICustomCodeAction::with(
     *   actionID: ...,
     *   inputFields: ...,
     *   outputFields: ...,
     *   runtime: ...,
     *   secretNames: ...,
     *   sourceCode: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPICustomCodeAction)
     *   ->withActionID(...)
     *   ->withInputFields(...)
     *   ->withOutputFields(...)
     *   ->withRuntime(...)
     *   ->withSecretNames(...)
     *   ->withSourceCode(...)
     *   ->withType(...)
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
     * @param list<AutomationAPIInputVariable> $inputFields
     * @param list<AutomationAPIEnumerationOutputField> $outputFields
     * @param list<string> $secretNames
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        array $inputFields,
        array $outputFields,
        string $runtime,
        array $secretNames,
        string $sourceCode,
        Type|string $type = 'CUSTOM_CODE',
        ?AutomationAPIConnection $connection = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->inputFields = $inputFields;
        $obj->outputFields = $outputFields;
        $obj->runtime = $runtime;
        $obj->secretNames = $secretNames;
        $obj->sourceCode = $sourceCode;
        $obj['type'] = $type;

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
     * @param list<AutomationAPIInputVariable> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $obj = clone $this;
        $obj->inputFields = $inputFields;

        return $obj;
    }

    /**
     * @param list<AutomationAPIEnumerationOutputField> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj->outputFields = $outputFields;

        return $obj;
    }

    public function withRuntime(string $runtime): self
    {
        $obj = clone $this;
        $obj->runtime = $runtime;

        return $obj;
    }

    /**
     * @param list<string> $secretNames
     */
    public function withSecretNames(array $secretNames): self
    {
        $obj = clone $this;
        $obj->secretNames = $secretNames;

        return $obj;
    }

    public function withSourceCode(string $sourceCode): self
    {
        $obj = clone $this;
        $obj->sourceCode = $sourceCode;

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

    public function withConnection(AutomationAPIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
