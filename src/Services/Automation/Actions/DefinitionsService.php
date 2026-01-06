<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\FieldTypeDefinition;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\FieldType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\ReferencedObjectType;
use HubspotSDK\Automation\Actions\FieldTypeDefinition\Type;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition\SupportedValueType;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunction\FunctionType;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Option;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\DefinitionsContract;

final class DefinitionsService implements DefinitionsContract
{
    /**
     * @api
     */
    public DefinitionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DefinitionsRawService($client);
    }

    /**
     * @api
     *
     * Create a new custom workflow action.
     *
     * @param int $appID the ID of the app
     * @param list<array{
     *   functionSource: string,
     *   functionType: 'POST_ACTION_EXECUTION'|'POST_FETCH_OPTIONS'|'PRE_ACTION_EXECUTION'|'PRE_FETCH_OPTIONS'|FunctionType,
     *   id?: string,
     * }|PublicActionFunction> $functions
     * @param list<array{
     *   isRequired: bool,
     *   typeDefinition: array{
     *     externalOptions: bool,
     *     name: string,
     *     options: list<array{
     *       hidden: bool,
     *       label: string,
     *       value: string,
     *       description?: string,
     *       displayOrder?: int,
     *     }|Option>,
     *     type: 'bool'|'currency_number'|'date'|'datetime'|'enumeration'|'json'|'number'|'object_coordinates'|'phone_number'|'string'|Type,
     *     description?: string,
     *     externalOptionsReferenceType?: string,
     *     fieldType?: 'booleancheckbox'|'calculation_equation'|'calculation_read_time'|'calculation_rollup'|'calculation_score'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|'unknown'|FieldType,
     *     helpText?: string,
     *     label?: string,
     *     optionsURL?: string,
     *     referencedObjectType?: 'ABANDONED_CART'|'ACCEPTANCE_TEST'|'AD'|'AD_ACCOUNT'|'AD_CAMPAIGN'|'AD_GROUP'|'AI_FORECAST'|'ALL_PAGES'|'APPROVAL'|'APPROVAL_STEP'|'ATTRIBUTION'|'AUDIENCE'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM_FLOW'|'AUTOMATION_PLATFORM_FLOW_ACTION'|'BET_ALERT'|'BET_DELIVERABLE_SERVICE'|'BLOG_LISTING_PAGE'|'BLOG_POST'|'CALL'|'CAMPAIGN'|'CAMPAIGN_BUDGET_ITEM'|'CAMPAIGN_SPEND_ITEM'|'CAMPAIGN_STEP'|'CAMPAIGN_TEMPLATE'|'CAMPAIGN_TEMPLATE_STEP'|'CART'|'CHATFLOW'|'CLIP'|'CMS_URL'|'COMMERCE_PAYMENT'|'COMMUNICATION'|'COMPANY'|'CONTACT'|'CONTACT_CREATE_ATTRIBUTION'|'CONTENT'|'CONTENT_AUDIT'|'CONTENT_AUDIT_PAGE'|'CONVERSATION'|'CONVERSATION_INBOX'|'CONVERSATION_SESSION'|'CRM_PIPELINES_DUMMY_TYPE'|'CTA'|'CTA_VARIANT'|'DATA_PRIVACY_CONSENT'|'DATA_SYNC_STATE'|'DEAL'|'DEAL_CREATE_ATTRIBUTION'|'DEAL_REGISTRATION'|'DEAL_SPLIT'|'DISCOUNT'|'DISCOUNT_CODE'|'DISCOUNT_TEMPLATE'|'EMAIL'|'ENGAGEMENT'|'EXPORT'|'EXTERNAL_WEB_URL'|'FEE'|'FEEDBACK_SUBMISSION'|'FEEDBACK_SURVEY'|'FILE_MANAGER_FILE'|'FILE_MANAGER_FOLDER'|'FOLDER'|'FORECAST'|'FORM'|'FORM_SUBMISSION_INBOUNDDB'|'GOAL_TARGET'|'GOAL_TARGET_GROUP'|'GOAL_TEMPLATE'|'GSC_PROPERTY'|'HUB'|'IMPORT'|'INVOICE'|'KEYWORD'|'KNOWLEDGE_ARTICLE'|'LANDING_PAGE'|'LEAD'|'LINE_ITEM'|'MARKETING_CALENDAR'|'MARKETING_CAMPAIGN_UTM'|'MARKETING_EMAIL'|'MARKETING_EVENT'|'MARKETING_EVENT_ATTENDANCE'|'MARKETING_SMS'|'MEDIA_BRIDGE'|'MEETING_EVENT'|'MIC'|'NOTE'|'OBJECT_LIST'|'ORDER'|'OWNER'|'PARTNER_ACCOUNT'|'PARTNER_CLIENT'|'PARTNER_CLIENT_REVENUE'|'PAYMENT_LINK'|'PAYMENT_SCHEDULE'|'PAYMENT_SCHEDULE_INSTALLMENT'|'PERMISSIONS_TESTING'|'PLAYBOOK'|'PLAYBOOK_QUESTION'|'PLAYBOOK_SUBMISSION'|'PLAYBOOK_SUBMISSION_ANSWER'|'PLAYLIST'|'PLAYLIST_FOLDER'|'PORTAL'|'PORTAL_OBJECT_SYNC_MESSAGE'|'POSTAL_MAIL'|'PRIVACY_SCANNER_COOKIE'|'PRODUCT'|'PRODUCT_OR_FOLDER'|'PROPERTY_INFO'|'PUBLISHING_TASK'|'QUARANTINED_SUBMISSION'|'QUOTA'|'QUOTE'|'QUOTE_FIELD'|'QUOTE_MODULE'|'QUOTE_MODULE_FIELD'|'QUOTE_TEMPLATE'|'RESTORABLE_CRM_OBJECT'|'ROSTER'|'ROSTER_MEMBER'|'SALES_DOCUMENT'|'SALES_TASK'|'SALES_WORKLOAD'|'SALESFORCE_SYNC_ERROR'|'SCHEDULING_PAGE'|'SCHEMAS_BACKEND_TEST'|'SCORE_CONFIGURATION'|'SEQUENCE'|'SEQUENCE_ENROLLMENT'|'SEQUENCE_STEP'|'SEQUENCE_STEP_ENROLLMENT'|'SITE_PAGE'|'SNIPPET'|'SOCIAL_BROADCAST'|'SOCIAL_CHANNEL'|'SOCIAL_POST'|'SOCIAL_PROFILE'|'SOX_PROTECTED_DUMMY_TYPE'|'SOX_PROTECTED_TEST_TYPE'|'SUBMISSION_TAG'|'SUBSCRIPTION'|'TASK'|'TASK_TEMPLATE'|'TAX'|'TEMPLATE'|'TICKET'|'UNKNOWN'|'UNSUBSCRIBE'|'USER'|'VIEW'|'VIEW_BLOCK'|'WEB_INTERACTIVE'|ReferencedObjectType,
     *   }|FieldTypeDefinition,
     *   automationFieldType?: string,
     *   supportedValueTypes?: list<'STATIC_VALUE'|'OBJECT_PROPERTY'|'FIELD_DATA'|'FETCHED_OBJECT_PROPERTY'|'ENROLLMENT_EVENT_PROPERTY'|SupportedValueType>,
     * }|InputFieldDefinition> $inputFields
     * @param array<string,array{
     *   actionName: string,
     *   actionCardContent?: string,
     *   actionDescription?: string,
     *   appDisplayName?: string,
     *   executionRules?: array<string,string>,
     *   inputFieldDescriptions?: array<string,string>,
     *   inputFieldLabels?: array<string,string>,
     *   inputFieldOptionLabels?: array<string,array<string,string>>,
     *   outputFieldLabels?: array<string,string>,
     * }|PublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param list<array{
     *   conditions: array<string,mixed>, labelName: string
     * }|PublicExecutionTranslationRule> $executionRules
     * @param list<array<string,mixed>> $inputFieldDependencies
     * @param array{
     *   properties: list<string>
     * }|PublicObjectRequestOptions $objectRequestOptions
     * @param list<array{
     *   typeDefinition: array{
     *     externalOptions: bool,
     *     name: string,
     *     options: list<array{
     *       hidden: bool,
     *       label: string,
     *       value: string,
     *       description?: string,
     *       displayOrder?: int,
     *     }|Option>,
     *     type: 'bool'|'currency_number'|'date'|'datetime'|'enumeration'|'json'|'number'|'object_coordinates'|'phone_number'|'string'|Type,
     *     description?: string,
     *     externalOptionsReferenceType?: string,
     *     fieldType?: 'booleancheckbox'|'calculation_equation'|'calculation_read_time'|'calculation_rollup'|'calculation_score'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|'unknown'|FieldType,
     *     helpText?: string,
     *     label?: string,
     *     optionsURL?: string,
     *     referencedObjectType?: 'ABANDONED_CART'|'ACCEPTANCE_TEST'|'AD'|'AD_ACCOUNT'|'AD_CAMPAIGN'|'AD_GROUP'|'AI_FORECAST'|'ALL_PAGES'|'APPROVAL'|'APPROVAL_STEP'|'ATTRIBUTION'|'AUDIENCE'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM_FLOW'|'AUTOMATION_PLATFORM_FLOW_ACTION'|'BET_ALERT'|'BET_DELIVERABLE_SERVICE'|'BLOG_LISTING_PAGE'|'BLOG_POST'|'CALL'|'CAMPAIGN'|'CAMPAIGN_BUDGET_ITEM'|'CAMPAIGN_SPEND_ITEM'|'CAMPAIGN_STEP'|'CAMPAIGN_TEMPLATE'|'CAMPAIGN_TEMPLATE_STEP'|'CART'|'CHATFLOW'|'CLIP'|'CMS_URL'|'COMMERCE_PAYMENT'|'COMMUNICATION'|'COMPANY'|'CONTACT'|'CONTACT_CREATE_ATTRIBUTION'|'CONTENT'|'CONTENT_AUDIT'|'CONTENT_AUDIT_PAGE'|'CONVERSATION'|'CONVERSATION_INBOX'|'CONVERSATION_SESSION'|'CRM_PIPELINES_DUMMY_TYPE'|'CTA'|'CTA_VARIANT'|'DATA_PRIVACY_CONSENT'|'DATA_SYNC_STATE'|'DEAL'|'DEAL_CREATE_ATTRIBUTION'|'DEAL_REGISTRATION'|'DEAL_SPLIT'|'DISCOUNT'|'DISCOUNT_CODE'|'DISCOUNT_TEMPLATE'|'EMAIL'|'ENGAGEMENT'|'EXPORT'|'EXTERNAL_WEB_URL'|'FEE'|'FEEDBACK_SUBMISSION'|'FEEDBACK_SURVEY'|'FILE_MANAGER_FILE'|'FILE_MANAGER_FOLDER'|'FOLDER'|'FORECAST'|'FORM'|'FORM_SUBMISSION_INBOUNDDB'|'GOAL_TARGET'|'GOAL_TARGET_GROUP'|'GOAL_TEMPLATE'|'GSC_PROPERTY'|'HUB'|'IMPORT'|'INVOICE'|'KEYWORD'|'KNOWLEDGE_ARTICLE'|'LANDING_PAGE'|'LEAD'|'LINE_ITEM'|'MARKETING_CALENDAR'|'MARKETING_CAMPAIGN_UTM'|'MARKETING_EMAIL'|'MARKETING_EVENT'|'MARKETING_EVENT_ATTENDANCE'|'MARKETING_SMS'|'MEDIA_BRIDGE'|'MEETING_EVENT'|'MIC'|'NOTE'|'OBJECT_LIST'|'ORDER'|'OWNER'|'PARTNER_ACCOUNT'|'PARTNER_CLIENT'|'PARTNER_CLIENT_REVENUE'|'PAYMENT_LINK'|'PAYMENT_SCHEDULE'|'PAYMENT_SCHEDULE_INSTALLMENT'|'PERMISSIONS_TESTING'|'PLAYBOOK'|'PLAYBOOK_QUESTION'|'PLAYBOOK_SUBMISSION'|'PLAYBOOK_SUBMISSION_ANSWER'|'PLAYLIST'|'PLAYLIST_FOLDER'|'PORTAL'|'PORTAL_OBJECT_SYNC_MESSAGE'|'POSTAL_MAIL'|'PRIVACY_SCANNER_COOKIE'|'PRODUCT'|'PRODUCT_OR_FOLDER'|'PROPERTY_INFO'|'PUBLISHING_TASK'|'QUARANTINED_SUBMISSION'|'QUOTA'|'QUOTE'|'QUOTE_FIELD'|'QUOTE_MODULE'|'QUOTE_MODULE_FIELD'|'QUOTE_TEMPLATE'|'RESTORABLE_CRM_OBJECT'|'ROSTER'|'ROSTER_MEMBER'|'SALES_DOCUMENT'|'SALES_TASK'|'SALES_WORKLOAD'|'SALESFORCE_SYNC_ERROR'|'SCHEDULING_PAGE'|'SCHEMAS_BACKEND_TEST'|'SCORE_CONFIGURATION'|'SEQUENCE'|'SEQUENCE_ENROLLMENT'|'SEQUENCE_STEP'|'SEQUENCE_STEP_ENROLLMENT'|'SITE_PAGE'|'SNIPPET'|'SOCIAL_BROADCAST'|'SOCIAL_CHANNEL'|'SOCIAL_POST'|'SOCIAL_PROFILE'|'SOX_PROTECTED_DUMMY_TYPE'|'SOX_PROTECTED_TEST_TYPE'|'SUBMISSION_TAG'|'SUBSCRIPTION'|'TASK'|'TASK_TEMPLATE'|'TAX'|'TEMPLATE'|'TICKET'|'UNKNOWN'|'UNSUBSCRIBE'|'USER'|'VIEW'|'VIEW_BLOCK'|'WEB_INTERACTIVE'|ReferencedObjectType,
     *   }|FieldTypeDefinition,
     * }|OutputFieldDefinition> $outputFields
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $actionURL,
        array $functions,
        array $inputFields,
        array $labels,
        array $objectTypes,
        bool $published,
        ?int $archivedAt = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        array|PublicObjectRequestOptions|null $objectRequestOptions = null,
        ?array $outputFields = null,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
        $params = [
            'actionURL' => $actionURL,
            'functions' => $functions,
            'inputFields' => $inputFields,
            'labels' => $labels,
            'objectTypes' => $objectTypes,
            'published' => $published,
            'archivedAt' => $archivedAt,
            'executionRules' => $executionRules,
            'inputFieldDependencies' => $inputFieldDependencies,
            'objectRequestOptions' => $objectRequestOptions,
            'outputFields' => $outputFields,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing action definition by ID.
     *
     * @param string $definitionID path param: The ID of the custom action definition
     * @param int $appID path param: The ID of the app
     * @param string $actionURL Body param:
     * @param list<array{
     *   conditions: array<string,mixed>, labelName: string
     * }|PublicExecutionTranslationRule> $executionRules Body param:
     * @param list<array<string,mixed>> $inputFieldDependencies Body param:
     * @param list<array{
     *   isRequired: bool,
     *   typeDefinition: array{
     *     externalOptions: bool,
     *     name: string,
     *     options: list<array{
     *       hidden: bool,
     *       label: string,
     *       value: string,
     *       description?: string,
     *       displayOrder?: int,
     *     }|Option>,
     *     type: 'bool'|'currency_number'|'date'|'datetime'|'enumeration'|'json'|'number'|'object_coordinates'|'phone_number'|'string'|Type,
     *     description?: string,
     *     externalOptionsReferenceType?: string,
     *     fieldType?: 'booleancheckbox'|'calculation_equation'|'calculation_read_time'|'calculation_rollup'|'calculation_score'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|'unknown'|FieldType,
     *     helpText?: string,
     *     label?: string,
     *     optionsURL?: string,
     *     referencedObjectType?: 'ABANDONED_CART'|'ACCEPTANCE_TEST'|'AD'|'AD_ACCOUNT'|'AD_CAMPAIGN'|'AD_GROUP'|'AI_FORECAST'|'ALL_PAGES'|'APPROVAL'|'APPROVAL_STEP'|'ATTRIBUTION'|'AUDIENCE'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM_FLOW'|'AUTOMATION_PLATFORM_FLOW_ACTION'|'BET_ALERT'|'BET_DELIVERABLE_SERVICE'|'BLOG_LISTING_PAGE'|'BLOG_POST'|'CALL'|'CAMPAIGN'|'CAMPAIGN_BUDGET_ITEM'|'CAMPAIGN_SPEND_ITEM'|'CAMPAIGN_STEP'|'CAMPAIGN_TEMPLATE'|'CAMPAIGN_TEMPLATE_STEP'|'CART'|'CHATFLOW'|'CLIP'|'CMS_URL'|'COMMERCE_PAYMENT'|'COMMUNICATION'|'COMPANY'|'CONTACT'|'CONTACT_CREATE_ATTRIBUTION'|'CONTENT'|'CONTENT_AUDIT'|'CONTENT_AUDIT_PAGE'|'CONVERSATION'|'CONVERSATION_INBOX'|'CONVERSATION_SESSION'|'CRM_PIPELINES_DUMMY_TYPE'|'CTA'|'CTA_VARIANT'|'DATA_PRIVACY_CONSENT'|'DATA_SYNC_STATE'|'DEAL'|'DEAL_CREATE_ATTRIBUTION'|'DEAL_REGISTRATION'|'DEAL_SPLIT'|'DISCOUNT'|'DISCOUNT_CODE'|'DISCOUNT_TEMPLATE'|'EMAIL'|'ENGAGEMENT'|'EXPORT'|'EXTERNAL_WEB_URL'|'FEE'|'FEEDBACK_SUBMISSION'|'FEEDBACK_SURVEY'|'FILE_MANAGER_FILE'|'FILE_MANAGER_FOLDER'|'FOLDER'|'FORECAST'|'FORM'|'FORM_SUBMISSION_INBOUNDDB'|'GOAL_TARGET'|'GOAL_TARGET_GROUP'|'GOAL_TEMPLATE'|'GSC_PROPERTY'|'HUB'|'IMPORT'|'INVOICE'|'KEYWORD'|'KNOWLEDGE_ARTICLE'|'LANDING_PAGE'|'LEAD'|'LINE_ITEM'|'MARKETING_CALENDAR'|'MARKETING_CAMPAIGN_UTM'|'MARKETING_EMAIL'|'MARKETING_EVENT'|'MARKETING_EVENT_ATTENDANCE'|'MARKETING_SMS'|'MEDIA_BRIDGE'|'MEETING_EVENT'|'MIC'|'NOTE'|'OBJECT_LIST'|'ORDER'|'OWNER'|'PARTNER_ACCOUNT'|'PARTNER_CLIENT'|'PARTNER_CLIENT_REVENUE'|'PAYMENT_LINK'|'PAYMENT_SCHEDULE'|'PAYMENT_SCHEDULE_INSTALLMENT'|'PERMISSIONS_TESTING'|'PLAYBOOK'|'PLAYBOOK_QUESTION'|'PLAYBOOK_SUBMISSION'|'PLAYBOOK_SUBMISSION_ANSWER'|'PLAYLIST'|'PLAYLIST_FOLDER'|'PORTAL'|'PORTAL_OBJECT_SYNC_MESSAGE'|'POSTAL_MAIL'|'PRIVACY_SCANNER_COOKIE'|'PRODUCT'|'PRODUCT_OR_FOLDER'|'PROPERTY_INFO'|'PUBLISHING_TASK'|'QUARANTINED_SUBMISSION'|'QUOTA'|'QUOTE'|'QUOTE_FIELD'|'QUOTE_MODULE'|'QUOTE_MODULE_FIELD'|'QUOTE_TEMPLATE'|'RESTORABLE_CRM_OBJECT'|'ROSTER'|'ROSTER_MEMBER'|'SALES_DOCUMENT'|'SALES_TASK'|'SALES_WORKLOAD'|'SALESFORCE_SYNC_ERROR'|'SCHEDULING_PAGE'|'SCHEMAS_BACKEND_TEST'|'SCORE_CONFIGURATION'|'SEQUENCE'|'SEQUENCE_ENROLLMENT'|'SEQUENCE_STEP'|'SEQUENCE_STEP_ENROLLMENT'|'SITE_PAGE'|'SNIPPET'|'SOCIAL_BROADCAST'|'SOCIAL_CHANNEL'|'SOCIAL_POST'|'SOCIAL_PROFILE'|'SOX_PROTECTED_DUMMY_TYPE'|'SOX_PROTECTED_TEST_TYPE'|'SUBMISSION_TAG'|'SUBSCRIPTION'|'TASK'|'TASK_TEMPLATE'|'TAX'|'TEMPLATE'|'TICKET'|'UNKNOWN'|'UNSUBSCRIBE'|'USER'|'VIEW'|'VIEW_BLOCK'|'WEB_INTERACTIVE'|ReferencedObjectType,
     *   }|FieldTypeDefinition,
     *   automationFieldType?: string,
     *   supportedValueTypes?: list<'STATIC_VALUE'|'OBJECT_PROPERTY'|'FIELD_DATA'|'FETCHED_OBJECT_PROPERTY'|'ENROLLMENT_EVENT_PROPERTY'|SupportedValueType>,
     * }|InputFieldDefinition> $inputFields Body param:
     * @param array<string,array{
     *   actionName: string,
     *   actionCardContent?: string,
     *   actionDescription?: string,
     *   appDisplayName?: string,
     *   executionRules?: array<string,string>,
     *   inputFieldDescriptions?: array<string,string>,
     *   inputFieldLabels?: array<string,string>,
     *   inputFieldOptionLabels?: array<string,array<string,string>>,
     *   outputFieldLabels?: array<string,string>,
     * }|PublicActionLabels> $labels Body param:
     * @param array{
     *   properties: list<string>
     * }|PublicObjectRequestOptions $objectRequestOptions Body param:
     * @param list<string> $objectTypes Body param:
     * @param list<array{
     *   typeDefinition: array{
     *     externalOptions: bool,
     *     name: string,
     *     options: list<array{
     *       hidden: bool,
     *       label: string,
     *       value: string,
     *       description?: string,
     *       displayOrder?: int,
     *     }|Option>,
     *     type: 'bool'|'currency_number'|'date'|'datetime'|'enumeration'|'json'|'number'|'object_coordinates'|'phone_number'|'string'|Type,
     *     description?: string,
     *     externalOptionsReferenceType?: string,
     *     fieldType?: 'booleancheckbox'|'calculation_equation'|'calculation_read_time'|'calculation_rollup'|'calculation_score'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|'unknown'|FieldType,
     *     helpText?: string,
     *     label?: string,
     *     optionsURL?: string,
     *     referencedObjectType?: 'ABANDONED_CART'|'ACCEPTANCE_TEST'|'AD'|'AD_ACCOUNT'|'AD_CAMPAIGN'|'AD_GROUP'|'AI_FORECAST'|'ALL_PAGES'|'APPROVAL'|'APPROVAL_STEP'|'ATTRIBUTION'|'AUDIENCE'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM_FLOW'|'AUTOMATION_PLATFORM_FLOW_ACTION'|'BET_ALERT'|'BET_DELIVERABLE_SERVICE'|'BLOG_LISTING_PAGE'|'BLOG_POST'|'CALL'|'CAMPAIGN'|'CAMPAIGN_BUDGET_ITEM'|'CAMPAIGN_SPEND_ITEM'|'CAMPAIGN_STEP'|'CAMPAIGN_TEMPLATE'|'CAMPAIGN_TEMPLATE_STEP'|'CART'|'CHATFLOW'|'CLIP'|'CMS_URL'|'COMMERCE_PAYMENT'|'COMMUNICATION'|'COMPANY'|'CONTACT'|'CONTACT_CREATE_ATTRIBUTION'|'CONTENT'|'CONTENT_AUDIT'|'CONTENT_AUDIT_PAGE'|'CONVERSATION'|'CONVERSATION_INBOX'|'CONVERSATION_SESSION'|'CRM_PIPELINES_DUMMY_TYPE'|'CTA'|'CTA_VARIANT'|'DATA_PRIVACY_CONSENT'|'DATA_SYNC_STATE'|'DEAL'|'DEAL_CREATE_ATTRIBUTION'|'DEAL_REGISTRATION'|'DEAL_SPLIT'|'DISCOUNT'|'DISCOUNT_CODE'|'DISCOUNT_TEMPLATE'|'EMAIL'|'ENGAGEMENT'|'EXPORT'|'EXTERNAL_WEB_URL'|'FEE'|'FEEDBACK_SUBMISSION'|'FEEDBACK_SURVEY'|'FILE_MANAGER_FILE'|'FILE_MANAGER_FOLDER'|'FOLDER'|'FORECAST'|'FORM'|'FORM_SUBMISSION_INBOUNDDB'|'GOAL_TARGET'|'GOAL_TARGET_GROUP'|'GOAL_TEMPLATE'|'GSC_PROPERTY'|'HUB'|'IMPORT'|'INVOICE'|'KEYWORD'|'KNOWLEDGE_ARTICLE'|'LANDING_PAGE'|'LEAD'|'LINE_ITEM'|'MARKETING_CALENDAR'|'MARKETING_CAMPAIGN_UTM'|'MARKETING_EMAIL'|'MARKETING_EVENT'|'MARKETING_EVENT_ATTENDANCE'|'MARKETING_SMS'|'MEDIA_BRIDGE'|'MEETING_EVENT'|'MIC'|'NOTE'|'OBJECT_LIST'|'ORDER'|'OWNER'|'PARTNER_ACCOUNT'|'PARTNER_CLIENT'|'PARTNER_CLIENT_REVENUE'|'PAYMENT_LINK'|'PAYMENT_SCHEDULE'|'PAYMENT_SCHEDULE_INSTALLMENT'|'PERMISSIONS_TESTING'|'PLAYBOOK'|'PLAYBOOK_QUESTION'|'PLAYBOOK_SUBMISSION'|'PLAYBOOK_SUBMISSION_ANSWER'|'PLAYLIST'|'PLAYLIST_FOLDER'|'PORTAL'|'PORTAL_OBJECT_SYNC_MESSAGE'|'POSTAL_MAIL'|'PRIVACY_SCANNER_COOKIE'|'PRODUCT'|'PRODUCT_OR_FOLDER'|'PROPERTY_INFO'|'PUBLISHING_TASK'|'QUARANTINED_SUBMISSION'|'QUOTA'|'QUOTE'|'QUOTE_FIELD'|'QUOTE_MODULE'|'QUOTE_MODULE_FIELD'|'QUOTE_TEMPLATE'|'RESTORABLE_CRM_OBJECT'|'ROSTER'|'ROSTER_MEMBER'|'SALES_DOCUMENT'|'SALES_TASK'|'SALES_WORKLOAD'|'SALESFORCE_SYNC_ERROR'|'SCHEDULING_PAGE'|'SCHEMAS_BACKEND_TEST'|'SCORE_CONFIGURATION'|'SEQUENCE'|'SEQUENCE_ENROLLMENT'|'SEQUENCE_STEP'|'SEQUENCE_STEP_ENROLLMENT'|'SITE_PAGE'|'SNIPPET'|'SOCIAL_BROADCAST'|'SOCIAL_CHANNEL'|'SOCIAL_POST'|'SOCIAL_PROFILE'|'SOX_PROTECTED_DUMMY_TYPE'|'SOX_PROTECTED_TEST_TYPE'|'SUBMISSION_TAG'|'SUBSCRIPTION'|'TASK'|'TASK_TEMPLATE'|'TAX'|'TEMPLATE'|'TICKET'|'UNKNOWN'|'UNSUBSCRIBE'|'USER'|'VIEW'|'VIEW_BLOCK'|'WEB_INTERACTIVE'|ReferencedObjectType,
     *   }|FieldTypeDefinition,
     * }|OutputFieldDefinition> $outputFields Body param:
     * @param bool $published Body param:
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        int $appID,
        ?string $actionURL = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        ?array $inputFields = null,
        ?array $labels = null,
        array|PublicObjectRequestOptions|null $objectRequestOptions = null,
        ?array $objectTypes = null,
        ?array $outputFields = null,
        ?bool $published = null,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
        $params = [
            'appID' => $appID,
            'actionURL' => $actionURL,
            'executionRules' => $executionRules,
            'inputFieldDependencies' => $inputFieldDependencies,
            'inputFields' => $inputFields,
            'labels' => $labels,
            'objectRequestOptions' => $objectRequestOptions,
            'objectTypes' => $objectTypes,
            'outputFields' => $outputFields,
            'published' => $published,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve custom workflow action definitions by app ID.
     *
     * @param int $appID the ID of the app
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?string $after = null,
        bool $archived = false,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'archived' => $archived, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an action definition by ID.
     *
     * @param string $definitionID the ID of the custom action definition
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a custom workflow action definition by ID.
     *
     * @param string $definitionID path param: The ID of the custom action
     * @param int $appID path param: The ID of the app
     * @param bool $archived query param: Whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        int $appID,
        bool $archived = false,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
        $params = ['appID' => $appID, 'archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
