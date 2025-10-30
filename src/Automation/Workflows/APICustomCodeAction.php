<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APICustomCodeAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APICustomCodeActionShape = array{
 *   actionID: string,
 *   inputFields: list<APIInputVariable>,
 *   outputFields: list<APIEnumerationOutputField>,
 *   runtime: string,
 *   secretNames: list<string>,
 *   sourceCode: string,
 *   type: value-of<Type>,
 *   connection?: APIConnection,
 * }
 */
final class APICustomCodeAction implements BaseModel
{
    /** @use SdkModel<APICustomCodeActionShape> */
    use SdkModel;

    /**
     * The ID for this action.
     */
    #[Api('actionId')]
    public string $actionID;

    /** @var list<APIInputVariable> $inputFields */
    #[Api(list: APIInputVariable::class)]
    public array $inputFields;

    /**
     * The list of output fields that this custom action makes available to the rest of the flow.
     *
     * @var list<APIEnumerationOutputField> $outputFields
     */
    #[Api(list: APIEnumerationOutputField::class)]
    public array $outputFields;

    /**
     * The runtime to use to execute the source code. Supported runtimes are: "NODE16X", "NODE20X", "PYTHON39".
     */
    #[Api]
    public string $runtime;

    /**
     * The names of any "secrets" setup in this portal that will be used in this action.
     *
     * @var list<string> $secretNames
     */
    #[Api(list: 'string')]
    public array $secretNames;

    /**
     * The source code to execute when this action executes.
     */
    #[Api]
    public string $sourceCode;

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?APIConnection $connection;

    /**
     * `new APICustomCodeAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICustomCodeAction::with(
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
     * (new APICustomCodeAction)
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
     * @param list<APIInputVariable> $inputFields
     * @param list<APIEnumerationOutputField> $outputFields
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
        ?APIConnection $connection = null,
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
     * @param list<APIInputVariable> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $obj = clone $this;
        $obj->inputFields = $inputFields;

        return $obj;
    }

    /**
     * The list of output fields that this custom action makes available to the rest of the flow.
     *
     * @param list<APIEnumerationOutputField> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj->outputFields = $outputFields;

        return $obj;
    }

    /**
     * The runtime to use to execute the source code. Supported runtimes are: "NODE16X", "NODE20X", "PYTHON39".
     */
    public function withRuntime(string $runtime): self
    {
        $obj = clone $this;
        $obj->runtime = $runtime;

        return $obj;
    }

    /**
     * The names of any "secrets" setup in this portal that will be used in this action.
     *
     * @param list<string> $secretNames
     */
    public function withSecretNames(array $secretNames): self
    {
        $obj = clone $this;
        $obj->secretNames = $secretNames;

        return $obj;
    }

    /**
     * The source code to execute when this action executes.
     */
    public function withSourceCode(string $sourceCode): self
    {
        $obj = clone $this;
        $obj->sourceCode = $sourceCode;

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

    public function withConnection(APIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
