<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIAbTestBranchAction;

/**
 * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
 */
enum Type: string
{
    case AB_TEST_BRANCH = 'AB_TEST_BRANCH';
}
