<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APICustomCodeAction\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APICustomCodeActionShape = array{
 *   actionId: string,
 *   inputFields: list<APIInputVariable>,
 *   outputFields: list<APIEnumerationOutputField>,
 *   runtime: string,
 *   secretNames: list<string>,
 *   sourceCode: string,
 *   type: value-of<Type>,
 *   connection?: APIConnection|null,
 * }
 */
final class APICustomCodeAction implements BaseModel
{
    /** @use SdkModel<APICustomCodeActionShape> */
    use SdkModel;

    #[Required]
    public string $actionId;

    /** @var list<APIInputVariable> $inputFields */
    #[Required(list: APIInputVariable::class)]
    public array $inputFields;

    /** @var list<APIEnumerationOutputField> $outputFields */
    #[Required(list: APIEnumerationOutputField::class)]
    public array $outputFields;

    #[Required]
    public string $runtime;

    /** @var list<string> $secretNames */
    #[Required(list: 'string')]
    public array $secretNames;

    #[Required]
    public string $sourceCode;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APIConnection $connection;

    /**
     * `new APICustomCodeAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICustomCodeAction::with(
     *   actionId: ...,
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
     * @param list<APIInputVariable|array{
     *   name: string,
     *   value: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
     * }> $inputFields
     * @param list<APIEnumerationOutputField|array{
     *   name: string,
     *   options: list<string>,
     *   type: value-of<APIEnumerationOutputField\Type>,
     * }> $outputFields
     * @param list<string> $secretNames
     * @param Type|value-of<Type> $type
     * @param APIConnection|array{edgeType: string, nextActionId: string} $connection
     */
    public static function with(
        string $actionId,
        array $inputFields,
        array $outputFields,
        string $runtime,
        array $secretNames,
        string $sourceCode,
        Type|string $type = 'CUSTOM_CODE',
        APIConnection|array|null $connection = null,
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['inputFields'] = $inputFields;
        $obj['outputFields'] = $outputFields;
        $obj['runtime'] = $runtime;
        $obj['secretNames'] = $secretNames;
        $obj['sourceCode'] = $sourceCode;
        $obj['type'] = $type;

        null !== $connection && $obj['connection'] = $connection;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionId'] = $actionID;

        return $obj;
    }

    /**
     * @param list<APIInputVariable|array{
     *   name: string,
     *   value: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
     * }> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $obj = clone $this;
        $obj['inputFields'] = $inputFields;

        return $obj;
    }

    /**
     * @param list<APIEnumerationOutputField|array{
     *   name: string,
     *   options: list<string>,
     *   type: value-of<APIEnumerationOutputField\Type>,
     * }> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj['outputFields'] = $outputFields;

        return $obj;
    }

    public function withRuntime(string $runtime): self
    {
        $obj = clone $this;
        $obj['runtime'] = $runtime;

        return $obj;
    }

    /**
     * @param list<string> $secretNames
     */
    public function withSecretNames(array $secretNames): self
    {
        $obj = clone $this;
        $obj['secretNames'] = $secretNames;

        return $obj;
    }

    public function withSourceCode(string $sourceCode): self
    {
        $obj = clone $this;
        $obj['sourceCode'] = $sourceCode;

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

    /**
     * @param APIConnection|array{edgeType: string, nextActionId: string} $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $obj = clone $this;
        $obj['connection'] = $connection;

        return $obj;
    }
}
