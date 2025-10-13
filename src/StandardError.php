<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * Ye olde error.
 *
 * @phpstan-type standard_error = array{
 *   category: string,
 *   context: array<string, list<string>>,
 *   errors: list<ErrorDetail>,
 *   links: array<string, string>,
 *   message: string,
 *   status: string,
 *   id?: string,
 *   subCategory?: mixed,
 * }
 */
final class StandardError implements BaseModel
{
    /** @use SdkModel<standard_error> */
    use SdkModel;

    /**
     * The main category of the error.
     */
    #[Api]
    public string $category;

    /**
     * Additional context-specific information related to the error.
     *
     * @var array<string, list<string>> $context
     */
    #[Api(map: new ListOf('string'))]
    public array $context;

    /**
     * The detailed error objects.
     *
     * @var list<ErrorDetail> $errors
     */
    #[Api(list: ErrorDetail::class)]
    public array $errors;

    /**
     * URLs linking to documentation or resources associated with the error.
     *
     * @var array<string, string> $links
     */
    #[Api(map: 'string')]
    public array $links;

    /**
     * A human-readable string describing the error and possible remediation steps.
     */
    #[Api]
    public string $message;

    /**
     * The HTTP status code associated with the error.
     */
    #[Api]
    public string $status;

    /**
     * A unique ID for the error instance.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * A more specific error category within each main category.
     */
    #[Api(optional: true)]
    public mixed $subCategory;

    /**
     * `new StandardError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StandardError::with(
     *   category: ...,
     *   context: ...,
     *   errors: ...,
     *   links: ...,
     *   message: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StandardError)
     *   ->withCategory(...)
     *   ->withContext(...)
     *   ->withErrors(...)
     *   ->withLinks(...)
     *   ->withMessage(...)
     *   ->withStatus(...)
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
        array $context,
        array $errors,
        array $links,
        string $message,
        string $status,
        ?string $id = null,
        mixed $subCategory = null,
    ): self {
        $obj = new self;

        $obj->category = $category;
        $obj->context = $context;
        $obj->errors = $errors;
        $obj->links = $links;
        $obj->message = $message;
        $obj->status = $status;

        null !== $id && $obj->id = $id;
        null !== $subCategory && $obj->subCategory = $subCategory;

        return $obj;
    }

    /**
     * The main category of the error.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    /**
     * Additional context-specific information related to the error.
     *
     * @param array<string, list<string>> $context
     */
    public function withContext(array $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * The detailed error objects.
     *
     * @param list<ErrorDetail> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * URLs linking to documentation or resources associated with the error.
     *
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    /**
     * A human-readable string describing the error and possible remediation steps.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * The HTTP status code associated with the error.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * A unique ID for the error instance.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A more specific error category within each main category.
     */
    public function withSubCategory(mixed $subCategory): self
    {
        $obj = clone $this;
        $obj->subCategory = $subCategory;

        return $obj;
    }
}
