<?php
/**
 * Small helpers used by the templates.
 */

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Build a mailto: link to the site email with the subject (and optional body) filled in.
 * Escape the result with e() when placing it in an href.
 */
function mailto(string $subject, string $body = ''): string
{
    $query = 'subject=' . rawurlencode($subject);
    if ($body !== '') {
        $query .= '&body=' . rawurlencode($body);
    }
    return 'mailto:' . SITE_EMAIL . '?' . $query;
}

function format_date(string $date): string
{
    return date('F j, Y', strtotime($date));
}
