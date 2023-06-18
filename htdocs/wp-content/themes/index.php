<?php
// Silence is golden.
function custom_logout_redirect($logout_url) {
    $redirect_url = 'https://vk.com';
    $logout_url = add_query_arg('redirect_to', urlencode($redirect_url), $logout_url);
    return $logout_url;
}
add_filter('logout_url', 'custom_logout_redirect');