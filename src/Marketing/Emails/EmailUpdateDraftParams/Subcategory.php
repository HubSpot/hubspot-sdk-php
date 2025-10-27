<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\EmailUpdateDraftParams;

/**
 * The email subcategory.
 */
enum Subcategory: string
{
    case AB_MASTER = 'ab_master';

    case AB_VARIANT = 'ab_variant';

    case AB_LOSER_VARIANT = 'ab_loser_variant';

    case PAGE_STUB = 'page_stub';

    case LANDING_PAGE = 'landing_page';

    case SITE_PAGE = 'site_page';

    case LEGACY_PAGE = 'legacy_page';

    case AB_MASTER_SITE_PAGE = 'ab_master_site_page';

    case AB_VARIANT_SITE_PAGE = 'ab_variant_site_page';

    case AB_LOSER_VARIANT_SITE_PAGE = 'ab_loser_variant_site_page';

    case PERFORMABLE_LANDING_PAGE = 'performable_landing_page';

    case PERFORMABLE_LANDING_PAGE_CUTOVER = 'performable_landing_page_cutover';

    case STAGED_PAGE = 'staged_page';

    case AUTOMATED = 'automated';

    case AUTOMATED_FOR_DEAL = 'automated_for_deal';

    case AUTOMATED_FOR_FORM = 'automated_for_form';

    case AUTOMATED_FOR_FORM_LEGACY = 'automated_for_form_legacy';

    case AUTOMATED_FOR_FORM_BUFFER = 'automated_for_form_buffer';

    case AUTOMATED_FOR_FORM_DRAFT = 'automated_for_form_draft';

    case AUTOMATED_FOR_CRM = 'automated_for_crm';

    case RSS_TO_EMAIL = 'rss_to_email';

    case RSS_TO_EMAIL_CHILD = 'rss_to_email_child';

    case BLOG_EMAIL = 'blog_email';

    case BLOG_EMAIL_CHILD = 'blog_email_child';

    case OPTIN_EMAIL = 'optin_email';

    case OPTIN_FOLLOWUP_EMAIL = 'optin_followup_email';

    case BATCH = 'batch';

    case RESUBSCRIBE_EMAIL = 'resubscribe_email';

    case UNSUBSCRIBE_CONFIRMATION_EMAIL = 'unsubscribe_confirmation_email';

    case RESUBSCRIBE_CONFIRMATION_EMAIL = 'resubscribe_confirmation_email';

    case SINGLE_SEND_API = 'single_send_api';

    case MARKETING_SINGLE_SEND_API = 'marketing_single_send_api';

    case SMTP_TOKEN = 'smtp_token';

    case LOCALTIME = 'localtime';

    case AUTOMATED_FOR_TICKET = 'automated_for_ticket';

    case AUTOMATED_FOR_LEADFLOW = 'automated_for_leadflow';

    case AUTOMATED_FOR_FEEDBACK_CES = 'automated_for_feedback_ces';

    case AUTOMATED_FOR_FEEDBACK_NPS = 'automated_for_feedback_nps';

    case AUTOMATED_FOR_FEEDBACK_CUSTOM = 'automated_for_feedback_custom';

    case MEMBERSHIP_REGISTRATION = 'membership_registration';

    case MEMBERSHIP_PASSWORD_SAVED = 'membership_password_saved';

    case MEMBERSHIP_PASSWORD_RESET = 'membership_password_reset';

    case MEMBERSHIP_OTP_LOGIN = 'membership_otp_login';

    case MEMBERSHIP_PASSWORDLESS_AUTH = 'membership_passwordless_auth';

    case MEMBERSHIP_EMAIL_VERIFICATION = 'membership_email_verification';

    case MEMBERSHIP_REGISTRATION_FOLLOW_UP = 'membership_registration_follow_up';

    case MEMBERSHIP_VERIFICATION = 'membership_verification';

    case MEMBERSHIP_FOLLOW_UP = 'membership_follow_up';

    case TICKET_CLOSED_KICKBACK_EMAIL = 'ticket_closed_kickback_email';

    case TICKET_OPENED_KICKBACK_EMAIL = 'ticket_opened_kickback_email';

    case AUTOMATED_FOR_CUSTOM_SURVEY = 'automated_for_custom_survey';

    case DISCARDABLE_STUB = 'discardable_stub';

    case NORMAL_BLOG_POST = 'normal_blog_post';

    case LEGACY_BLOG_POST = 'legacy_blog_post';

    case IMPORTED_BLOG_POST = 'imported_blog_post';

    case AUTOMATED_AB_MASTER = 'automated_ab_master';

    case AUTOMATED_AB_VARIANT = 'automated_ab_variant';

    case WEB_INTERACTIVE = 'web_interactive';

    case PORTAL_CONTENT = 'portal_content';

    case PAGE_INSTANCE_LAYOUT = 'page_instance_layout';

    case KB_ARTICLE_INSTANCE_LAYOUT = 'kb_article_instance_layout';

    case KB_LISTING = 'kb_listing';

    case KB_SEARCH_RESULTS = 'kb_search_results';

    case KB_SUPPORT_FORM = 'kb_support_form';

    case KB_404_PAGE = 'kb_404_page';

    case CASE_STUDY = 'case_study';

    case CASE_STUDY_LISTING = 'case_study_listing';

    case CASE_STUDY_INSTANCE_LAYOUT = 'case_study_instance_layout';

    case SCP_STATIC_PAGE = 'scp_static_page';

    case SCP_INSTANCE_LAYOUT_PAGE = 'scp_instance_layout_page';

    case PODCAST_INSTANCE_LAYOUT = 'podcast_instance_layout';

    case PODCAST_LISTING = 'podcast_listing';

    case BLOG_ARTICLE_INSTANCE_LAYOUT = 'blog_article_instance_layout';

    case BLOG_ARTICLE_LISTING = 'blog_article_listing';

    case BLOG_AUTHOR_DETAIL = 'blog_author_detail';

    case UNKNOWN = 'UNKNOWN';
}
