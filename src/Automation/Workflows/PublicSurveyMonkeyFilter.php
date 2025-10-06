<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\PublicSurveyMonkeyFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_survey_monkey_filter = array{
 *   filterType: value-of<FilterType>, operator: string, surveyID: string
 * }
 */
final class PublicSurveyMonkeyFilter implements BaseModel
{
    /** @use SdkModel<public_survey_monkey_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api('surveyId')]
    public string $surveyID;

    /**
     * `new PublicSurveyMonkeyFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSurveyMonkeyFilter::with(filterType: ..., operator: ..., surveyID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSurveyMonkeyFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSurveyID(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $operator,
        string $surveyID,
        FilterType|string $filterType = 'SURVEY_MONKEY',
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj->operator = $operator;
        $obj->surveyID = $surveyID;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withSurveyID(string $surveyID): self
    {
        $obj = clone $this;
        $obj->surveyID = $surveyID;

        return $obj;
    }
}
