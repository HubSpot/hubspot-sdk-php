<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APICustomCodeAction\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APIInputVariableShape from \HubspotSDK\Automation\Workflows\APIInputVariable
 * @phpstan-import-type APIEnumerationOutputFieldShape from \HubspotSDK\Automation\Workflows\APIEnumerationOutputField
 * @phpstan-import-type APIConnectionShape from \HubspotSDK\Automation\Workflows\APIConnection
 *
 * @phpstan-type APICustomCodeActionShape = array{
 *   actionID: string,
 *   inputFields: list<APIInputVariableShape>,
 *   outputFields: list<APIEnumerationOutputFieldShape>,
 *   runtime: string,
 *   secretNames: list<string>,
 *   sourceCode: string,
 *   type: Type|value-of<Type>,
 *   connection?: null|APIConnection|APIConnectionShape,
 * }
 */
final class APICustomCodeAction implements BaseModel
{
    /** @use SdkModel<APICustomCodeActionShape> */
    use SdkModel;

    #[Required('actionId')]
    public string $actionID;

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
     * @param list<APIInputVariableShape> $inputFields
     * @param list<APIEnumerationOutputFieldShape> $outputFields
     * @param list<string> $secretNames
     * @param Type|value-of<Type> $type
     * @param APIConnection|APIConnectionShape|null $connection
     */
    public static function with(
        string $actionID,
        array $inputFields,
        array $outputFields,
        string $runtime,
        array $secretNames,
        string $sourceCode,
        Type|string $type = 'CUSTOM_CODE',
        APIConnection|array|null $connection = null,
    ): self {
        $self = new self;

        $self['actionID'] = $actionID;
        $self['inputFields'] = $inputFields;
        $self['outputFields'] = $outputFields;
        $self['runtime'] = $runtime;
        $self['secretNames'] = $secretNames;
        $self['sourceCode'] = $sourceCode;
        $self['type'] = $type;

        null !== $connection && $self['connection'] = $connection;

        return $self;
    }

    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    /**
     * @param list<APIInputVariableShape> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $self = clone $this;
        $self['inputFields'] = $inputFields;

        return $self;
    }

    /**
     * @param list<APIEnumerationOutputFieldShape> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $self = clone $this;
        $self['outputFields'] = $outputFields;

        return $self;
    }

    public function withRuntime(string $runtime): self
    {
        $self = clone $this;
        $self['runtime'] = $runtime;

        return $self;
    }

    /**
     * @param list<string> $secretNames
     */
    public function withSecretNames(array $secretNames): self
    {
        $self = clone $this;
        $self['secretNames'] = $secretNames;

        return $self;
    }

    public function withSourceCode(string $sourceCode): self
    {
        $self = clone $this;
        $self['sourceCode'] = $sourceCode;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APIConnection|APIConnectionShape $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $self = clone $this;
        $self['connection'] = $connection;

        return $self;
    }
}
