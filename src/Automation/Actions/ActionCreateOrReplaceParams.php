<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionCreateOrReplaceParams); // set properties as needed
 * $client->automation.actions->createOrReplace(...$params->toArray());
 * ```
 * Update a function for a definition.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->createOrReplace(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->createOrReplace
 *
 * @phpstan-type action_create_or_replace_params = array{
 *   appID: int,
 *   definitionID: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 *   body: string,
 * }
 */
final class ActionCreateOrReplaceParams implements BaseModel
{
    /** @use SdkModel<action_create_or_replace_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $definitionID;

    /** @var value-of<FunctionType> $functionType */
    #[Api(enum: FunctionType::class)]
    public string $functionType;

    #[Api]
    public string $body;

    /**
     * `new ActionCreateOrReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCreateOrReplaceParams::with(
     *   appID: ..., definitionID: ..., functionType: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCreateOrReplaceParams)
     *   ->withAppID(...)
     *   ->withDefinitionID(...)
     *   ->withFunctionType(...)
     *   ->withBody(...)
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
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public static function with(
        int $appID,
        string $definitionID,
        FunctionType|string $functionType,
        string $body,
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->definitionID = $definitionID;
        $obj->functionType = $functionType instanceof FunctionType ? $functionType->value : $functionType;
        $obj->body = $body;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj->definitionID = $definitionID;

        return $obj;
    }

    /**
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $obj = clone $this;
        $obj->functionType = $functionType instanceof FunctionType ? $functionType->value : $functionType;

        return $obj;
    }

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
