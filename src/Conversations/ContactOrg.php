<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactOrgShape = array{
 *   company?: string, department?: string, title?: string
 * }
 */
final class ContactOrg implements BaseModel
{
    /** @use SdkModel<ContactOrgShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $company;

    #[Api(optional: true)]
    public ?string $department;

    #[Api(optional: true)]
    public ?string $title;

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
        ?string $company = null,
        ?string $department = null,
        ?string $title = null
    ): self {
        $obj = new self;

        null !== $company && $obj->company = $company;
        null !== $department && $obj->department = $department;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    public function withCompany(string $company): self
    {
        $obj = clone $this;
        $obj->company = $company;

        return $obj;
    }

    public function withDepartment(string $department): self
    {
        $obj = clone $this;
        $obj->department = $department;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
