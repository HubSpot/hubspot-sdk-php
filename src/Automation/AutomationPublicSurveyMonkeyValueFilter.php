<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicSurveyMonkeyValueFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_survey_monkey_value_filter = array{
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   surveyID: string,
 *   surveyQuestion: string,
 *   valueComparison: AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 *   surveyAnswerColID?: string,
 *   surveyAnswerRowID?: string,
 * }
 */
final class AutomationPublicSurveyMonkeyValueFilter implements BaseModel
{
    /** @use SdkModel<automation_public_survey_monkey_value_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api('surveyId')]
    public string $surveyID;

    #[Api]
    public string $surveyQuestion;

    #[Api]
    public AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $valueComparison;

    #[Api('surveyAnswerColId', optional: true)]
    public ?string $surveyAnswerColID;

    #[Api('surveyAnswerRowId', optional: true)]
    public ?string $surveyAnswerRowID;

    /**
     * `new AutomationPublicSurveyMonkeyValueFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicSurveyMonkeyValueFilter::with(
     *   filterType: ...,
     *   operator: ...,
     *   surveyID: ...,
     *   surveyQuestion: ...,
     *   valueComparison: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicSurveyMonkeyValueFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSurveyID(...)
     *   ->withSurveyQuestion(...)
     *   ->withValueComparison(...)
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
        string $surveyQuestion,
        AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $valueComparison,
        FilterType|string $filterType = 'SURVEY_MONKEY_VALUE',
        ?string $surveyAnswerColID = null,
        ?string $surveyAnswerRowID = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj->operator = $operator;
        $obj->surveyID = $surveyID;
        $obj->surveyQuestion = $surveyQuestion;
        $obj->valueComparison = $valueComparison;

        null !== $surveyAnswerColID && $obj->surveyAnswerColID = $surveyAnswerColID;
        null !== $surveyAnswerRowID && $obj->surveyAnswerRowID = $surveyAnswerRowID;

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

    public function withSurveyQuestion(string $surveyQuestion): self
    {
        $obj = clone $this;
        $obj->surveyQuestion = $surveyQuestion;

        return $obj;
    }

    public function withValueComparison(
        AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $valueComparison,
    ): self {
        $obj = clone $this;
        $obj->valueComparison = $valueComparison;

        return $obj;
    }

    public function withSurveyAnswerColID(string $surveyAnswerColID): self
    {
        $obj = clone $this;
        $obj->surveyAnswerColID = $surveyAnswerColID;

        return $obj;
    }

    public function withSurveyAnswerRowID(string $surveyAnswerRowID): self
    {
        $obj = clone $this;
        $obj->surveyAnswerRowID = $surveyAnswerRowID;

        return $obj;
    }
}
