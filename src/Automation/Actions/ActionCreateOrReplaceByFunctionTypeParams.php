<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionCreateOrReplaceByFunctionTypeParams); // set properties as needed
 * $client->automation.actions->createOrReplaceByFunctionType(...$params->toArray());
 * ```
 * Insert a function for a definition.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->createOrReplaceByFunctionType(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->createOrReplaceByFunctionType
 *
 * @phpstan-type action_create_or_replace_by_function_type_params = array{
 *   appID: int, definitionID: string, body: string
 * }
 */
final class ActionCreateOrReplaceByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<action_create_or_replace_by_function_type_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $definitionID;

    #[Api]
    public string $body;

    /**
     * `new ActionCreateOrReplaceByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCreateOrReplaceByFunctionTypeParams::with(
     *   appID: ..., definitionID: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCreateOrReplaceByFunctionTypeParams)
     *   ->withAppID(...)
     *   ->withDefinitionID(...)
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
     */
    public static function with(
        int $appID,
        string $definitionID,
        string $body
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->definitionID = $definitionID;
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

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
