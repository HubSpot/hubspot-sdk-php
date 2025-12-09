<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactOrgShape = array{
 *   company?: string|null, department?: string|null, title?: string|null
 * }
 */
final class ContactOrg implements BaseModel
{
    /** @use SdkModel<ContactOrgShape> */
    use SdkModel;

    #[Optional]
    public ?string $company;

    #[Optional]
    public ?string $department;

    #[Optional]
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

        null !== $company && $obj['company'] = $company;
        null !== $department && $obj['department'] = $department;
        null !== $title && $obj['title'] = $title;

        return $obj;
    }

    public function withCompany(string $company): self
    {
        $obj = clone $this;
        $obj['company'] = $company;

        return $obj;
    }

    public function withDepartment(string $department): self
    {
        $obj = clone $this;
        $obj['department'] = $department;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }
}
