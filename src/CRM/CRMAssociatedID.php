<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_associated_id = array{id: string, type: string}
 */
final class CRMAssociatedID implements BaseModel
{
    /** @use SdkModel<crm_associated_id> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $type;

    /**
     * `new CRMAssociatedID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMAssociatedID::with(id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMAssociatedID)->withID(...)->withType(...)
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
    public static function with(string $id, string $type): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->type = $type;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
