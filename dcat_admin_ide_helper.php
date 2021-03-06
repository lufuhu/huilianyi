<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection phone
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection code
     * @property Grid\Column|Collection code_three
     * @property Grid\Column|Collection name_en
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection waybill
     * @property Grid\Column|Collection city
     * @property Grid\Column|Collection code_four
     * @property Grid\Column|Collection country
     * @property Grid\Column|Collection country_code
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection pid
     * @property Grid\Column|Collection sort
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection key
     * @property Grid\Column|Collection code_num
     * @property Grid\Column|Collection name_full
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection area
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection base_price
     * @property Grid\Column|Collection base_weight
     * @property Grid\Column|Collection cargo
     * @property Grid\Column|Collection forwarder_id
     * @property Grid\Column|Collection from
     * @property Grid\Column|Collection guarantee
     * @property Grid\Column|Collection max_time
     * @property Grid\Column|Collection min_time
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection to
     * @property Grid\Column|Collection transportation
     * @property Grid\Column|Collection level
     * @property Grid\Column|Collection monthly
     * @property Grid\Column|Collection line
     * @property Grid\Column|Collection admin_id
     * @property Grid\Column|Collection img
     * @property Grid\Column|Collection container
     * @property Grid\Column|Collection height
     * @property Grid\Column|Collection height_all
     * @property Grid\Column|Collection long
     * @property Grid\Column|Collection long_all
     * @property Grid\Column|Collection num
     * @property Grid\Column|Collection order_id
     * @property Grid\Column|Collection pack
     * @property Grid\Column|Collection pack_type
     * @property Grid\Column|Collection weight
     * @property Grid\Column|Collection weight_all
     * @property Grid\Column|Collection width
     * @property Grid\Column|Collection width_all
     * @property Grid\Column|Collection addresser_address
     * @property Grid\Column|Collection addresser_date
     * @property Grid\Column|Collection addresser_name
     * @property Grid\Column|Collection addresser_tel
     * @property Grid\Column|Collection addresser_type
     * @property Grid\Column|Collection clause
     * @property Grid\Column|Collection consignee_address
     * @property Grid\Column|Collection consignee_name
     * @property Grid\Column|Collection consignee_tel
     * @property Grid\Column|Collection consignee_type
     * @property Grid\Column|Collection customs
     * @property Grid\Column|Collection express_company
     * @property Grid\Column|Collection forwarder_task_id
     * @property Grid\Column|Collection info_type
     * @property Grid\Column|Collection insurance
     * @property Grid\Column|Collection order_parcel_id
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection revenue
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection name_abbr
     * @property Grid\Column|Collection name_en_abbr
     * @property Grid\Column|Collection website
     * @property Grid\Column|Collection account
     * @property Grid\Column|Collection avatarurl
     * @property Grid\Column|Collection gender
     * @property Grid\Column|Collection identity
     * @property Grid\Column|Collection keyword
     * @property Grid\Column|Collection last_login_time
     * @property Grid\Column|Collection mail
     * @property Grid\Column|Collection nickname
     * @property Grid\Column|Collection openid
     * @property Grid\Column|Collection session_key
     * @property Grid\Column|Collection unionid
     *
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection phone(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection code(string $label = null)
     * @method Grid\Column|Collection code_three(string $label = null)
     * @method Grid\Column|Collection name_en(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection waybill(string $label = null)
     * @method Grid\Column|Collection city(string $label = null)
     * @method Grid\Column|Collection code_four(string $label = null)
     * @method Grid\Column|Collection country(string $label = null)
     * @method Grid\Column|Collection country_code(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection pid(string $label = null)
     * @method Grid\Column|Collection sort(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection key(string $label = null)
     * @method Grid\Column|Collection code_num(string $label = null)
     * @method Grid\Column|Collection name_full(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection area(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection base_price(string $label = null)
     * @method Grid\Column|Collection base_weight(string $label = null)
     * @method Grid\Column|Collection cargo(string $label = null)
     * @method Grid\Column|Collection forwarder_id(string $label = null)
     * @method Grid\Column|Collection from(string $label = null)
     * @method Grid\Column|Collection guarantee(string $label = null)
     * @method Grid\Column|Collection max_time(string $label = null)
     * @method Grid\Column|Collection min_time(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection to(string $label = null)
     * @method Grid\Column|Collection transportation(string $label = null)
     * @method Grid\Column|Collection level(string $label = null)
     * @method Grid\Column|Collection monthly(string $label = null)
     * @method Grid\Column|Collection line(string $label = null)
     * @method Grid\Column|Collection admin_id(string $label = null)
     * @method Grid\Column|Collection img(string $label = null)
     * @method Grid\Column|Collection container(string $label = null)
     * @method Grid\Column|Collection height(string $label = null)
     * @method Grid\Column|Collection height_all(string $label = null)
     * @method Grid\Column|Collection long(string $label = null)
     * @method Grid\Column|Collection long_all(string $label = null)
     * @method Grid\Column|Collection num(string $label = null)
     * @method Grid\Column|Collection order_id(string $label = null)
     * @method Grid\Column|Collection pack(string $label = null)
     * @method Grid\Column|Collection pack_type(string $label = null)
     * @method Grid\Column|Collection weight(string $label = null)
     * @method Grid\Column|Collection weight_all(string $label = null)
     * @method Grid\Column|Collection width(string $label = null)
     * @method Grid\Column|Collection width_all(string $label = null)
     * @method Grid\Column|Collection addresser_address(string $label = null)
     * @method Grid\Column|Collection addresser_date(string $label = null)
     * @method Grid\Column|Collection addresser_name(string $label = null)
     * @method Grid\Column|Collection addresser_tel(string $label = null)
     * @method Grid\Column|Collection addresser_type(string $label = null)
     * @method Grid\Column|Collection clause(string $label = null)
     * @method Grid\Column|Collection consignee_address(string $label = null)
     * @method Grid\Column|Collection consignee_name(string $label = null)
     * @method Grid\Column|Collection consignee_tel(string $label = null)
     * @method Grid\Column|Collection consignee_type(string $label = null)
     * @method Grid\Column|Collection customs(string $label = null)
     * @method Grid\Column|Collection express_company(string $label = null)
     * @method Grid\Column|Collection forwarder_task_id(string $label = null)
     * @method Grid\Column|Collection info_type(string $label = null)
     * @method Grid\Column|Collection insurance(string $label = null)
     * @method Grid\Column|Collection order_parcel_id(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection revenue(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection name_abbr(string $label = null)
     * @method Grid\Column|Collection name_en_abbr(string $label = null)
     * @method Grid\Column|Collection website(string $label = null)
     * @method Grid\Column|Collection account(string $label = null)
     * @method Grid\Column|Collection avatarurl(string $label = null)
     * @method Grid\Column|Collection gender(string $label = null)
     * @method Grid\Column|Collection identity(string $label = null)
     * @method Grid\Column|Collection keyword(string $label = null)
     * @method Grid\Column|Collection last_login_time(string $label = null)
     * @method Grid\Column|Collection mail(string $label = null)
     * @method Grid\Column|Collection nickname(string $label = null)
     * @method Grid\Column|Collection openid(string $label = null)
     * @method Grid\Column|Collection session_key(string $label = null)
     * @method Grid\Column|Collection unionid(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection address
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection phone
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection order
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection password
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection username
     * @property Show\Field|Collection code
     * @property Show\Field|Collection code_three
     * @property Show\Field|Collection name_en
     * @property Show\Field|Collection status
     * @property Show\Field|Collection waybill
     * @property Show\Field|Collection city
     * @property Show\Field|Collection code_four
     * @property Show\Field|Collection country
     * @property Show\Field|Collection country_code
     * @property Show\Field|Collection content
     * @property Show\Field|Collection image
     * @property Show\Field|Collection pid
     * @property Show\Field|Collection sort
     * @property Show\Field|Collection url
     * @property Show\Field|Collection key
     * @property Show\Field|Collection code_num
     * @property Show\Field|Collection name_full
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection area
     * @property Show\Field|Collection state
     * @property Show\Field|Collection base_price
     * @property Show\Field|Collection base_weight
     * @property Show\Field|Collection cargo
     * @property Show\Field|Collection forwarder_id
     * @property Show\Field|Collection from
     * @property Show\Field|Collection guarantee
     * @property Show\Field|Collection max_time
     * @property Show\Field|Collection min_time
     * @property Show\Field|Collection price
     * @property Show\Field|Collection to
     * @property Show\Field|Collection transportation
     * @property Show\Field|Collection level
     * @property Show\Field|Collection monthly
     * @property Show\Field|Collection line
     * @property Show\Field|Collection admin_id
     * @property Show\Field|Collection img
     * @property Show\Field|Collection container
     * @property Show\Field|Collection height
     * @property Show\Field|Collection height_all
     * @property Show\Field|Collection long
     * @property Show\Field|Collection long_all
     * @property Show\Field|Collection num
     * @property Show\Field|Collection order_id
     * @property Show\Field|Collection pack
     * @property Show\Field|Collection pack_type
     * @property Show\Field|Collection weight
     * @property Show\Field|Collection weight_all
     * @property Show\Field|Collection width
     * @property Show\Field|Collection width_all
     * @property Show\Field|Collection addresser_address
     * @property Show\Field|Collection addresser_date
     * @property Show\Field|Collection addresser_name
     * @property Show\Field|Collection addresser_tel
     * @property Show\Field|Collection addresser_type
     * @property Show\Field|Collection clause
     * @property Show\Field|Collection consignee_address
     * @property Show\Field|Collection consignee_name
     * @property Show\Field|Collection consignee_tel
     * @property Show\Field|Collection consignee_type
     * @property Show\Field|Collection customs
     * @property Show\Field|Collection express_company
     * @property Show\Field|Collection forwarder_task_id
     * @property Show\Field|Collection info_type
     * @property Show\Field|Collection insurance
     * @property Show\Field|Collection order_parcel_id
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection revenue
     * @property Show\Field|Collection time
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection name_abbr
     * @property Show\Field|Collection name_en_abbr
     * @property Show\Field|Collection website
     * @property Show\Field|Collection account
     * @property Show\Field|Collection avatarurl
     * @property Show\Field|Collection gender
     * @property Show\Field|Collection identity
     * @property Show\Field|Collection keyword
     * @property Show\Field|Collection last_login_time
     * @property Show\Field|Collection mail
     * @property Show\Field|Collection nickname
     * @property Show\Field|Collection openid
     * @property Show\Field|Collection session_key
     * @property Show\Field|Collection unionid
     *
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection phone(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection code(string $label = null)
     * @method Show\Field|Collection code_three(string $label = null)
     * @method Show\Field|Collection name_en(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection waybill(string $label = null)
     * @method Show\Field|Collection city(string $label = null)
     * @method Show\Field|Collection code_four(string $label = null)
     * @method Show\Field|Collection country(string $label = null)
     * @method Show\Field|Collection country_code(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection pid(string $label = null)
     * @method Show\Field|Collection sort(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection key(string $label = null)
     * @method Show\Field|Collection code_num(string $label = null)
     * @method Show\Field|Collection name_full(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection area(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection base_price(string $label = null)
     * @method Show\Field|Collection base_weight(string $label = null)
     * @method Show\Field|Collection cargo(string $label = null)
     * @method Show\Field|Collection forwarder_id(string $label = null)
     * @method Show\Field|Collection from(string $label = null)
     * @method Show\Field|Collection guarantee(string $label = null)
     * @method Show\Field|Collection max_time(string $label = null)
     * @method Show\Field|Collection min_time(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection to(string $label = null)
     * @method Show\Field|Collection transportation(string $label = null)
     * @method Show\Field|Collection level(string $label = null)
     * @method Show\Field|Collection monthly(string $label = null)
     * @method Show\Field|Collection line(string $label = null)
     * @method Show\Field|Collection admin_id(string $label = null)
     * @method Show\Field|Collection img(string $label = null)
     * @method Show\Field|Collection container(string $label = null)
     * @method Show\Field|Collection height(string $label = null)
     * @method Show\Field|Collection height_all(string $label = null)
     * @method Show\Field|Collection long(string $label = null)
     * @method Show\Field|Collection long_all(string $label = null)
     * @method Show\Field|Collection num(string $label = null)
     * @method Show\Field|Collection order_id(string $label = null)
     * @method Show\Field|Collection pack(string $label = null)
     * @method Show\Field|Collection pack_type(string $label = null)
     * @method Show\Field|Collection weight(string $label = null)
     * @method Show\Field|Collection weight_all(string $label = null)
     * @method Show\Field|Collection width(string $label = null)
     * @method Show\Field|Collection width_all(string $label = null)
     * @method Show\Field|Collection addresser_address(string $label = null)
     * @method Show\Field|Collection addresser_date(string $label = null)
     * @method Show\Field|Collection addresser_name(string $label = null)
     * @method Show\Field|Collection addresser_tel(string $label = null)
     * @method Show\Field|Collection addresser_type(string $label = null)
     * @method Show\Field|Collection clause(string $label = null)
     * @method Show\Field|Collection consignee_address(string $label = null)
     * @method Show\Field|Collection consignee_name(string $label = null)
     * @method Show\Field|Collection consignee_tel(string $label = null)
     * @method Show\Field|Collection consignee_type(string $label = null)
     * @method Show\Field|Collection customs(string $label = null)
     * @method Show\Field|Collection express_company(string $label = null)
     * @method Show\Field|Collection forwarder_task_id(string $label = null)
     * @method Show\Field|Collection info_type(string $label = null)
     * @method Show\Field|Collection insurance(string $label = null)
     * @method Show\Field|Collection order_parcel_id(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection revenue(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection name_abbr(string $label = null)
     * @method Show\Field|Collection name_en_abbr(string $label = null)
     * @method Show\Field|Collection website(string $label = null)
     * @method Show\Field|Collection account(string $label = null)
     * @method Show\Field|Collection avatarurl(string $label = null)
     * @method Show\Field|Collection gender(string $label = null)
     * @method Show\Field|Collection identity(string $label = null)
     * @method Show\Field|Collection keyword(string $label = null)
     * @method Show\Field|Collection last_login_time(string $label = null)
     * @method Show\Field|Collection mail(string $label = null)
     * @method Show\Field|Collection nickname(string $label = null)
     * @method Show\Field|Collection openid(string $label = null)
     * @method Show\Field|Collection session_key(string $label = null)
     * @method Show\Field|Collection unionid(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
