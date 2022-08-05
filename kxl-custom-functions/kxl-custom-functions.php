<?php
/**
 * @package KXL_Custom_Functions
 * @version 1.0.0
 */

/*
 * Plugin Name: KXL Custom Functions
 * Description: 自定义PHP函数.
 * Author: kaxiluo
 * Version: 1.0.0
 */

if (!function_exists('kxl_cdn_avatar_url')) {
    /**
     *替换Gravatar头像地址为国内镜像地址
     *
     * @param string $url
     *
     * @return string
     */
    function kxl_cdn_avatar_url(string $url): string
    {
        $sources = array(
            'www.gravatar.com',
            '0.gravatar.com',
            '1.gravatar.com',
            '2.gravatar.com',
            'secure.gravatar.com',
            'cn.gravatar.com'
        );
        // dn-qiniu-avatar.qbox.me
        // cravatar.cn
        return str_replace($sources, 'cravatar.cn', $url);
    }

    add_filter('um_user_avatar_url_filter', 'kxl_cdn_avatar_url', 10);
    add_filter('bp_gravatar_url', 'kxl_cdn_avatar_url', 10);
    add_filter('get_avatar_url', 'kxl_cdn_avatar_url', 10);
}