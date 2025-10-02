<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type error_alias = array{
 *   category: string,
 *   correlationID: string,
 *   message: string,
 *   context?: array<string, list<string>>,
 *   errors?: list<ErrorDetail>,
 *   links?: array<string, string>,
 *   subCategory?: string,
 * }
 */
final class Error implements BaseModel
{
    /** @use SdkModel<error_alias> */
    use SdkModel;

    #[Api]
    public string $category;

    #[Api('correlationId')]
    public string $correlationID;

    #[Api]
    public string $message;

    /** @var array<string, list<string>>|null $context */
    #[Api(map: new ListOf('string'), optional: true)]
    public ?array $context;

    /** @var list<ErrorDetail>|null $errors */
    #[Api(list: ErrorDetail::class, optional: true)]
    public ?array $errors;

    /** @var array<string, string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    #[Api(optional: true)]
    public ?string $subCategory;

    /**
     * `new Error()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Error::with(category: ..., correlationID: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Error)->withCategory(...)->withCorrelationID(...)->withMessage(...)
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
     * @param array<string, list<string>> $context
     * @param list<ErrorDetail> $errors
     * @param array<string, string> $links
     */
    public static function with(
        string $category,
        string $correlationID,
        string $message,
        ?array $context = null,
        ?array $errors = null,
        ?array $links = null,
        ?string $subCategory = null,
    ): self {
        $obj = new self;

        $obj->category = $category;
        $obj->correlationID = $correlationID;
        $obj->message = $message;

        null !== $context && $obj->context = $context;
        null !== $errors && $obj->errors = $errors;
        null !== $links && $obj->links = $links;
        null !== $subCategory && $obj->subCategory = $subCategory;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj->correlationID = $correlationID;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * @param array<string, list<string>> $context
     */
    public function withContext(array $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * @param list<ErrorDetail> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    public function withSubCategory(string $subCategory): self
    {
        $obj = clone $this;
        $obj->subCategory = $subCategory;

        return $obj;
    }
}
